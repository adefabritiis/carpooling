<?php
class FViaggio extends FDatabase{
    public function __construct() {
        $this->_table='viaggio';
        $this->_key='num_viaggio';
        $this->_auto_increment=true;
        $this->_return_class='EViaggio';
        USingleton::getInstance('FDatabase');
    }
    
    /**
     * Metodo per ottenere il numero dell'ultimo viaggio
     * @return array 
     */
    public function getUltimoNumViaggio(){
        $query="SELECT `num_viaggio` FROM `viaggio` WHERE `num_viaggio`=(SELECT max(`num_viaggio`) FROM `viaggio`) ORDER BY `num_viaggio`";
        $this->query($query);
        $array=$this->getResultAssoc();
        return $array[0]['num_viaggio'];
    }
    
    /**
     * Metodo per effettuare la ricerca di un viaggio
     * @param string $citta_partenza
     * @param string $citta_arrivo
     * @param date $data_partenza
     * @return array 
     */
    public function cercaViaggio($citta_partenza,$citta_arrivo,$data_partenza){
        $query="SELECT * FROM `viaggio` WHERE";
        if ($citta_partenza)
            $query.=" `citta_partenza`='$citta_partenza'";
        if ($citta_arrivo) {
            if ($citta_partenza)
                $query.=" AND";
            $query.=" `citta_arrivo`='$citta_arrivo'";
        }
        if ($data_partenza) {
            if ($citta_partenza OR $citta_arrivo)
                $query.=" AND";
            $query.=" `data_partenza`='$data_partenza'";
        }
        $query.=" AND `data_partenza`>CURRENT_DATE()"; // Per estrarre solo viaggi con data successiva ad oggi
        $this->query($query);
        $array=$this->getResultAssoc();
        return $array;
    }
    
    /**
     * Metodo per ottenere la lista degli ultimi viaggi a partire dalla data corrente
     * @return array 
     */
    public function ultimiViaggi(){
        $query="SELECT `num_viaggio`,`citta_partenza`,`citta_arrivo`,`data_partenza`,`costo`,`posti_disponibili` FROM `viaggio` WHERE `data_partenza`>=CURRENT_DATE() ORDER BY `num_viaggio` DESC";
        $this->query($query);
        $array=$this->getResultAssoc();
        return $array;
    }
    
    /**
     * Metodo per ottenere la lista dei viaggi organizzati dall'utente come guidatore
     * @param string $username
     * @return array 
     */
    public function ViaggiPersonali($username){
        $query="SELECT * FROM viaggio, guidatore WHERE username_guidatore = '$username' AND viaggio.num_viaggio = guidatore.num_viaggio";
        $this->query($query);
        $array_viaggi=$this->getResultAssoc();
        return $array_viaggi;
    }
    
    /**
     * Metodo per ottenere la lista dei viaggi a cui l'utente ha partecipato come passeggero
     * @param string $username
     * @return array 
     */
    public function ViaggiPasseggero($username){
        $query="SELECT * FROM viaggio, passeggero WHERE username_passeggero = '$username' AND viaggio.num_viaggio = passeggero.num_viaggio";
        $this->query($query);
        $array_passeggero=$this->getResultAssoc();
        return $array_passeggero;
    }
    
    /**
     * Metodo per eliminare un viaggio
     * @param int $num_viaggio
     */
    public function eliminaViaggio($num_viaggio){
        $query= "DELETE FROM `viaggio` WHERE `num_viaggio`='$num_viaggio'";
        return $this->query($query);
    }
    
    
    //AMMINISTRATORE
    
    /**
     * Metodo per ottenere la lista dei viaggi
     * @param string $ordinamento
     * @return array 
     */
    public function getViaggi($ordinamento){
        $query="SELECT * FROM `viaggio` ORDER BY `$ordinamento` ASC";
        $this->query($query);
        $viaggi=$this->getResultAssoc();
        return $viaggi;
    }
    
    /**
     * Metodo per effettuare la ricerca di un viaggio
     * @param string $citta_partenza
     * @param string $citta_arrivo
     * @param date $data_partenza
     * @return array 
     */
    public function ricercaViaggi($citta_partenza, $citta_arrivo, $data_partenza){
    $query="SELECT * FROM `viaggio` WHERE";
    if ($citta_partenza OR $citta_arrivo OR $data_partenza)
    {
        if ($citta_partenza)
            $query.=" `citta_partenza`='$citta_partenza'";
        if ($citta_arrivo) {
            if ($citta_partenza)
                $query.=" AND";
            $query.=" `citta_arrivo`='$citta_arrivo'";
        }
        if ($data_partenza) {
            if ($citta_partenza OR $citta_arrivo)
                $query.=" AND";
            $query.=" `data_partenza`='$data_partenza'";
        }
    }
    $this->query($query);
    $viaggi=$this->getResultAssoc();
    return $viaggi;
}
}

?>
