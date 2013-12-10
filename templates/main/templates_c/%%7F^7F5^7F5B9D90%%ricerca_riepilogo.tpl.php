<?php /* Smarty version 2.6.26, created on 2013-12-03 16:40:15
         compiled from ricerca_riepilogo.tpl */ ?>
		<br>
<script src="js/index.js"></script>
        <h1 class="pagetitle">Dati viaggio</h1>

        <!-- Content unit - One column -->
<div> 
        <h1 class="block">Riepilogo del viaggio &nbsp<?php echo $this->_tpl_vars['num_viaggio']; ?>
</h1>
        <div class="column1-unit">
          <div class="contactform">
			<?php if (( $this->_tpl_vars['isPasseggero'] || $this->_tpl_vars['isGuidatore'] )): ?>
            <p><label class="left"><h3>Parteciperai a questo viaggio!</h3></p><br><br>
			<?php endif; ?>
            <p><label class="left"><h2> Viaggio organizzato da: &nbsp<b><?php echo $this->_tpl_vars['username_guidatore']; ?>
</b></h2></label></p>
            <p><label class="left"><h3> Città di partenza: &nbsp<b><?php echo $this->_tpl_vars['citta_partenza']; ?>
</b></h3></label></p>
            <p><label class="left"><h3> Città di arrivo: &nbsp<b><?php echo $this->_tpl_vars['citta_arrivo']; ?>
</b></h3></label></p>
            <p><label class="left"><h3> Data di partenza: &nbsp<b><?php echo $this->_tpl_vars['data_partenza']; ?>
</b></h3></label></p>
            <p><label class="left"><h3> Veicolo: &nbsp<b><?php echo $this->_tpl_vars['tipo']; ?>
</b></h3></label></p>
			<p><label class="left"><h3> Informazioni veicolo: &nbsp<?php echo $this->_tpl_vars['targa']; ?>
</h3></label></p>
            <?php echo $this->_tpl_vars['posti_disponibili']; ?>

            <p><label class="left"><h3> Informazioni aggiuntive: &nbsp<b><?php echo $this->_tpl_vars['note']; ?>
</b></h3></label></p>
	    <?php if (( $this->_tpl_vars['loggato'] && ! $this->_tpl_vars['isPasseggero'] && ! $this->_tpl_vars['isGuidatore'] && $this->_tpl_vars['posti_disponibili'] > 0 )): ?>
                <p><input type="button" id="partecipa" class="button" name="<?php echo $this->_tpl_vars['num_viaggio']; ?>
" value="Partecipa" tabindex="1" /></p><br><br>
                <?php if ($this->_tpl_vars['posti_disponibili'] < 1): ?>
                NON CI SONO PIU POSTI DISPONIBILI
                <?php endif; ?>
             <?php endif; ?>
	     <?php if ($this->_tpl_vars['isPasseggero']): ?>
                <p><input type="button" id="cancellami" class="button" name1="<?php echo $this->_tpl_vars['num_viaggio']; ?>
" name2="<?php echo $this->_tpl_vars['username_passeggero']; ?>
" value="Cancellami" tabindex="1" /></p><br><br>
             <?php endif; ?>
            <?php echo $this->_tpl_vars['targa']; ?>

            <?php echo $this->_tpl_vars['tipo']; ?>

            <?php echo $this->_tpl_vars['num_posti']; ?>

            <?php echo $this->_tpl_vars['carburante']; ?>

            <?php echo $this->_tpl_vars['consumo_medio']; ?>

             <?php if (( $this->_tpl_vars['isPasseggero'] && ! $this->_tpl_vars['votato'] )): ?>
                <p><input type="button" id="feedback" class="button" name="<?php echo $this->_tpl_vars['num_viaggio']; ?>
" value="Feedback" tabindex="1" /></p><br><br>
             <?php endif; ?>
            <?php if ($this->_tpl_vars['array_passeggeri']): ?>
                <h1> Passeggeri partecipanti: </h1>
						   <br>
                           <hr>
                    <?php unset($this->_sections['nr']);
$this->_sections['nr']['name'] = 'nr';
$this->_sections['nr']['loop'] = is_array($_loop=$this->_tpl_vars['array_passeggeri']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['nr']['show'] = true;
$this->_sections['nr']['max'] = $this->_sections['nr']['loop'];
$this->_sections['nr']['step'] = 1;
$this->_sections['nr']['start'] = $this->_sections['nr']['step'] > 0 ? 0 : $this->_sections['nr']['loop']-1;
if ($this->_sections['nr']['show']) {
    $this->_sections['nr']['total'] = $this->_sections['nr']['loop'];
    if ($this->_sections['nr']['total'] == 0)
        $this->_sections['nr']['show'] = false;
} else
    $this->_sections['nr']['total'] = 0;
if ($this->_sections['nr']['show']):

            for ($this->_sections['nr']['index'] = $this->_sections['nr']['start'], $this->_sections['nr']['iteration'] = 1;
                 $this->_sections['nr']['iteration'] <= $this->_sections['nr']['total'];
                 $this->_sections['nr']['index'] += $this->_sections['nr']['step'], $this->_sections['nr']['iteration']++):
$this->_sections['nr']['rownum'] = $this->_sections['nr']['iteration'];
$this->_sections['nr']['index_prev'] = $this->_sections['nr']['index'] - $this->_sections['nr']['step'];
$this->_sections['nr']['index_next'] = $this->_sections['nr']['index'] + $this->_sections['nr']['step'];
$this->_sections['nr']['first']      = ($this->_sections['nr']['iteration'] == 1);
$this->_sections['nr']['last']       = ($this->_sections['nr']['iteration'] == $this->_sections['nr']['total']);
?>
                    <div>
						<br>
						<p>
                        <a class="visualizza_utente" value="<?php echo $this->_tpl_vars['array_passeggeri'][$this->_sections['nr']['index']]['username_passeggero']; ?>
"><label class="left pulsante"><?php echo $this->_tpl_vars['array_passeggeri'][$this->_sections['nr']['index']]['username_passeggero']; ?>
 </label></a> <?php if (( $this->_tpl_vars['array_passeggeri'][$this->_sections['nr']['index']]['feedback_guid'] == 0 ) && $this->_tpl_vars['isGuidatore']): ?> <input type="button"  class="feedback_passeggero button_left" name1="<?php echo $this->_tpl_vars['array_passeggeri'][$this->_sections['nr']['index']]['username_passeggero']; ?>
" name2="<?php echo $this->_tpl_vars['num_viaggio']; ?>
" value="Feedback" tabindex="1" /><input type="button"  class="elimina_passeggero button_left" name1="<?php echo $this->_tpl_vars['array_passeggeri'][$this->_sections['nr']['index']]['username_passeggero']; ?>
" name2="<?php echo $this->_tpl_vars['num_viaggio']; ?>
" value="Elimina" tabindex="2" /><br> <?php else: ?><br><?php endif; ?>
						</p>
                    </div>  
                    <hr>
                    <?php endfor; endif; ?>
            <?php else: ?>
                    <h3> Non ci sono passeggeri</h3>    
            <?php endif; ?>
            <?php if ($this->_tpl_vars['isGuidatore']): ?>
            <div>
                <p><input type="button" class="elimina_viaggio button" tabindex="1" value="Elimina viaggio" name="<?php echo $this->_tpl_vars['num_viaggio']; ?>
"/></p>
            </div>
            <?php endif; ?>
          </div>              
        </div>
</div>