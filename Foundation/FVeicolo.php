<?php
class FVeicolo extends FDatabase{
    public function __construct() {
        $this->_table='veicolo';
        $this->_key='targa';
        $this->_return_class='EVeicolo';
        USingleton::getInstance('FDatabase');
    }
 
 /**
   * Metodo che restituisce le caratteristiche di un veicolo associato a un determinato viaggio
   * @param int $num_viaggio
   * @return array 
   */
 public function getVeicolo($num_viaggio){
     $query="SELECT * FROM `guidatore` WHERE `num_viaggio`='$num_viaggio'";
     $this->query($query);
     $array=$this->getResultAssoc();
     return $array;
 }
 /**
   * Metodo che restituisce la targa e il tipo di un veicolo appartenente a un determinato utente
   * @param string $username
   * @return array 
   */ 
 public function getVeicoli($username){
     $query="SELECT `targa`,`tipo` FROM `veicolo` WHERE `username_proprietario` = '$username' AND `attuale`=1";
     $this->query($query);
     $array=$this->getResultAssoc();
     return $array;
 }
 
 /**
   * Metodo che restituisce il numero di posti di un determinato veicolo
   * @param string $targa_presa
   * @return array 
   */ 
 public function getPostiVeicolo($targa_presa){
     $query="SELECT `num_posti` FROM `veicolo` WHERE `targa` = '$targa_presa'";
     $this->query($query);
     $posti=$this->getResult();
     return $posti;
 }
 
 /**
   * Metodo per eliminare un veicolo
   * @param string $targa
   */
 public function eliminaVeicolo($targa){
     $query="UPDATE `veicolo` SET `attuale`=0 WHERE `targa`='$targa'";
     return $this->query($query);
 }
 
 /**
 * Metodo per verificare se una targa è già utilizzata o meno
 * @param string $email
 * @return array $trovato
 */
public function verificaTarga($targa){
    $query="SELECT `targa` FROM `veicolo` WHERE `targa`='$targa'";
    $this->query($query);
    $trovato=$this->getResult();
    return $trovato;
}
}

?>
