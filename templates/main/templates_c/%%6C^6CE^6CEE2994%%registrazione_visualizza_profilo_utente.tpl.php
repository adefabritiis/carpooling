<?php /* Smarty version 2.6.26, created on 2013-12-28 18:40:06
         compiled from registrazione_visualizza_profilo_utente.tpl */ ?>
<br>
<script src="js/amministrazione_utenti.js"></script>
<h1 class="pagetitle">Dati profilo</h1>
<div>
    <h1 class="block">&nbsp<?php echo $this->_tpl_vars['username']; ?>
&nbsp</h1>
</div>
<div class="column1-unit">
    <div class="contactform">
        <h1><b><?php echo $this->_tpl_vars['nome']; ?>
&nbsp<?php echo $this->_tpl_vars['cognome']; ?>
</b></h1>
        <h3><?php echo $this->_tpl_vars['citta_residenza']; ?>
</h3>                    
        <p><img src=<?php echo $this->_tpl_vars['immagine_profilo']; ?>
 alt="Image description"/></p>
        <p>Valutazione guidatore: <?php echo $this->_tpl_vars['media_feedback_guidatore']; ?>
(<?php echo $this->_tpl_vars['num_viaggi_guid']; ?>
)</p>
        <p>Valutazione passeggero: <?php echo $this->_tpl_vars['media_feedback_passeggero']; ?>
</p>
        <?php if ($this->_tpl_vars['partecipa'] || $this->_tpl_vars['loggato_amministratore']): ?>
            <p>Email:<b>&nbsp<?php echo $this->_tpl_vars['email']; ?>
</b></p>
            <p>Numero di telefono:<b>&nbsp<?php echo $this->_tpl_vars['num_telefono']; ?>
</b></p>
        <?php endif; ?>
        <p>Data di nascita:<b>&nbsp<?php echo $this->_tpl_vars['data_nascita']; ?>
</b></p>
        <p>Città di nascita:<b>&nbsp<?php echo $this->_tpl_vars['citta_nascita']; ?>
</b></p>
	<p><hr></p>
        <?php if (( $this->_tpl_vars['loggato_amministratore'] )): ?>
            <div id="mostra_amministrazione" name="<?php echo $this->_tpl_vars['username']; ?>
"><p><input type="button" class="button_center" value="► Opzioni"></p></div>
            <div id="nascondi_amministrazione"><p><input type="button" class="button_center" value="◄ Opzioni"></p></div>
            <div id="amministrazione"></div>
        <?php endif; ?>
    </div>
</div>