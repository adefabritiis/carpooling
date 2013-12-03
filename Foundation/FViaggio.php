<?php
class FViaggio extends FDatabase{
    public function __construct() {
        $this->_table='viaggio';
        $this->_key='num_viaggio';
        $this->_auto_increment=true;
        $this->_return_class='EViaggio';
        USingleton::getInstance('FDatabase');
    }
    
    public function getUltimoNumViaggio(){
        $query="SELECT `num_viaggio` FROM `viaggio` WHERE `num_viaggio`=(SELECT max(`num_viaggio`) FROM `viaggio`) ORDER BY `num_viaggio`";
        $this->query($query);
        $array=$this->getResultAssoc();
        return $array[0]['num_viaggio'];
    }
    
    public function cercaViaggio($citta_partenza,$citta_arrivo,$data_partenza){
        $query="SELECT `num_viaggio`,`citta_partenza`,`citta_arrivo`,`data_partenza`,`costo`,`posti_disponibili` FROM `viaggio` WHERE `citta_partenza`='$citta_partenza' OR `citta_arrivo`='$citta_arrivo' OR `data_partenza`='$data_partenza'";
        $this->query($query);
        $array=$this->getResultAssoc();
        return $array;
        }
        
    public function ultimiViaggi(){
        $query="SELECT `num_viaggio`,`citta_partenza`,`citta_arrivo`,`data_partenza`,`costo`,`posti_disponibili` FROM `viaggio` ORDER BY `num_viaggio` desc LIMIT 8";
        $this->query($query);
        $array=$this->getResultAssoc();
        return $array;
    }
    
    public function ViaggiPersonali($username){
        $query="SELECT * FROM viaggio, guidatore WHERE username_guidatore = '$username' AND viaggio.num_viaggio = guidatore.num_viaggio";
        $this->query($query);
        $array_viaggi=$this->getResultAssoc();
        return $array_viaggi;
    }
    
    public function ViaggiPasseggero($username){
        $query="SELECT * FROM viaggio, passeggero WHERE username_passeggero = '$username' AND viaggio.num_viaggio = passeggero.num_viaggio";
        $this->query($query);
        $array_passeggero=$this->getResultAssoc();
        return $array_passeggero;
    }
    
    public function eliminaViaggio($num_viaggio){
        $query= "DELETE FROM `viaggio` WHERE `num_viaggio`='$num_viaggio'";
        return $this->query($query);
    }
    
   /* public function VerificaPosti($num_viaggio){
        $query="SELECT `posti_disponibili` FROM viaggio WHERE `num_viaggio` = '$num_viaggio'";
        $this->query($query);
        $=$this->getResultAssoc();
        return $posti_disponibili;
    }
    */
}

?>
