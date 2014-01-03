<?php
class CRegistrazione {
    private $_username=null;
    private $_password=null;
    private $_errore='';
    private $_autenticato=false;
    
    public function getUtenteRegistrato() {
        $autenticato=false;
        $session=USingleton::getInstance('USession');
        $VRegistrazione= USingleton::getInstance('VRegistrazione');
        $task=$VRegistrazione->getTask();
        $controller=$VRegistrazione->getController();
        $this->_username=$VRegistrazione->getUsername();
        $this->_password=$VRegistrazione->getPassword();
        if ($session->leggi_valore('username')!=false) {
            $autenticato=true;
            //autenticato
        } elseif ($task=='autentica' && $controller='registrazione') {
            //controlla autenticazione
            $autenticato=$this->autentica($this->_username, $this->_password);
        }
        if ($task=='esci' && $controller='registrazione') {
            //logout
            $this->logout();
            $autenticato=false;
        }
        $VRegistrazione->impostaErrore($this->_errore);
        $this->_errore='';
        return $autenticato;
    }


/**
     * Controlla se una coppia username e password corrispondono ad un utente regirtrato ed in tal caso impostano le variabili di sessione relative all'autenticazione
     *
     * @param string $username
     * @param string $password
     * @return boolean
     */
    public function autentica($username, $password) {
        $FUtente=new FUtente();
        $utente=$FUtente->load($username);
        if ($utente!=false) {
            if ($utente->getAccountAttivo()) {
                //account attivo
                if ($username==$utente->username && $password==$utente->password) {
                    $session=USingleton::getInstance('USession');
                    $session->imposta_valore('username',$username);
                    $session->imposta_valore('nome_cognome',$utente->nome.' '.$utente->cognome);
                    $session->imposta_valore('amministratore',false);
                    $FUtente=new FUtente();
                    $amministratore=$FUtente->isAmministratore($username);
                    if($amministratore)
                        $session->imposta_valore('amministratore',true);
                    $this->_autenticato=true;
                    return true;
                } else {
                    $this->_errore='Username o password errati';
                    //username password errati
                }
            } else {
                $this->_errore='L\'account non &egrave; attivo';
                //account non attivo
            }
        } else {
            $this->_errore='L\'account non esiste';
            //account non esiste
        }
        return false;
    }
    
     /**
     * Crea un utente sul database controllando che non esista già
     *
     * @return mixed
     */
    
    public function validaDati($dati) {
         //array('username','password','password_1','nome','cognome','sesso','data_nascita',
         //'citta_nascita','citta_residenza','email','num_telefono','cod_fiscale');
         $username=$dati['username'];
         $password=$dati['password'];
         $password_1=$dati['password_1'];
         $nome=$dati['nome'];
         $cognome=$dati['cognome'];
         $sesso=$dati['sesso'];
         $data_nascita=$dati['data_nascita'];
         $citta_nascita=$dati['citta_nascita'];
         $citta_residenza=$dati['citta_residenza'];
         $email=$dati['email'];
         $num_telefono=$dati['num_telefono'];
         $cod_fiscale=$dati['cod_fiscale'];
         list($anno,$mese,$giorno) = explode("/", $data_nascita);
         $FUtente=new FUtente();
         if($FUtente->verificaUsername($username)) // Se l'username è gia presente
            return false;
         elseif($password!=$password_1)
            return false;
         elseif($sesso!='m')
             if ($sesso!='f')
                return false;
         elseif(!preg_match("/^([a-zA-Z ]+)$/i", $nome))
            return false;
         elseif(!preg_match("/^[A-Z '-]{2,30}$/i", $cognome))
            return false;
         elseif(!preg_match("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $email)) 
            return false;
         elseif($FUtente->verificaEmail($email))
            return false;
         elseif($FUtente->verificaCodFiscale($cod_fiscale))
            return false;
         elseif(!preg_match("/^(?=.*\d).{4,12}$/i" , $password))
            return false;
         elseif(!checkdate($mese,$giorno,$anno))
            return false;
         else
            return true;
    }


    public function creaUtente() {
        $view=USingleton::getInstance('VRegistrazione');
        $dati_registrazione=$view->getDatiRegistrazione();
        $utente=new EUtente();
        $FUtente=new FUtente();
        $validazione=$this->validaDati($dati_registrazione);
        echo $validazione;
        if($validazione) {
            unset($dati_registrazione['password_1']);
            $keys=array_keys($dati_registrazione);
            $i=0;
            foreach ($dati_registrazione as $dato) {
                $utente->$keys[$i]=$dato;
                $i++;
            }
            //$utente->generaCodiceAttivazione();
            $utente->setAccountAttivo();
            $FUtente->store($utente);
            // $this->emailAttivazione($utente);
            $view->setLayout('conferma_registrazione');
            return $view->processaTemplate();
        }
        else {
            $view->setLayout('problemi');
            $result=$view->processaTemplate();
            $view->setLayout('modulo');
            $result.=$view->processaTemplate();
            return $result;
        }
    }
            
     
    
    /**
     * Mostra il modulo di registrazione
     *
     * @return string
     */
    public function moduloRegistrazione() {
        $VRegistrazione=USingleton::getInstance('VRegistrazione');
        $VRegistrazione->setLayout('modulo');
        return $VRegistrazione->processaTemplate();
    }
    /**
     * EfFettua il logout
     */
    public function logout() {
        $session=USingleton::getInstance('USession');
        $session->cancella_valore('username');
        $session->cancella_valore('nome_cognome');
        return $this->ultimiViaggi(); 
    }
        
    public function errore_aggiornamento(){
        $view=USingleton::getInstance('VRegistrazione');
        $view->setControllerTaskDefault();
        $view->setLayout('errore_aggiornamento');
        return $view->processaTemplateParziale();
    }
    
    public function ultimiViaggi(){
        $view=USingleton::getInstance('VRicerca');
        $FViaggio=new FViaggio();
        $viaggi=$FViaggio->ultimiViaggi();
        $view->mostraListaUltimiViaggi($viaggi);
        return $view->processaTemplate();
    }
    
    public function ultimiViaggiParziale(){
        $view=USingleton::getInstance('VRicerca');
        $FViaggio=new FViaggio();
        $viaggi=$FViaggio->ultimiViaggi();
        $view->mostraListaUltimiViaggi($viaggi);
        return $view->processaTemplateParziale();
    }
    
    public function visualizzaProfilo() {
        $session = USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false) {
            $view=Usingleton::getInstance('VRegistrazione');
            $view->setLayout('visualizza_profilo');
            $FUtente=new FUtente();
            $utente=$FUtente->load($username);
            $view->impostaDati('immagine_profilo',$utente->immagine_profilo);
            $view->impostaDati('username',$utente->username);
            $view->impostaDati('nome',$utente->nome);
            $view->impostaDati('cognome',$utente->cognome);
            $view->impostaDati('data_nascita',$utente->data_nascita);
            $view->impostaDati('citta_residenza',$utente->citta_residenza);
            $view->impostaDati('citta_nascita',$utente->citta_nascita);
            $view->impostaDati('email',$utente->email);
            $view->impostaDati('num_telefono',$utente->num_telefono);
            $dati_guidatore= $FUtente->getMediaGuidatore($username);
            $dati_passeggero= $FUtente->getMediaPasseggero($username);
            $view->impostaDati('media_feedback_guidatore',$dati_guidatore[0]);
            $view->impostaDati('num_viaggi_guid',$dati_guidatore[1]);
            $view->impostaDati('media_feedback_passeggero',$dati_passeggero);
			$commenti_guidatore=$FUtente->getArrayFeedbackGuidatore($username);
			$view->impostaDati('array_commenti_guidatore',$commenti_guidatore);
            return $view->processaTemplateParziale();
        }
        else $this->errore_aggiornamento();
    }
    
    public function visualizzaUtente($username){
        $session=USingleton::getInstance('USession');
        $loggato_amministratore=$session->leggi_valore('amministratore');
        $view=Usingleton::getInstance('VRegistrazione');
        $view->setLayout('visualizza_profilo_utente');
        $FUtente=new FUtente();
        $utente=$FUtente->load($username);
	$view->impostaDati('immagine_profilo',$utente->immagine_profilo);
        $view->impostaDati('username',$utente->username);
        $view->impostaDati('nome',$utente->nome);
        $view->impostaDati('cognome',$utente->cognome);
        $view->impostaDati('data_nascita',$utente->data_nascita);
        $view->impostaDati('citta_residenza',$utente->citta_residenza);
	$view->impostaDati('citta_nascita',$utente->citta_nascita);
        $view->impostaDati('email',$utente->email);
        $view->impostaDati('num_telefono',$utente->num_telefono);
        $view->impostaDati('amministratore',$utente->amministratore);
        $dati_guidatore= $FUtente->getMediaGuidatore($username);
        $dati_passeggero= $FUtente->getMediaPasseggero($username);
        $view->impostaDati('media_feedback_guidatore',$dati_guidatore[0]);
        $view->impostaDati('num_voti_guid',$dati_guidatore[1]);
        $view->impostaDati('media_feedback_passeggero',$dati_passeggero);
        $view->impostaDati('loggato_amministratore',$loggato_amministratore);
        $view->impostaDati('partecipa',$view->isPartecipante());
        $view->processaTemplateParziale();
    }
    
    public function gestisciProfilo(){
        $session = USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false) {
            $view=Usingleton::getInstance('VRegistrazione');
            $view->setLayout('gestisci_profilo');
            $FUtente=new FUtente();
            $utente=$FUtente->load($username);
            $view->impostaDati('username', $utente->username);
            $view->impostaDati('nome', $utente->nome);
            $view->impostaDati('cognome', $utente->cognome);
            $view->impostaDati('immagine_profilo',$utente->immagine_profilo);
            $FVeicolo = new FVeicolo();
            $array= $FVeicolo->getVeicoli($username);
            $view->impostaDati('array',$array);
            return $view->processaTemplateParziale();
        }
        else $this->errore_aggiornamento();
    }
    
    public function confermaLogin() {
        if ($this->_autenticato) { 
            $controller=USingleton::getInstance('CRicerca');
            return $controller->ultimiViaggi(); }
        else {
            $view=USingleton::getInstance('VRegistrazione');
            $view->setLayout('problemi');
            return $view->processaTemplate();
        }
    }
    
    public function gestisciViaggi(){
        $session = USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false) {
            $view=Usingleton::getInstance('VRegistrazione');
            $FViaggio= new FViaggio();
            $array_viaggi= $FViaggio->ViaggiPersonali($username);
            $array_passeggero= $FViaggio->ViaggiPasseggero($username);
            $view->impostaDati('username', $username);
            $view->impostaDati('array_passeggero', $array_passeggero);
            $view->impostaDati('array_viaggi',$array_viaggi);
            $view->setLayout('gestisci_viaggi');
            return $view->processaTemplateParziale();
        }
        else $this->errore_aggiornamento();
    }
    
    public function rendi_amministratore($username){
        $session=USingleton::getInstance('USession');
        $username_loggato=$session->leggi_valore('username');
        $amministratore=$session->leggi_valore('amministratore');
        if ($username_loggato!=false && $amministratore) {
            $FUtente=new FUtente();
            $FUtente->rendi_amministratore($username);
            $this->verifica_tipo_utente($username);
        }
        else $this->errore_aggiornamento();
    }
    
    public function rendi_utente($username){
        $session=USingleton::getInstance('USession');
        $username_loggato=$session->leggi_valore('username');
        $amministratore=$session->leggi_valore('amministratore');
        if ($username_loggato!=false && $amministratore) {
            $FUtente=new FUtente();
            $FUtente->rendi_utente($username);
            $this->verifica_tipo_utente($username);
        }
        else $this->errore_aggiornamento();
    }
    
    public function attiva_account($username){
        $session=USingleton::getInstance('USession');
        $username_loggato=$session->leggi_valore('username');
        $amministratore=$session->leggi_valore('amministratore');
        if ($username_loggato!=false && $amministratore) {
            $FUtente=new FUtente();
            $FUtente->attiva_account($username);
            $this->verifica_tipo_utente($username);
        }
        else $this->errore_aggiornamento();
    }
    
    public function disattiva_account($username){
        $session=USingleton::getInstance('USession');
        $username_loggato=$session->leggi_valore('username');
        $amministratore=$session->leggi_valore('amministratore');
        if ($username_loggato!=false && $amministratore) {
            $FUtente=new FUtente();
            $FUtente->disattiva_account($username);
            $this->verifica_tipo_utente($username);
        }
        else $this->errore_aggiornamento();
    }
    
    public function verifica_tipo_utente($username){
        $session=USingleton::getInstance('USession');
        $username_loggato=$session->leggi_valore('username');
        $amministratore=$session->leggi_valore('amministratore');
        if ($username_loggato!=false && $amministratore) {
            $view=Usingleton::getInstance('VRegistrazione');
            $FUtente=new FUtente();
            $utente=$FUtente->verifica_tipo_utente($username);
            $view->impostaDati('amministratore',$utente['amministratore']);
            $view->impostaDati('attivo',$utente['stato_attivazione']);
            $view->impostaDati('username',$username);
            $view->setLayout('amministrazione_div');
            return $view->processaTemplateParziale();
        }
        else $this->errore_aggiornamento();
    }
    
    public function caricaImmagine(){
        $session = USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false) {
            $upload_percorso = 'img/'; 
            $file_tmp = $_FILES['img']['tmp_name'];
            $file_nome = $_FILES['img']['name']; 
            move_uploaded_file($file_tmp, $upload_percorso.$file_nome);
            $FUtente=new FUtente();
            $FUtente->aggiornaImmagine($username, $file_nome);
            $view=Usingleton::getInstance('VRegistrazione');
            $view->setLayout('conferma_immagine');
            return $view->processaTemplate();
        }
        else $this->errore_aggiornamento();
    }
    
    public function verificaEmail($email) {
        $FUtente=new FUtente();
        $verifica=$FUtente->verificaEmail($email);
        $esistente=true;
        if(isset($verifica['email'])){
            $esistente=false;
        }
        $mail=array(
            'unique'=>$esistente
        );
        echo json_encode($mail);
    }
    
    public function verificaUsername($username) {
        $FUtente=new FUtente();
        $verifica=$FUtente->verificaUsername($username);
        $esistente=true;
        if(isset($verifica['username'])){
            $esistente=false;
        }
        $user=array(
            'unique'=>$esistente
        );
        echo json_encode($user);
    }
    
    public function recuperoPassword() {
        $view=Usingleton::getInstance('VRegistrazione');
        $view->setLayout('recupero');
        return $view->processaTemplateParziale();
    }
    
    public function invioRecupero($email) {
        $FUtente=new FUtente();
        $esiste=$FUtente->verificaEmail($email);
        if ($esiste) {
            $username=$esiste['username'];
            $password=$this->genera_codice();
            $FUtente->impostaPassword($username, $password);
            $this->inviaMailPassword($email, $username, $password);
        }
        return $this->ultimiViaggiParziale();
    }

    /**
     * Invia la mail con la nuova password dell'utente.
     * 
     * @param string $mail mail dell'utente.
     * @param string $password password dell'utente
     */
    public function inviaMailPassword($email, $username, $password) {
       $to=$email;      
       $subject="Nuova Password!";
       $message="Il tuo username è: " . $username . "La tua nuova password è: " . $password;
       $headers='From: carpooling@altervista.org' . "\r\n" .
                   'Reply-To: carpooling@altervista.org' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();
                   'MIME-Version: 1.0\n' .
                   'Content-Type: text/html; charset=\"iso-8859-1\"\n' .
                   'Content-Transfer-Encoding: 7bit\n\n';
       mail($to, $subject, $message, $headers); 
    }
    /**
     * Fornisce un id univoco utilizzando l' orario. Prende i secondi
     * e i microsecondi e li usa come chiave per generare un numero random
     * di cui viene fatto l'md5
     *
     * @return string codice generato.
     */
    public function genera_codice() {
        list($usec, $sec) = explode(' ', microtime());
        mt_srand((float) $sec + ((float) $usec * 100000));
        return md5(uniqid(mt_rand(), true));
    }
    
    public function modificaPassword() {
        $session = USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false) {
            $view=Usingleton::getInstance('VRegistrazione');
            $view->setLayout('modifica_pwd');
            return $view->processaTemplateParziale();
        }
        else $this->errore_aggiornamento();
    }
    
    public function confermaModificaPwd() {
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false) {
            $view=Usingleton::getInstance('VRegistrazione');
            $pwdattuale=$view->getPwdAttuale();
            $pwd=$view->getPwd();
            $pwd1=$view->getPwd1();
            $FUtente=new FUtente();
            $utente=$FUtente->load($username);
            if ($utente->password==$pwdattuale)
                if ($pwd==$pwd1) {
                    $FUtente->impostaPassword($username,$pwd);
                    return $this->gestisciProfilo();
                }
            $errore=true;
            $view->impostaDati('errore',$errore);
            return $this->modificaPassword();
        }
        else $this->errore_aggiornamento();    
    }
    
    public function comuni(){
        if (isset($_GET['term'])) {
            $term = $_GET['term'];
            $results = array();
            $var1 = file_get_contents("codici_comuni_italiani.csv");     
            $var = explode("\n", $var1);     
            foreach ($var as $line => $data) {
        $exploded_data = explode(",", $data);
        if (strlen($data) > 0) {
            if (preg_match("/^" . $term . "/i", substr($exploded_data[1], 1, -1))) {
                $results[] = substr($exploded_data[1], 1, -1) . ' (' . substr($exploded_data[2], 1, -1) . ')';
            }
        }
    }
    echo json_encode($results);
}
    }
     /**
     * Smista le richieste ai relativi metodi della classe
     * 
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VRegistrazione');
        switch ($view->getTask()) {
            case 'registra':
                return $this->moduloRegistrazione();
            case 'salva':
                return $this->creaUtente();
            case 'attivazione':
                return $this->attivazione();
            case 'visualizza_profilo':
                return $this->visualizzaProfilo();
            case 'gestisci_profilo':
                return $this->gestisciProfilo();
            case 'gestisci_viaggi':
                return $this->gestisciViaggi();
            case 'autentica':
                return $this->confermaLogin();
            case 'esci':
                return $this->logout();
            case 'visualizza_utente':
                return $this->visualizzaUtente($view->getUsername());
            case 'rendi_amministratore':
                return $this->rendi_amministratore($view->getUsername());
            case 'rendi_utente':
                return $this->rendi_utente($view->getUsername());
            case 'verifica_tipo_utente':
                return $this->verifica_tipo_utente($view->getUsername());
            case 'attiva_account':
                return $this->attiva_account($view->getUsername());
            case 'disattiva_account':
                return $this->disattiva_account($view->getUsername());
            case 'carica_immagine':
                return $this->caricaImmagine();
            case 'verifica_email':
                return $this->verificaEmail($view->getEmail());
            case 'verifica_username':
                return $this->verificaUsername($view->getUsername());
            //case 'verifica_cod_fiscale'
            //    return $this->verificaCodFiscale($view->getCodFiscale());
            case 'recupero_password':
                return $this->recuperoPassword();
            case 'invio_recupero':
                return $this->invioRecupero($view->getEmail());
            case 'modifica_password':
                return $this->modificaPassword();
            case 'conferma_password':
                return $this->confermaModificaPwd();
            case 'comuni':
                return $this->comuni();
        }
    }
}
?>
