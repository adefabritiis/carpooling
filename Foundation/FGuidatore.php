<?php
class FGuidatore extends FDatabase{
    public function __construct() {
        $this->_table='guidatore';
        $this->_key='num_viaggio';
        $this->_return_class='EGuidatore';
        USingleton::getInstance('FDatabase');
    }
    
 /**
   * Metodo che che restituisce l'username del guidatore che partecipa a un determinato viaggio   
   * @param int $num_viaggio 
   * @return array 
   */   
 public function getGuidatore($num_viaggio){
     $query="SELECT `username_guidatore` FROM `guidatore` WHERE `num_viaggio`='$num_viaggio'";
     $this->query($query);
     $username_guidatore=$this->getResult();
     return $username_guidatore;
 }
 
 /**
   * Metodo che che verifica se un utente è il guidatore di un determinato viaggio  
   * @param int $num_viaggio
   * @param string $username 
   * @return array 
   */
 public function verificaGuidatore($num_viaggio,$username){
     $query="SELECT `username_guidatore` FROM `guidatore` WHERE `num_viaggio`='$num_viaggio' AND `username_guidatore`='$username'";
     $this->query($query);
     $array=$this->getResult();
     if(isset($array['username_guidatore'])){
        $guidatore_presente=true;}
     else{
        $guidatore_presente=false;}
     return $guidatore_presente;
 }
 
 /**
   * Metodo che elimina il guidatore di un determinato viaggio 
   * @param int $num_viaggio
   */
 public function eliminaGuidatore($num_viaggio){
    $query= "DELETE FROM `guidatore` WHERE `num_viaggio`='$num_viaggio'";
    return $this->query($query);
 }
}

?>
