<?php /* Smarty version 2.6.26, created on 2013-11-26 11:42:31
         compiled from registrazione_visualizza_profilo_utente.tpl */ ?>
<br>
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
(<?php echo $this->_tpl_vars['num_voti_guid']; ?>
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