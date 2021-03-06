<?php /* Smarty version 2.6.26, created on 2014-01-10 09:53:52
         compiled from ricerca_riepilogo.tpl */ ?>
<br>
<script src="js/riepilogo.js"></script>
<h1 class="pagetitle">Dati viaggio</h1>
<div>
<!-- Content unit - One column -->
    <h1 class="block">Riepilogo del viaggio &nbsp<?php echo $this->_tpl_vars['num_viaggio']; ?>
</h1>
    <div class="column1-unit">
        <div class="contactform">
            <?php if (( $this->_tpl_vars['isPasseggero'] || $this->_tpl_vars['isGuidatore'] )): ?>
                <p class="center"><label class="center-title">Partecipi a questo viaggio!</p>
            <?php endif; ?>
			 <?php if ($this->_tpl_vars['posti_disponibili'] < 1 && ! $this->_tpl_vars['isPasseggero']): ?>
                <p class="center"><label class="center-title">Non ci sono più posti disponibili!</label></p>
             <?php endif; ?>
            <p class="center"><b>organizzato da:</b>&nbsp<label class="center pulsante"><a class="visualizza_utente"  name="<?php echo $this->_tpl_vars['partecipa']; ?>
" value="<?php echo $this->_tpl_vars['username_guidatore']; ?>
"><?php echo $this->_tpl_vars['username_guidatore']; ?>
</a></label><?php if (( $this->_tpl_vars['isPasseggero'] && ! $this->_tpl_vars['votato'] )): ?><input type="button" id="feedback" class="button_center" name="<?php echo $this->_tpl_vars['num_viaggio']; ?>
" value="Feedback" tabindex="1" /><?php endif; ?></p>
           <table>
		   <tr class="normale">
			<th class="top">Data di partenza:</th>
			<td colspan="2"><h2><?php echo $this->_tpl_vars['data_partenza']; ?>
</h2></td>
			</tr>
			<tr class="normale">
			<th class="top">Città di partenza:</th>
			<td colspan="2"><h2><?php echo $this->_tpl_vars['citta_partenza']; ?>
</h2></td>
			</tr>
			<tr class="normale">
			<th class="top">Città di arrivo:</th>
			<td colspan="2"><h2><?php echo $this->_tpl_vars['citta_arrivo']; ?>
</h2></td>
			</tr>
			<tr class="normale">
			<th class="top">Tipo di veicolo:</th>
			<td width="220"><h2><?php echo $this->_tpl_vars['tipo']; ?>
</h2></td>
			<th class="top">Posti disponibili:</th>
			<td width="220"><h2><?php echo $this->_tpl_vars['posti_disponibili']; ?>
</h2></td>
			</tr>
			<tr class="normale">
			<th class="top">Costo a persona:</th>
			<td width="220"><h2><?php echo $this->_tpl_vars['costo']; ?>
&nbsp€</h2></td>
			</tr>
			<tr class="normale">
			<th class="top">Note:</th>
			<td  colspan="3"><p><h3><b><?php echo $this->_tpl_vars['note']; ?>
</b></h3></p></td>
			</tr>
		   </table>
		   
			<?php if (( $this->_tpl_vars['loggato'] && ! $this->_tpl_vars['isPasseggero'] && ! $this->_tpl_vars['isGuidatore'] && $this->_tpl_vars['posti_disponibili'] > 0 )): ?>
			
                <p class="center"><input type="button" id="partecipa" class="button_center" name="<?php echo $this->_tpl_vars['num_viaggio']; ?>
" value="Partecipa" tabindex="1" /></p>
                
            <?php endif; ?>
            <?php if ($this->_tpl_vars['isPasseggero']): ?>
                <p class="center"><input type="button" id="cancellami" class="button_center" name1="<?php echo $this->_tpl_vars['num_viaggio']; ?>
" name2="<?php echo $this->_tpl_vars['username_passeggero']; ?>
" value="Cancellami" tabindex="1" /></p>
			
			<?php endif; ?>
			
            </div>
			</div>
    <h1 class="block">Informazioni veicolo</h1>
        <div class="contactform">
            <p><label class="left">Targa:</label><label class="left">&nbsp<b><?php echo $this->_tpl_vars['targa']; ?>
</label></b><br></p>
            <p><label class="left">Tipo:</label><label class="left">&nbsp<b><?php echo $this->_tpl_vars['tipo']; ?>
</b></label><br></p>
            <p><label class="left">Posti:</label><label class="left">&nbsp<b><?php echo $this->_tpl_vars['num_posti']; ?>
</b><br></label><br></p>
            <p><label class="left">Carburante:</label><label class="left">&nbsp<b><?php echo $this->_tpl_vars['carburante']; ?>
</b></label><br></p>
            <p><label class="left">Consumo medio:</label><label class="left">&nbsp<b><?php echo $this->_tpl_vars['consumo_medio']; ?>
</b>&nbsp (Km con 1 litro)</label><br></p>
        <br>
        </div>
    <h1 class="block">Passeggeri partecipanti</h1>
        <div class="contactform">
            <?php if ($this->_tpl_vars['array_passeggeri']): ?>
                <hr><br>
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
			<p><a class="visualizza_utente"  name="<?php echo $this->_tpl_vars['partecipa']; ?>
" value="<?php echo $this->_tpl_vars['array_passeggeri'][$this->_sections['nr']['index']]['username_passeggero']; ?>
"><label class="left pulsante"><?php echo $this->_tpl_vars['array_passeggeri'][$this->_sections['nr']['index']]['username_passeggero']; ?>
 </label></a> <?php if (( $this->_tpl_vars['array_passeggeri'][$this->_sections['nr']['index']]['feedback_guid'] == 0 ) && $this->_tpl_vars['isGuidatore']): ?><input type="button"  class="feedback_passeggero button_left" name1="<?php echo $this->_tpl_vars['array_passeggeri'][$this->_sections['nr']['index']]['username_passeggero']; ?>
" name2="<?php echo $this->_tpl_vars['num_viaggio']; ?>
" value="Feedback" tabindex="1" /><?php if ($this->_tpl_vars['passato'] == false): ?><input type="button"  class="elimina_passeggero button_left" name1="<?php echo $this->_tpl_vars['array_passeggeri'][$this->_sections['nr']['index']]['username_passeggero']; ?>
" name2="<?php echo $this->_tpl_vars['num_viaggio']; ?>
" value="Elimina" tabindex="2" /><?php endif; ?><br><?php else: ?><br><?php endif; ?></p>
                    </div>  
                <hr>
                <br>
                <?php endfor; endif; ?>
            <?php else: ?>
                <br>
                <h3> Non ci sono ancora passeggeri</h3>    
            <?php endif; ?>
        </div>
        <?php if ($this->_tpl_vars['isGuidatore'] || $this->_tpl_vars['isAmministratore']): ?>
            <div class="contactform">
                <h1 class="block"> Modifica viaggio </h1>
                <?php if ($this->_tpl_vars['passato'] == false): ?>
                <div>
                    <p class="center"><input type="button" class="elimina_viaggio button_center" name="<?php echo $this->_tpl_vars['num_viaggio']; ?>
" value="Elimina viaggio" tabindex="8" /></p>
                </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
            <div class="contactform">
                <?php if ($this->_tpl_vars['indietro']): ?>
                    <p class="center"><input type="button" class="indietro button_left" value="Indietro" tabindex="8" /></p><br><br>
            </div>
                <?php endif; ?>
</div>