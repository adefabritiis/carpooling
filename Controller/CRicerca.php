<?php
/**
 * @access public
 * @package Controller
 */
class CRicerca {
     
    private $_viaggi_per_pagina=8;
    
    public function index() {
        $view = USingleton::getInstance('VHome');
        $view->setController('prova');
        return $view->processaTemplate();
    }
   
    public function ultimiViaggi(){
        $view=USingleton::getInstance('VRicerca');
        $FViaggio=new FViaggio();
        $viaggi=$FViaggio->ultimiViaggi();
        $view->mostraListaUltimiViaggi($viaggi);
        return $view->processaTemplate();
    }
    
    public function inserisciViaggio() {
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false) {
            $view=Usingleton::getInstance('VRicerca');
            $FVeicolo= new FVeicolo();
            $targa_presa=$view->getTarga();
            $posti= $FVeicolo->getPostiVeicolo($targa_presa);
            $EViaggio=new EViaggio();
            $EViaggio->citta_partenza=$view->getCittaPartenza();
            $EViaggio->citta_arrivo=$view->getCittaArrivo();
            $EViaggio->data_partenza=$view->getDataPartenza();
            $EViaggio->note=$view->getNote();
            $EViaggio->posti_disponibili=$posti['num_posti'];
            $FViaggio=new FViaggio();
            $FViaggio->store($EViaggio);
            $num_viaggio=$FViaggio->getUltimoNumViaggio();
            $EGuidatore=new EGuidatore();
            $EGuidatore->username_guidatore=$username;
            $EGuidatore->num_viaggio=$num_viaggio;
            $EGuidatore->targa=$view->getTarga();
            $FGuidatore=new FGuidatore();
            $FGuidatore->store($EGuidatore);
            $this->riepilogoViaggio($num_viaggio);
        }
        else $this->errore_aggiornamento();
    }
    
    public function aggiungiVeicolo(){
            $session=USingleton::getInstance('USession');
            $username=$session->leggi_valore('username');
            if ($username!=false) {
                $view=USingleton::getInstance('VRicerca');
                $EVeicolo=new EVeicolo();
                $EVeicolo->targa=$view->getTarga();
                $EVeicolo->username_proprietario=$username;
                $EVeicolo->tipo=$view->getTipo();
                $EVeicolo->num_posti=$view->getNumPosti();
                $EVeicolo->carburante=$view->getCarburante();
                $EVeicolo->consumo_medio=$view->getConsumoMedio();
                $FVeicolo=new FVeicolo();
                $FVeicolo->store($EVeicolo);
                if($_REQUEST['da']=='inserisci'){
                    //$this->inserimentoViaggio();
                    $FVeicolo=new FVeicolo();
                    $veicoli=$FVeicolo->getVeicoli($username);
                    $view->impostaDati('veicoli',$veicoli);
                    $view->setLayout('menu_veicolo');
                    $view->processaTemplateParziale();
                }else{
                    $CRegistrazione=USingleton::getInstance('CRegistrazione');
                    $CRegistrazione->gestisciProfilo();
                }
            }
            else $this->errore_aggiornamento();
    }
    
    public function inserimentoVeicolo(){
            $session=USingleton::getInstance('USession');
            $username=$session->leggi_valore('username');
            if ($username!=false) {
                $view=USingleton::getInstance('VRicerca');
                $view->setLayout('veicolo');
                $da=$view->getDa();
                $view->impostaDati('da',$da);
                $view->impostaDati('citta_partenza',$view->getCittaPartenza());
                $view->impostaDati('citta_arrivo',$view->getCittaArrivo());
                $view->impostaDati('data_partenza',$view->getDataPartenza());
                $view->processaTemplateParziale();
            }
            else $this->errore_aggiornamento();
    }
    
    public function riepilogoViaggio($num_viaggio){
            $FViaggio=new FViaggio();
            $viaggio=$FViaggio->load($num_viaggio);
            $view=USingleton::getInstance('VRicerca');
            $view->impostaDati('num_viaggio',$viaggio->num_viaggio);
            $view->impostaDati('citta_partenza',$viaggio->citta_partenza);
            $view->impostaDati('citta_arrivo',$viaggio->citta_arrivo);
            $view->impostaDati('data_partenza',$viaggio->data_partenza);
            $view->impostaDati('note',$viaggio->note);
            $view->impostaDati('posti_disponibili',$viaggio->posti_disponibili);
            $FVeicolo= new FVeicolo();
            $array= $FVeicolo->getVeicolo($num_viaggio);
            $veicolo= $FVeicolo->load($array[0]['targa']);
            $view->impostaDati('targa',$veicolo->targa);
            $view->impostaDati('tipo',$veicolo->tipo);
            $view->impostaDati('num_posti',$veicolo->num_posti);
            $view->impostaDati('carburante',$veicolo->carburante);
            $view->impostaDati('consumo_medio',$veicolo->consumo_medio);
            $FGuidatore= new FGuidatore();
            $username_guidatore= $FGuidatore->getGuidatore($num_viaggio);
            $view->impostaDati('username_guidatore',$username_guidatore['username_guidatore']);
            $loggato=false;
            $session=USingleton::getInstance('USession');
            $username=$session->leggi_valore('username');
            if ($username!="") {$loggato=true;}
            $view->impostaDati('loggato',$loggato);
            $view->impostaDati('username_passeggero',$username);
            $FPasseggero= new FPasseggero();
            $isPasseggero= $FPasseggero->verificaPasseggero($num_viaggio,$username);
            $view->impostaDati('isPasseggero',$isPasseggero);
            $array_passeggeri= $FPasseggero->loadPasseggeri($num_viaggio);
            $view->impostaDati('array_passeggeri',$array_passeggeri);
            $votato= $FPasseggero->viaggioVotato($num_viaggio,$username);
            $view->impostaDati('votato',$votato);
            $FGuidatore= new FGuidatore();
            $isGuidatore= $FGuidatore->verificaGuidatore($num_viaggio,$username);
            $view->impostaDati('isGuidatore',$isGuidatore);
            $view->setLayout('riepilogo');
            echo("pass:".$isPasseggero);
            echo("guid:".$isGuidatore);
            echo("loggato:".$loggato);
            echo ("posti:".$viaggio->posti_disponibili);
            return $view->processaTemplateParziale();
            
     }
     
     public function partecipaViaggio($num_viaggio){
            $session=USingleton::getInstance('USession');
            $username=$session->leggi_valore('username');
            if ($username!=false) {
                $FPasseggero= new FPasseggero();
                $passeggero_presente= $FPasseggero->verificaPasseggero($num_viaggio,$username);
                $FGuidatore= new FGuidatore();
                $guidatore_presente= $FGuidatore->verificaGuidatore($num_viaggio,$username);
                if(!$passeggero_presente && !$guidatore_presente ){
                    $EPasseggero= new EPasseggero();
                    $EPasseggero->username_passeggero=$username;
                    $EPasseggero->num_viaggio=$num_viaggio;
                    $FPasseggero= new FPasseggero();
                    $FPasseggero->store($EPasseggero);
                    $FViaggio=new FViaggio();
                    $viaggio=$FViaggio->load($num_viaggio);
                    $posti=$viaggio->posti_disponibili;
                    $posti--;
                    $viaggio->posti_disponibili=$posti;
                    $FViaggio->update($viaggio);
                    $this->riepilogoViaggio($num_viaggio);
                }
                else{
                    $view=USingleton::getInstance('VRicerca');
                    $view->setLayout('riepilogo');
                    return $view->processaTemplateParziale();
                }
            }
            else $this->errore_aggiornamento();
     }
     
     public function cancellaPasseggero($num_viaggio, $username){
            $session=USingleton::getInstance('USession');
            $username=$session->leggi_valore('username');
            if ($username!=false) {
                $FPasseggero= new FPasseggero();
                $passeggero_presente= $FPasseggero->verificaPasseggero($num_viaggio,$username);
                if($passeggero_presente){
                    $FPasseggero->cancellaPasseggero($num_viaggio, $username);
                    $FViaggio=new FViaggio();
                    $viaggio=$FViaggio->load($num_viaggio);
                    $posti=$viaggio->posti_disponibili;
                    $posti++;
                    $viaggio->posti_disponibili=$posti;
                    $FViaggio->update($viaggio);
                    $this->riepilogoViaggio($num_viaggio); 
                }
            }
            else $this->errore_aggiornamento();
     }
     
    public function ricarica_veicoli() {
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false) {
            $view=USingleton::getInstance('VRicerca');
            $view->setLayout('menu_veicolo');
            $FVeicolo=new FVeicolo();
            $veicoli=$FVeicolo->getVeicoli($username);
            $view->impostaDati('veicoli',$veicoli);
            return $view->processaTemplateParziale();
        }
        else $this->errore_aggiornamento();
    }
     
     public function inserimentoViaggio(){
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false) {
            $view=USingleton::getInstance('VRicerca');
            $view->setLayout('inserisci');
            $FVeicolo=new FVeicolo();
            $veicoli=$FVeicolo->getVeicoli($username);
            $view->impostaDati('veicoli',$veicoli);
     }
        else {
            $view=USingleton::getInstance('VRicerca');
            $view->setLayout('errore');
        }
        return $view->processaTemplateParziale();
     }
     
    public function ricercaViaggio() {
            $view=USingleton::getInstance('VRicerca');
            $view->setLayout('avanzata');
            $view->processaTemplateParziale();   
    }
    
    public function invioRicerca() {
            $view=USingleton::getInstance('VRicerca');
            $view->setLayout('elenco');
            $this->_viaggi_per_pagina=8;
            $citta_partenza=$view->getCittaPartenza();
            $citta_arrivo=$view->getCittaArrivo();
            $data_partenza=$view->getDataPartenza();
            $FViaggio=new FViaggio();
            $viaggi=$FViaggio->cercaViaggio($citta_partenza,$citta_arrivo,$data_partenza);
            $view->mostraListaViaggi($viaggi);
    }
    
     public function inserisciFeedback($num_viaggio){
            $session=USingleton::getInstance('USession');
            $username=$session->leggi_valore('username');
            if ($username!=false) {
                $FPasseggero= new FPasseggero();
                $array= $FPasseggero->loadPasseggero($num_viaggio, $username);
                $array_passeggeri= $FPasseggero->loadPasseggeri($num_viaggio);
                $FGuidatore= new FGuidatore();
                $EGuidatore= $FGuidatore->getGuidatore($num_viaggio);
                $FViaggio= new FViaggio();
                $EViaggio= $FViaggio->load($num_viaggio);
                if($username==$array['username_passeggero']){
                    $view=USingleton::getInstance('VRicerca');
                    $view->impostaDati('num_viaggio',$num_viaggio);
                    $view->impostaDati('username_guidatore',$EGuidatore['username_guidatore']);
                    $view->impostaDati('citta_partenza',$EViaggio->citta_partenza);
                    $view->impostaDati('citta_arrivo',$EViaggio->citta_arrivo);
                    $view->impostaDati('data_partenza',$EViaggio->data_partenza);
                    $view->setLayout('feedback_passeggero');
                    $view->processaTemplateParziale();
                }
                elseif($username==$EGuidatore['username_guidatore']){
                    $view=USingleton::getInstance('VRicerca');
                    $view->impostaDati('username_passeggero',$view->getUsernamePasseggero());
                    $view->impostaDati('num_viaggio',$num_viaggio);
                    $view->impostaDati('citta_partenza',$EViaggio->citta_partenza);
                    $view->impostaDati('citta_arrivo',$EViaggio->citta_arrivo);
                    $view->impostaDati('data_partenza',$EViaggio->data_partenza);
                    $view->setLayout('feedback_guidatore');
                    $view->processaTemplateParziale();
                }
            }
            else $this->errore_aggiornamento();
    }
    
    public function verificaValutazione($num_viaggio){
            $session=USingleton::getInstance('USession');
            $username=$session->leggi_valore('username');
            $view=USingleton::getInstance('VRicerca');
            $voto=$view->getValutazione();
            $commento=$view->getCommento();
            $FGuidatore= new FGuidatore();
            $EGuidatore= $FGuidatore->load($num_viaggio);
            $num_voti= $EGuidatore->num_voti;
            $voto_totale= $EGuidatore->voto_totale;
            $commenti_presenti=$EGuidatore->commento;
            $EGuidatore->commento=$commenti_presenti." ".$username.": ".$commento;
            $num_voti++;
            $voto_totale= $voto_totale+ $voto;
            $EGuidatore->num_voti= $num_voti;
            $EGuidatore->voto_totale= $voto_totale;
            $FGuidatore->update($EGuidatore);
            $FPasseggero= new FPasseggero();
            $array= $FPasseggero->oggettoPasseggero($num_viaggio, $username);
            $EPasseggero= new EPasseggero();
            $EPasseggero->commento_guid= $array[0]['commento_guid'];
            $EPasseggero->feedback_guid= $array[0]['feedback_guid'];
            $EPasseggero->num_viaggio= $array[0]['num_viaggio'];
            $EPasseggero->username_passeggero= $array[0]['username_passeggero'];
            $EPasseggero->votato= 1;
            $votato= $EPasseggero->votato;
            $FPasseggero->confermaVotazionePasseggero($num_viaggio, $username);
            $view->impostaDati('votato',$votato);
            $view->setLayout('conferma_valutazione');
            $view->processaTemplateParziale();
    }
    
    public function verificaValutazioneGuidatore($num_viaggio,$username_passeggero){
            $session=USingleton::getInstance('USession');
            $username_guidatore=$session->leggi_valore('username');
            $view=USingleton::getInstance('VRicerca');
            $FPasseggero= new FPasseggero();
            $array= $FPasseggero->oggettoPasseggero($num_viaggio, $username_passeggero);
            $feedback= $view->getValutazione();
            $commento= $view->getCommento();
            $FPasseggero->votaPasseggero($num_viaggio,$username_passeggero,$feedback,$commento);
            $view->setLayout('conferma_valutazione');
            $view->processaTemplateParziale();        
    }
    
    public function riepilogoVeicolo($targa){
            $session=USingleton::getInstance('USession');
            $username=$session->leggi_valore('username');
            if ($username!=false) {
                $FVeicolo=new FVeicolo();
                $EVeicolo=$FVeicolo->load($targa);
                $view=Usingleton::getInstance('VRicerca');
                $view->impostaDati('targa',$targa);
                $view->impostaDati('tipo',$EVeicolo->tipo);
                $view->impostaDati('num_posti',$EVeicolo->num_posti);
                $view->impostaDati('carburante',$EVeicolo->carburante);
                $view->impostaDati('consumo_medio',$EVeicolo->consumo_medio);
                $view->setLayout('riepilogo_veicolo');
                $view->processaTemplateParziale();
            }
            else $this->errore_aggiornamento();
    }
    
    public function eliminaViaggio($num_viaggio){
            $session=USingleton::getInstance('USession');
            $username=$session->leggi_valore('username');
            if ($username!=false) {
                $FViaggio=new FViaggio();
                $FViaggio->eliminaViaggio($num_viaggio);
                $view=Usingleton::getInstance('VRicerca');
                $view->setLayout('viaggio_eliminato');
                $view->processaTemplateParziale();
            }
            else $this->errore_aggiornamento();
    }
    
    public function eliminaVeicolo($targa){
            $session=USingleton::getInstance('USession');
            $username=$session->leggi_valore('username');
            if ($username!=false) {
                $FVeicolo=new FVeicolo();
                $FVeicolo->eliminaVeicolo($targa);
                $view=Usingleton::getInstance('VRicerca');
                $view->setLayout('veicolo_eliminato');
                $view->processaTemplateParziale();
            }
            else $this->errore_aggiornamento();
    }
    
    public function errore_aggiornamento(){
        $view=USingleton::getInstance('VRegistrazione');
        $view->setControllerTaskDefault();
        $view->setLayout('errore_aggiornamento');
        return $view->processaTemplateParziale();
    }
        
    public function amministraUtenti($ordinamento){
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        $amministratore=$session->leggi_valore('amministratore');
        if ($username!=false && $amministratore) {
            $FUtente=new FUtente();
            $utenti=$FUtente->getUtenti($ordinamento);
            $view=USingleton::getInstance('VRicerca');
            $view->mostraListaUtenti($utenti);
            $view->impostaDati('avanzata',false);
            $view->setLayout('amministra_utenti');
            return $view->processaTemplateParziale();
        }
        else $this->errore_aggiornamento();
    }
    
    public function ricercaUtenti($username_ricerca,$cognome,$citta_residenza){
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        $amministratore=$session->leggi_valore('amministratore');
        if ($username!=false && $amministratore) {
            $view=USingleton::getInstance('VRicerca');
            $FUtente=new FUtente();
            $utenti=$FUtente->ricercaUtenti($username_ricerca,$cognome,$citta_residenza);
            $view->mostraListaUtenti($utenti);
            $view->setLayout('amministra_utenti_lista');
            return $view->processaTemplateParziale();
        }
        else $this->errore_aggiornamento();
    }
    /**
     * Smista le richieste ai vari metodi
     *
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VRegistrazione');
        switch ($view->getTask()) {
            case 'inserimento':
                return $this->inserimentoViaggio();
            case 'inserisci':
                return $this->inserisciViaggio();
            case 'cerca':
                return $this->ricercaViaggio();
            case 'invio_ricerca':
                return $this->invioRicerca();
            case 'riepilogo_viaggio':
                return $this->riepilogoViaggio($view->getNumViaggio());
            case 'aggiungi_veicolo':
                return $this->aggiungiVeicolo();
            case 'inserimento_veicolo':
                return $this->inserimentoVeicolo();
            case 'partecipa_viaggio':
                return $this->partecipaViaggio($view->getNumViaggio());
            case 'cancella_passeggero':
                return $this->cancellaPasseggero($view->getNumViaggio(),$view->getUsernamePasseggero());
            case 'inserisci_feedback':
                return $this->inserisciFeedback($view->getNumViaggio());
            case 'conferma_valutazione':
                return $this->verificaValutazione($view->getNumViaggio());
            case 'verifica_valutazione_guidatore':
                return $this->verificaValutazioneGuidatore($view->getNumViaggio(), $view->getUsernamePasseggero());
            case 'elimina_viaggio':
                return $this->eliminaViaggio($view->getNumviaggio());
            case 'riepilogo_veicolo':
                return $this->riepilogoVeicolo($view->getTarga());
            case 'elimina_veicolo':
                return $this->eliminaVeicolo($view->getTarga());
            case 'amministra_utenti':
                return $this->amministraUtenti($view->getOrdinamento());
            case 'amministra_viaggi':
                return $this->amministraViaggi();
            case 'ricerca_utenti':
                return $this->ricercaUtenti($view->getUsernameRicerca(),$view->getCognomeRicerca(),$view->getCittaRicerca());
        }
    }
}
?>
