<?php
class FPasseggero extends FDatabase{
    public $_double_key=array();
    
    public function __construct() {
        $this->_table='passeggero';
        $this->_double_key[]=array('key1'=>'username', 'key2'=>'num_viaggio');
        $this->_return_class='EPasseggero';
        USingleton::getInstance('FDatabase');
    }
    
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
    
    public function oggettoPasseggero($num_viaggio,$username){
        $query="SELECT * FROM `passeggero` WHERE `num_viaggio`='$num_viaggio' AND `username_passeggero`='$username'";
        $this->query($query);
        $array_passeggeri=$this->getResultAssoc();
        return $array_passeggeri;
    }
    
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
    
    public function loadPasseggeri($num_viaggio){
        $query="SELECT * FROM `passeggero` WHERE `num_viaggio`='$num_viaggio'";
        $this->query($query);
        $array_passeggeri=$this->getResultAssoc();
        return $array_passeggeri;
    }
    
    public function confermaVotazionePasseggero($num_viaggio, $username){
        $query="UPDATE `passeggero` SET `votato` = 1 WHERE `num_viaggio`='$num_viaggio' AND `username_passeggero`='$username'";
        return $this->query($query);
    }
    
    public function votaPasseggero($num_viaggio, $username, $feedback, $commento){
        $query="UPDATE `passeggero` SET `feedback_guid`='$feedback', `commento_guid`='$commento' WHERE `num_viaggio`='$num_viaggio' AND `username_passeggero`='$username'";
        return $this->query($query);
    }
    
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
    
    public function cancellaPasseggero($num_viaggio, $username){
        $query= "DELETE FROM `passeggero` WHERE `num_viaggio`='$num_viaggio' AND `username_passeggero`='$username'";
        return $this->query($query);
    }
    
    public function eliminaTuttiPasseggeri($num_viaggio,$array_passeggeri){
        for( $i=0; $i<count($array_passeggeri); $i++){
            $query= "DELETE FROM `passeggero` WHERE `num_viaggio`='$num_viaggio' AND `username_passeggero`='$array_passeggeri[$i]['username']'";
        }
        return $this->query($query);
    }    
}
?>
