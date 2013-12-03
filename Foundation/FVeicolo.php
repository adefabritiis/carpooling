<?php
class FVeicolo extends FDatabase{
    public function __construct() {
        $this->_table='veicolo';
        $this->_key='targa';
        $this->_return_class='EVeicolo';
        USingleton::getInstance('FDatabase');
    }
 
 
 public function getVeicolo($num_viaggio){
     $query="SELECT * FROM `guidatore` WHERE `num_viaggio`='$num_viaggio'";
     $this->query($query);
     $array=$this->getResultAssoc();
     return $array;
 }
 
 // funzione che restituisce la targa di un veicolo appartenente a un determinato utente
 public function getVeicoli($username){
     $query="SELECT `targa` FROM `veicolo` WHERE `username_proprietario` = '$username'";
     $this->query($query);
     $array=$this->getResultAssoc();
     return $array;
 }
 
 // funzione che restituisce il numero di posti di un determinato veicolo
 public function getPostiVeicolo($targa_presa){
     $query="SELECT `num_posti` FROM `veicolo` WHERE `targa` = '$targa_presa'";
     $this->query($query);
     $posti=$this->getResult();
     return $posti;
 }
}

?>
