<?php /* Smarty version 2.6.26, created on 2013-11-21 11:54:34
         compiled from registrazione_gestisci_viaggi.tpl */ ?>
<br>
<script src="js/index.js"></script>
<h1 class="pagetitle">Gestisci viaggi</h1>

        <!-- Content unit - One column -->
		<h1 class="block">Viaggi inseriti da <?php echo $this->_tpl_vars['username']; ?>
</h1>        
        <div class="column1-unit">
          <div class="contactform" >
            
            <?php if ($this->_tpl_vars['array_viaggi']): ?>
<hr>
<?php unset($this->_sections['nr']);
$this->_sections['nr']['name'] = 'nr';
$this->_sections['nr']['loop'] = is_array($_loop=$this->_tpl_vars['array_viaggi']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <div class="pulsante">     
        <a class="riepilogo_viaggio" value="<?php echo $this->_tpl_vars['array_viaggi'][$this->_sections['nr']['index']]['num_viaggio']; ?>
"><p><h5><?php echo $this->_tpl_vars['array_viaggi'][$this->_sections['nr']['index']]['num_viaggio']; ?>
)&nbsp<?php echo $this->_tpl_vars['array_viaggi'][$this->_sections['nr']['index']]['data_partenza']; ?>
&nbspDa:&nbsp<?php echo $this->_tpl_vars['array_viaggi'][$this->_sections['nr']['index']]['citta_partenza']; ?>
&nbspA:&nbsp<b><?php echo $this->_tpl_vars['array_viaggi'][$this->_sections['nr']['index']]['citta_arrivo']; ?>
</b>&nbsp</h5></a><p><input type="button" name="<?php echo $this->_tpl_vars['num_viaggio']; ?>
" class="elimina_viaggio" class="button" value="Elimina" tabindex="1" /><br></p>
    </div>  
<hr>
<?php endfor; endif; ?>
<?php else: ?>
<h3> Non ci sono viaggi</h3>    
<?php endif; ?>
           </div>              
        </div>
           
<h1 class="block">Viaggi a cui partecipi </h1>        
        <div class="column1-unit">
          <div class="contactform" >
            
            <?php if ($this->_tpl_vars['array_passeggero']): ?>
<hr>
<?php unset($this->_sections['nr']);
$this->_sections['nr']['name'] = 'nr';
$this->_sections['nr']['loop'] = is_array($_loop=$this->_tpl_vars['array_passeggero']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <div class="pulsante">     
        <a class="riepilogo_viaggio" value="<?php echo $this->_tpl_vars['array_passeggero'][$this->_sections['nr']['index']]['num_viaggio']; ?>
"><p><h5><?php echo $this->_tpl_vars['array_passeggero'][$this->_sections['nr']['index']]['num_viaggio']; ?>
)&nbsp<?php echo $this->_tpl_vars['array_passeggero'][$this->_sections['nr']['index']]['data_partenza']; ?>
&nbspDa:&nbsp<?php echo $this->_tpl_vars['array_passeggero'][$this->_sections['nr']['index']]['citta_partenza']; ?>
&nbspA:&nbsp<b><?php echo $this->_tpl_vars['array_passeggero'][$this->_sections['nr']['index']]['citta_arrivo']; ?>
</b>&nbsp</h5>
    </div>  
<hr>
<?php endfor; endif; ?>
<?php else: ?>
<h3> Non ci sono viaggi</h3>    
<?php endif; ?>
           </div>              
        </div>