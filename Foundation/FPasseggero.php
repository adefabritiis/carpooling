<?php
class FPasseggero extends FDatabase{
    public $_double_key=array();
    
    public function __construct() {
        $this->_table='passeggero';
        $this->_double_key[]=array('key1'=>'username', 'key2'=>'num_viaggio');
        $this->_return_class='EPasseggero';
        USingleton::getInstance('FDatabase');
    }
    
    /**
      * Metodo che verifica se un utente è il passeggero in un determinato viaggio
      * @param int $num_viaggio 
      * @param string $username
      * @return mixed
      */
    public function verificaPasseggero($num_viaggio, $username){
        $query="SELECT `username_passeggero` FROM `passeggero` WHERE `num_viaggio`='$num_viaggio' AND `username_passeggero`='$username'";
        $this->query($query);
        $array=$this->getResult();
        if(isset($array['username_passeggero'])){
            $passeggero_presente= true;}
        else{
            $passeggero_presente= false;}
        return $passeggero_presente;
    }
    
    /**
      * Metodo che carica un'istanza del passeggero che partecipa a un determinato viaggio
      * @param int $num_viaggio 
      * @param string $username
      * @return array 
      */
    public function oggettoPasseggero($num_viaggio,$username){
        $query="SELECT * FROM `passeggero` WHERE `num_viaggio`='$num_viaggio' AND `username_passeggero`='$username'";
        $this->query($query);
        $array_passeggeri=$this->getResultAssoc();
        return $array_passeggeri;
    }
    
    /**
      * Metodo che carica l'username del passeggero che partecipa a un determinato viaggio
      * @param int $num_viaggio 
      * @param string $username
      * @return array 
      */
    public function loadPasseggero($num_viaggio,$username){
        $query="SELECT `username_passeggero` FROM `passeggero` WHERE `num_viaggio`='$num_viaggio' AND `username_passeggero`='$username'";
        $this->query($query);
        $array=$this->getResult();
        return $array;
    }
    
    
    public function votoPasseggero($num_viaggio,$username){
        $query="SELECT `feedback_guid` FROM `passeggero` WHERE `num_viaggio`='$num_viaggio' AND `username_passeggero`='$username'";
        $this->query($query);
        $array=$this->getResult();
        return $array;
    }
    
    /**
      * Metodo che carica i passeggeri che partecipano a un determinato viaggio
      * @param int $num_viaggio 
      * @return array 
      */
    public function loadPasseggeri($num_viaggio){
        $query="SELECT * FROM `passeggero` WHERE `num_viaggio`='$num_viaggio'";
        $this->query($query);
        $array_passeggeri=$this->getResultAssoc();
        return $array_passeggeri;
    }
    
    /**
      * Metodo che conferma la votazione effettuata da un passeggero nei confronti di un guidatore per un determinato viaggio
      * @param int $num_viaggio 
      * @param string $username
      */
    public function confermaVotazionePasseggero($num_viaggio, $username){
        $query="UPDATE `passeggero` SET `votato` = 1 WHERE `num_viaggio`='$num_viaggio' AND `username_passeggero`='$username'";
        return $this->query($query);
    }
    
    /**
      * Metodo che aggiorna il feedback e i commenti rilasciati dal guidatore al passeggero
      * @param int $num_viaggio 
      * @param string $username
      * @param string $feedback
      * @param string $commento
      */
    public function votaPasseggero($num_viaggio, $username, $feedback, $commento){
        $query="UPDATE `passeggero` SET `feedback_guid`='$feedback', `commento_guid`='$commento' WHERE `num_viaggio`='$num_viaggio' AND `username_passeggero`='$username'";
        return $this->query($query);
    }
    
    /**
      * Metodo che verifica se un passeggero ha gia votato il guidatore di un determinato viaggio
      * @param int $num_viaggio 
      * @param string $username
      * @return boolean
      */
    public function viaggioVotato($num_viaggio,$username){
        $query="SELECT * FROM `passeggero` WHERE `num_viaggio`='$num_viaggio' AND `username_passeggero`='$username'";
        $this->query($query);
        $array=$this->getResult();
        $votato= $array['votato'];
        if(!isset($votato)){
            $votato=0;
        }
        return $votato;
    }
    
    /**
      * Metodo per eliminare un passeggero di un viaggio
      * @param int $num_viaggio 
      * @param string $username
      */
    public function cancellaPasseggero($num_viaggio, $username){
        $query= "DELETE FROM `passeggero` WHERE `num_viaggio`='$num_viaggio' AND `username_passeggero`='$username'";
        return $this->query($query);
    }
    
    /**
      * Metodo per eliminare tutti i passeggeri di un viaggio
      * @param int $num_viaggio 
      * @param array $array_passeggeri
      */
    public function eliminaTuttiPasseggeri($num_viaggio,$array_passeggeri){
        for( $i=0; $i<count($array_passeggeri); $i++){
            $query= "DELETE FROM `passeggero` WHERE `num_viaggio`='$num_viaggio' AND `username_passeggero`='$array_passeggeri[$i]['username']'";
        }
        return $this->query($query);
    }    
}
?>
