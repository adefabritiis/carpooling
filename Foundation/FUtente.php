<?php
class FUtente extends FDatabase{
    public function __construct() {
        $this->_table='utente';
        $this->_key='username';
        $this->_return_class='EUtente';
        USingleton::getInstance('FDatabase');
    }
    
public function getMediaGuidatore($username){
     $query="SELECT `num_voti`,`voto_totale` FROM `guidatore` WHERE `username_guidatore`='$username'";
     $this->query($query);
     $array=$this->getResultAssoc();
     $somma_media=0;
     $tot_viaggi=0;
     for( $i=0; $i<count($array); $i++){
            if(($array[$i]['num_voti'])!=0){
            $somma_media=$somma_media + $array[$i]['voto_totale']/$array[$i]['num_voti'];
            $tot_viaggi++;
            }
        }
     if (count($array)!=0 && $tot_viaggi !=0){
     $media_guidatore=$somma_media/$tot_viaggi;}
     else
      {$media_guidatore=0;}
     $dati= array( "$media_guidatore", "$tot_viaggi");
     return $dati;
 }
 public function getArrayFeedbackGuidatore($username){
	$query="SELECT `num_viaggio`, `voto_totale`,`num_voti`, `commento` FROM `guidatore` WHERE `username_guidatore`='$username'";
	$this->query($query);
	$array=$this->getResultAssoc();
	return $array;
	}
public function getArrayFeedbackPasseggero($username){
	$query="SELECT `num_viaggio`, `commento_guid`, `feedback_guid`, `votato` FROM `passeggero` WHERE `username_passeggero`='$username'";
	$this->query($query);
	$array=$this->getResultAssoc();
	return $array;
}	

public function getMediaPasseggero($username){
     $query="SELECT AVG(`feedback_guid`)as 'media' FROM `passeggero` WHERE `username_passeggero`='$username'";
     $this->query($query);
     $array=$this->getResultAssoc();
     return $array[0]['media'];
}

public function isAmministratore($username){
    $query="SELECT `amministratore` FROM `utente` WHERE `username`='$username'";
    $this->query($query);
    $admin=$this->getResult();
    return $admin['amministratore'];
}

public function ricercaUtenti($username,$cognome,$citta_residenza){
    if ($username OR $cognome OR $citta_residenza)
    {
        $query="SELECT * FROM `utente` WHERE";
        if ($username)
            $query.=" `username`='$username'";
        if ($cognome) {
            if ($username)
                $query.=" AND";
            $query.=" `cognome`='$cognome'";
        }
        if ($citta_residenza) {
            if ($username OR $cognome)
                $query.=" AND";
            $query.=" `citta_residenza`='$citta_residenza'";
        }
    }
    $this->query($query);
    $utenti=$this->getResultAssoc();
    return $utenti;
}


public function getUtenti($ordinamento){
    $query="SELECT * FROM `utente` ORDER BY `$ordinamento` ASC";
    $this->query($query);
    $utenti=$this->getResultAssoc();
    return $utenti;
}

/**
 * Metodo per rendere amministratore un utente
 * @param string $username
 */
public function rendi_amministratore($username){
    $query="UPDATE `utente` SET `amministratore`=1 WHERE `username`='$username'";
    return $this->query($query);
}

/**
 * Metodo per rendere l'amministratore un semplice utente
 * @param string $username
 */
public function rendi_utente($username){
    $query="UPDATE `utente` SET `amministratore`=0 WHERE `username`='$username'";
    return $this->query($query);
}

/**
 * Metodo per attivare l'account di un utente
 * @param string $username
 */
public function attiva_account($username){
    $query="UPDATE `utente` SET `stato_attivazione`=1 WHERE `username`='$username'";
    return $this->query($query);
}

/**
 * Metodo per disattivare l'account di un utente
 * @param string $username
 */
public function disattiva_account($username){
    $query="UPDATE `utente` SET `stato_attivazione`=0 , `amministratore`=0 WHERE `username`='$username'";
    return $this->query($query);
}

/**
 * Metodo per verificare lo stato di un utente
 * @param string $username
 * @return array $utente
 */
public function verifica_tipo_utente($username){
    $query="SELECT `amministratore`,`stato_attivazione` FROM `utente` WHERE `username`='$username'";
    $this->query($query);
    $utente=$this->getResult();
    return $utente;
}

public function aggiornaImmagine($username,$file_nome){
    $query="UPDATE `utente` SET `immagine_profilo`='img/$file_nome' WHERE `username`='$username'";
    return $this->query($query);
}

/**
 * Metodo per verificare se un username è già utilizzato o meno
 * @param string $username
 * @return array $trovato
 */
public function verificaUsername($username){
    $query="SELECT `username` FROM `utente` WHERE `username`='$username'";
    $this->query($query);
    $trovato=$this->getResult();
    return $trovato;
}

/**
 * Metodo per verificare se un'email è già utilizzata o meno
 * @param string $email
 * @return array $trovato
 */
public function verificaEmail($email){
    $query="SELECT `username`,`email` FROM `utente` WHERE `email`='$email'";
    $this->query($query);
    $trovato=$this->getResult();
    return $trovato;
}

public function verificaCodFiscale($cod_fiscale){
    $query="SELECT `cod_fiscale` FROM `utente` WHERE `cod_fiscale`='$cod_fiscale'";
    $this->query($query);
    $trovato=$this->getResult();
    return $trovato;
}

public function impostaPassword($username,$password){
    $query="UPDATE `utente` SET `password`='$password' WHERE `username`='$username'";
    return $this->query($query);
}

}
?>

