<?php /* Smarty version 2.6.26, created on 2013-12-06 01:08:56
         compiled from registrazione_visualizza_profilo_utente.tpl */ ?>
<br>
<script src="js/index.js"></script>
<h1 class="pagetitle">Dati profilo</h1>
<div>
<h1 class="block">&nbsp<?php echo $this->_tpl_vars['username']; ?>
&nbsp</h1>
</div>
        <div class="column1-unit">
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
	  <p>Email:<b>&nbsp<?php echo $this->_tpl_vars['email']; ?>
</b></p>
          <p>Data di nascita:<b>&nbsp<?php echo $this->_tpl_vars['data_nascita']; ?>
</b></p>
          <p>Città di nascita:<b>&nbsp<?php echo $this->_tpl_vars['citta_nascita']; ?>
</b></p>
</div>
<?php if (( $this->_tpl_vars['loggato_amministratore'] )): ?>
    <div>
        <div id="mostra_amministrazione" name="<?php echo $this->_tpl_vars['username']; ?>
"><input type="button" value="+ opzioni"></div>
        <div id="nascondi_amministrazione"><input type="button" value="- opzioni"></div>
        <div id="amministrazione"></div> 
    </div>
<?php endif; ?>