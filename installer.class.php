<?php
/**
 * Classe che gestisce l'installazione dell'applicazione
 */

class Installer {
	private $step = 0;
	private $sql = 'carpooling.sql';

	public function __construct(){
                echo '<html>
		<head>
                <title>Installazione CarPooling</title>
                <link href="templates/main/template/css/layout3_setup.css" rel="stylesheet" type="text/css" />
                <link href="templates/main/template/css/layout3_text.css" rel="stylesheet" type="text/css" />
                <link href="templates/main/template/css/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css"/>
                <script src="js/jquery-1.10.2.min.js"></script>
                <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
                <script src="js/installer.js"></script>
		</head>
		<body>
		<div id="installer">';
		
		/* In base ai dati inviati via POST, determina il prossimo step
		 * dell'installazione.
		 */
		if (isset($_POST['dbuser']))
			$this->step = 1;
		if(isset($_POST['adminmail']))
			$this->step = 2;
			
		switch($this->step) {
			//Step 0: credenziali db
			case 0:
				$this->getDBInfo();
			break;
			//Step 1: creazione config, credenziali admin
			case 1:
				if(!$_POST['dbuser'] || !$_POST['dbpassword']){
					echo '<p>Non hai riempito tutti i campi richiesti!</p><br />
					<a href="./installer.class.php">Torna indietro</a>';
					exit();
				}
								
				$file = fopen('includes/config.inc.php', 'w+') 
					or die ('<p>Non hai permessi di scrittura in questa directory.</p><br/>
					<a href="./installer.class.php">Torna indietro</a>');
				$config = '<?php
                                                global $config;
                                                $config["mysql"] = array(
                                                        "host" => "localhost",
                                                        "username" => "'. $_POST['dbuser'].'",
                                                        "password" => "'. $_POST['dbpassword'].'",
                                                        "dbname" => "carpooling");
                                                $config["smarty"] = array(
                                                        "template_dir" => "templates/main/template/",
                                                        "compile_dir" => "templates/main/templates_c/",
                                                        "config_dir" => "templates/main/configs/",
                                                        "cache_dir" => "templates/main/cache/",
                                                );
                                           ?>
                                           ';
				fwrite($file, $config);
				fclose($file);
					
				echo'<h3>File di configurazione pronto</h3>
				<p>Assicurati che il proprietario di includes/config.inc.php sia '. get_current_user()
				.' e imposta i permessi di includes/ e dei file in essa contenuti a 755 prima di proseguire.</p>' ;
				$this->getAdminInfo();
			break;
			//Step 2: popolamento del DB
			case 2:
				if ( $_POST['adminpassword'] != $_POST['adminpasswordconfirm'] ){
					echo 'Le password non corrispondono.';
					exit();
				}
				// Recuperiamo i dati forniti dall'admin poco fa
				require_once 'includes/config.inc.php';
				require_once 'includes/autoload.inc.php';
				// Connessione al dbms e creazione del nuovo database
				mysql_connect($config['mysql']['host'],
					$config['mysql']['username'],
					$config['mysql']['password']);
				try {
					mysql_query('CREATE DATABASE IF NOT EXISTS carpooling');
					mysql_select_db('carpooling');
					$this->importa_sql($this->sql);
					// Creazione del nuovo utente admin
					require_once 'Foundation/FUtente.php';
					require_once 'Entity/EUtente.php';
					$admin = new EUtente();
					$admin->setNome($_POST['adminnome']);
                                        $admin->setCognome($_POST['admincognome']);
					$admin->setPassword($_POST['adminpassword']);
					$admin->setEmail($_POST['adminmail']);
					$admin->setDataNascita($_POST['admindatanascita']);
					$admin->setAdmin();
                                        $admin->setDataRegistrazione(time());
					$admin->Attiva();
					// Il nuovo utente viene aggiunto al db
					$store = new FUtente();
					$store->connect();
					$store->insertUtente($admin);
					echo'<h3>Installazione completata!</h3>
					<p>Ricordati di <b>ELIMINARE QUESTO FILE E carpooling.SQL!</b></p><br>
					<a href="index.php">Vai all\'applicazione</a>';
				}
				catch (Exception $e){
					echo'<h3>Errore nella creazione del DB</h3>';
					echo $e;
					echo '<p>Controlla che le credenziali siano corrette e riprova.</p>';
					mysql_query('DROP DATABASE carpooling');
				}
				mysql_close();
		}
		echo '</div></body></html>';
		
	}

	/* Crea una form per ottenere le credenziali d'accesso al DB
	 */
	public function getDBInfo(){
		echo '<h2>Credenziali di accesso al database</h2>
                <p>Se hai precedentemente eseguito questa procedura vuol dire che hai dimenticato di <b>ELIMINARE</b> questo file e il file carpooling.sql:
                eliminali e ritorna alla pagina index.php per avviare l\'applicazione correttamente</p>
		<p>Inserisci lo username e la password che verranno usati per la connessione al database.</p>
		<p>Assicurati che la directory includes/ e la directory template/main/templates_c abbiano i permessi impostati a 777.</p>
			<form method="POST" action="installer.class.php">
			<label>Username:</label><input type="text" name="dbuser"/><br />
			<label>Password:</label><input type="password" name="dbpassword"/> <br />
			<button type="submit">Invia</button>
		</form>';
	}
	
	/* Form per le credenziali dell'amministratore del sito.
	 */
	public function getAdminInfo(){
		echo '<h2>Credenziali dell\'amministratore</h2>
		<p>Inserisci uno username e una password. Al termine dell\'installazione
		potrai usare queste credenziali per accedere all\'applicazione ed amministrarla.</p>
			<form method="POST" action="installer.class.php">
			<label>Nome:</label><input type="text" name="adminnome"/><br />
                        <label>Cognome:</label><input type="text" name="admincognome"/><br />
			<label>E-Mail:</label><input type="text" name="adminmail"/><br />
			<label>Password:</label><input type="password" name="adminpassword"/> <br />
			<label>Conferma password:</label><input type="password" name="adminpasswordconfirm"/> <br />
                        <label>Data Nascita:</label><input type="text" id="data_nascita" name="admindatanascita"/><br />
			<button type="submit">Invia</button>
		</form>';
	}

	/* Legge un file .sql ed esegue le istruzioni che esso contiene
	 */
	public function importa_sql($sqlfile) {
		// estraggo il contenuto del file
		$queries = file_get_contents($sqlfile);
		// Rimuovo eventuali commenti
		$queries = preg_replace(array('/\/\*.*(\n)*.*(\*\/)?/', '/\s*--.*\n/', '/\s*#.*\n/'), "\n", $queries);
		// recupero le singole istruzioni
		$statements = explode(";\n", $queries);
		$statements = preg_replace("/\s/", ' ', $statements);
		// ciclo le istruzioni
		foreach ($statements as $query) {
			$query = trim($query);
			if ($query) {
				// eseguo la singola istruzione
				$result = mysql_query($query);
				// e stampo eventuali errori
				if (!$result)
					throw new Exception('Impossibile eseguire la query ' . $query . ': ' . mysql_error());
			}
		}
	}
}
New Installer();
?>