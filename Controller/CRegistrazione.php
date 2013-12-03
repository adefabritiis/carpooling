<?php
class CRegistrazione {
    private $_username=null;
    private $_password=null;
    private $_errore='';
    private $_autenticato=false;
    
    public function getUtenteRegistrato() {
        $autenticato=false;
        $session=USingleton::getInstance('USession');
        $VRegistrazione= USingleton::getInstance('VRegistrazione');
        $task=$VRegistrazione->getTask();
        $controller=$VRegistrazione->getController();
        $this->_username=$VRegistrazione->getUsername();
        $this->_password=$VRegistrazione->getPassword();
        if ($session->leggi_valore('username')!=false) {
            $autenticato=true;
            //autenticato
        } elseif ($task=='autentica' && $controller='registrazione') {
            //controlla autenticazione
            $autenticato=$this->autentica($this->_username, $this->_password);
        }
        if ($task=='esci' && $controller='registrazione') {
            //logout
            $this->logout();
            $autenticato=false;
        }
        $VRegistrazione->impostaErrore($this->_errore);
        $this->_errore='';
        return $autenticato;
    }


/**
     * Controlla se una coppia username e password corrispondono ad un utente regirtrato ed in tal caso impostano le variabili di sessione relative all'autenticazione
     *
     * @param string $username
     * @param string $password
     * @return boolean
     */
    public function autentica($username, $password) {
        $FUtente=new FUtente();
        $utente=$FUtente->load($username);
        if ($utente!=false) {
            if ($utente->getAccountAttivo()) {
                //account attivo
                if ($username==$utente->username && $password==$utente->password) {
                    $session=USingleton::getInstance('USession');
                    $session->imposta_valore('username',$username);
                    $session->imposta_valore('nome_cognome',$utente->nome.' '.$utente->cognome);
                    $this->_autenticato=true;
                    return true;
                } else {
                    $this->_errore='Username o password errati';
                    //username password errati
                }
            } else {
                $this->_errore='L\'account non &egrave; attivo';
                //account non attivo
            }
        } else {
            $this->_errore='L\'account non esiste';
            //account non esiste
        }
        return false;
    }
    
     /**
     * Crea un utente sul database controllando che non esista già
     *
     * @return mixed
     */
     public function creaUtente() {
        $view=USingleton::getInstance('VRegistrazione');
        $dati_registrazione=$view->getDatiRegistrazione();
        $utente=new EUtente();
        $FUtente=new FUtente();
        $result = $FUtente->load($dati_registrazione['username']);
        $registrato=false;
        if ($result==false) {
            //utente non esiste
            if($dati_registrazione['password_1']==$dati_registrazione['password']) {
                unset($dati_registrazione['password_1']);
                $keys=array_keys($dati_registrazione);
                $i=0;
                foreach ($dati_registrazione as $dato) {
                    $utente->$keys[$i]=$dato;
                    $i++;
                }
                //$utente->generaCodiceAttivazione();
                $utente->setAccountAttivo();
                $FUtente->store($utente);
               
                // $this->emailAttivazione($utente);
                $registrato=true;
            } else {
                $this->_errore='Le password immesse non coincidono';
            }
        } else {
            //utente esistente
            $this->_errore='Username gi&agrave; utilizzato';
        }
        if (!$registrato) {
            $view->impostaErrore($this->_errore);
            $this->_errore='';
            $view->setLayout('problemi');
            $result=$view->processaTemplate();
            $view->setLayout('modulo');
            $result.=$view->processaTemplate();
            $view->impostaErrore('');
            return $result;
        } else {
            $view->setLayout('conferma_registrazione');
            return $view->processaTemplate();
        }
     }
     
    
    /**
     * Mostra il modulo di registrazione
     *
     * @return string
     */
    public function moduloRegistrazione() {
        $VRegistrazione=USingleton::getInstance('VRegistrazione');
        $VRegistrazione->setLayout('modulo');
        return $VRegistrazione->processaTemplate();
    }
    /**
     * EfFettua il logout
     */
    public function logout() {
        $session=USingleton::getInstance('USession');
        $session->cancella_valore('username');
        $session->cancella_valore('nome_cognome');
        $view=USingleton::getInstance('CRicerca');
        return $view->ultimiViaggi(); 
    }
    
    public function visualizzaProfilo() {
        $session = USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        $view=Usingleton::getInstance('VRegistrazione');
        $view->setLayout('visualizza_profilo');
        $FUtente=new FUtente();
        $utente=$FUtente->load($username);
	$view->impostaDati('immagine_profilo',$utente->immagine_profilo);
        $view->impostaDati('username',$utente->username);
        $view->impostaDati('nome',$utente->nome);
        $view->impostaDati('cognome',$utente->cognome);
        $view->impostaDati('data_nascita',$utente->data_nascita);
        $view->impostaDati('citta_residenza',$utente->citta_residenza);
	$view->impostaDati('citta_nascita',$utente->citta_nascita);
        $view->impostaDati('email',$utente->email);
        $dati_guidatore= $FUtente->getMediaGuidatore($username);
        $dati_passeggero= $FUtente->getMediaPasseggero($username);
        $view->impostaDati('media_feedback_guidatore',$dati_guidatore[0]);
        $view->impostaDati('num_viaggi_guid',$dati_guidatore[1]);
        $view->impostaDati('media_feedback_passeggero',$dati_passeggero);
        return $view->processaTemplateParziale();
        
    }
    
    public function visualizzaUtente($username){
        $view=Usingleton::getInstance('VRegistrazione');
        $view->setLayout('visualizza_profilo_utente');
        $FUtente=new FUtente();
        $utente=$FUtente->load($username);
	$view->impostaDati('immagine_profilo',$utente->immagine_profilo);
        $view->impostaDati('username',$utente->username);
        $view->impostaDati('nome',$utente->nome);
        $view->impostaDati('cognome',$utente->cognome);
        $view->impostaDati('data_nascita',$utente->data_nascita);
        $view->impostaDati('citta_residenza',$utente->citta_residenza);
	$view->impostaDati('citta_nascita',$utente->citta_nascita);
        $view->impostaDati('email',$utente->email);
        $dati_guidatore= $FUtente->getMediaGuidatore($username);
        $dati_passeggero= $FUtente->getMediaPasseggero($username);
        $view->impostaDati('media_feedback_guidatore',$dati_guidatore[0]);
        $view->impostaDati('num_voti_guid',$dati_guidatore[1]);
        $view->impostaDati('media_feedback_passeggero',$dati_passeggero);
        $view->processaTemplateParziale();
    }
    
    public function gestisciProfilo(){
        $view=Usingleton::getInstance('VRegistrazione');
        $view->setLayout('gestisci_profilo');
        $session = USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        $FUtente=new FUtente();
        $utente=$FUtente->load($username);
        $view->impostaDati('username', $utente->username);
	$view->impostaDati('immagine_profilo',$utente->immagine_profilo);
	$FVeicolo = new FVeicolo();
        $array= $FVeicolo->getVeicoli($username);
        $view->impostaDati('array',$array);
        return $view->processaTemplateParziale();
        
    }
    
    public function confermaLogin() {
        if ($this->_autenticato) { 
            $controller=USingleton::getInstance('CRicerca');
            return $controller->ultimiViaggi(); }
        else {
            $view=USingleton::getInstance('VRegistrazione');
            $view->setLayout('problemi');
            return $view->processaTemplate();
        }
    }
    
    public function gestisciViaggi(){
        $view=Usingleton::getInstance('VRegistrazione');
        $session = USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        $FViaggio= new FViaggio();
        $array_viaggi= $FViaggio->ViaggiPersonali($username);
        $array_passeggero= $FViaggio->ViaggiPasseggero($username);
        $view->impostaDati('array_passeggero', $array_passeggero);
        $view->impostaDati('array_viaggi',$array_viaggi);
        $view->setLayout('gestisci_viaggi');
        return $view->processaTemplateParziale();
            
        
    }
    
     /**
     * Smista le richieste ai relativi metodi della classe
     * 
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VRegistrazione');
        switch ($view->getTask()) {
            case 'registra':
                return $this->moduloRegistrazione();
            case 'salva':
                return $this->creaUtente();
            case 'attivazione':
                return $this->attivazione();
            case 'visualizza_profilo':
                return $this->visualizzaProfilo();
            case 'gestisci_profilo':
                return $this->gestisciProfilo();
            case 'gestisci_viaggi':
                return $this->gestisciViaggi();
            case 'autentica':
                return $this->confermaLogin();
            case 'esci':
                return $this->logout();
            case 'visualizza_utente':
                return $this->visualizzaUtente($view->getUsername());
        }
    }
}
?>
