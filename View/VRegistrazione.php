<?php
class VRegistrazione extends View {
    /**
     * @var string $_layout
     */
    private $_layout='default';
    /**
     * restituisce la password passata tramite GET o POST
     *
     * @return mixed
     */
    public function getPassword() {
        if (isset($_REQUEST['password']))
            return $_REQUEST['password'];
        else
            return false;
    }
    /**
     * restituisce la username passata tramite GET o POST
     *
     * @return mixed
     */
    public function getUsername() {
        if (isset($_REQUEST['username']))
            return $_REQUEST['username'];
        else
            return false;
    }
    /**
     * @return mixed
     */
    public function getTask() {
        if (isset($_REQUEST['task']))
            return $_REQUEST['task'];
        else
            return false;
    }
    /**
     * @return mixed
     */
    public function getController() {
        if (isset($_REQUEST['controller']))
            return $_REQUEST['controller'];
        else
            return false;
    }
    
    public function getNumViaggio() {
        if (isset($_REQUEST['num_viaggio']))
            return $_REQUEST['num_viaggio'];
        else
            return false;
    }
    
     public function getUsernamePasseggero() {
        if (isset($_REQUEST['username_passeggero']))
            return $_REQUEST['username_passeggero'];
        else
            return false;
    }
    
   
    
    /**
     * @return string
     */
    public function processaTemplate() {
        $contenuto=$this->fetch('registrazione_'.$this->_layout.'.tpl');
        return $contenuto;
    }
    
     public function processaTemplateParziale() {
        $this->display('registrazione_'.$this->_layout.'.tpl');
    }
    /**
     * Restituisce l'array contenente i dati di registrazione
     *
     * @return array();
     */
    public function getDatiRegistrazione() {
        $dati_richiesti=array('username','password','password_1','nome','cognome','sesso','data_nascita','citta_nascita','citta_residenza','email','num_telefono','cod_fiscale');
        $dati=array();
        foreach ($dati_richiesti as $dato) {
            if (isset($_REQUEST[$dato]))
                
                $dati[$dato]=$_REQUEST[$dato];
                echo($dati[$dato]);
        }
		$dati["immagine_profilo"]="img/".$dati['sesso']."_imgprofilo.jpg";   
        return $dati;
    }
    /**
     * Imposta l'eventuale errore nel template
     *
     * @param string $errore
     */
    public function impostaErrore($errore){
        $this->assign('errore',$errore);
    }
     /**
     * imposta il layout
     *
     * @param string $layout
     */
    public function setLayout($layout){
        $this->_layout=$layout;
    }
    /**
     * Imposta i dati nel template identificati da una chiave ed il relativo valore
     *
     * @param string $key
     * @param mixed $valore
     */
    public function impostaDati($key,$valore){
        $this->assign($key,$valore);
    }
    /**
     * Restituisce un array contenente i dati di attivazione
     *
     * @return mixed
     */
    public function getDatiAttivazione() {
        if(isset($_REQUEST['codice_attivazione']) && isset($_REQUEST['username']))
            return array('codice'=>$_REQUEST['codice_attivazione'], 'username'=>$_REQUEST['username']);
        else
            return false;
    }
    
    

    
}

?>
