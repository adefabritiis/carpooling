<?php /* Smarty version 2.6.26, created on 2013-12-27 17:39:15
         compiled from registrazione_visualizza_profilo.tpl */ ?>
<script src="js/index.js"/>
<br>
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
 alt="Image description" height="200" width="200"/></p>
        <p>Valutazione guidatore: <?php echo $this->_tpl_vars['media_feedback_guidatore']; ?>
(<?php echo $this->_tpl_vars['num_viaggi_guid']; ?>
)</p>
        <p>Valutazione passeggero: <?php echo $this->_tpl_vars['media_feedback_passeggero']; ?>
</p>
	<p>Email:<b>&nbsp<?php echo $this->_tpl_vars['email']; ?>
</b></p>
        <p>Numero di telefono:<b>&nbsp<?php echo $this->_tpl_vars['num_telefono']; ?>
</b></p>
        <p>Data di nascita:<b>&nbsp<?php echo $this->_tpl_vars['data_nascita']; ?>
</b></p>
        <p>Città di nascita:<b>&nbsp<?php echo $this->_tpl_vars['citta_nascita']; ?>
</b></p><br><br><br><br>
    </div>
</div>