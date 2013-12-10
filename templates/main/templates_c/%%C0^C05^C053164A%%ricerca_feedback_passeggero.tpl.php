<?php /* Smarty version 2.6.26, created on 2013-12-04 12:15:38
         compiled from ricerca_feedback_passeggero.tpl */ ?>
<script src="js/index.js"></script>
<h1 class="pagetitle">Rilascia un feedback a <?php echo $this->_tpl_vars['username_guidatore']; ?>
</h1>

        <!-- Content unit - One column -->
<div> 
        <h1 class="block">Viaggio: &nbsp<?php echo $this->_tpl_vars['num_viaggio']; ?>
 da: <?php echo $this->_tpl_vars['citta_partenza']; ?>
 a: <?php echo $this->_tpl_vars['citta_arrivo']; ?>
 del <?php echo $this->_tpl_vars['data_partenza']; ?>
</h1>
        <div class="column1-unit">
          <div class="contactform">
		<p><label for="commento" class="left">Commento:</label>
                   <textarea name="commento" class="commento" cols="45" rows="7" tabindex="1"></textarea></p>
                <p><label for="valutazione" class="left">Valutazione:</label>
                   <input type="text" name="valutazione" class="valutazione" class="field" value="" tabindex="2"  /></p>
                <p><input type="button" id="valuta" class="button_left" name="<?php echo $this->_tpl_vars['num_viaggio']; ?>
" value="Valuta" tabindex="3" /></p><br>
          </div>              
        </div>
</div>