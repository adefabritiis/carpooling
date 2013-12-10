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

public function rendi_amministratore($username){
    $query="UPDATE `utente` SET `amministratore`=1 WHERE `username`='$username'";
    return $this->query($query);
}

public function rendi_utente($username){
    $query="UPDATE `utente` SET `amministratore`=0 WHERE `username`='$username'";
    return $this->query($query);
}

public function attiva_account($username){
    $query="UPDATE `utente` SET `stato_attivazione`=1 WHERE `username`='$username'";
    return $this->query($query);
}

public function disattiva_account($username){
    $query="UPDATE `utente` SET `stato_attivazione`=0 , `amministratore`=0 WHERE `username`='$username'";
    return $this->query($query);
}

public function verifica_tipo_utente($username){
    $query="SELECT `amministratore`,`stato_attivazione` FROM `utente` WHERE `username`='$username'";
    $this->query($query);
    $utente=$this->getResult();
    return $utente;
}
}
?>

