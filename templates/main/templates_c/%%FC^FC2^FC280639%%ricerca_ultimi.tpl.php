<?php /* Smarty version 2.6.26, created on 2013-11-12 17:24:14
         compiled from ricerca_ultimi.tpl */ ?>
		<br>
		<script src="js/index.js"></script>
        <h1 class="pagetitle">Home page</h1>
		<div><h1 class="block">Ultimi viaggi inseriti</h1></div>
          <div class="contactform" >
            
            <?php if ($this->_tpl_vars['viaggi']): ?>
<hr>
<?php unset($this->_sections['nr']);
$this->_sections['nr']['name'] = 'nr';
$this->_sections['nr']['loop'] = is_array($_loop=$this->_tpl_vars['viaggi']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<a class="riepilogo_viaggio" value="<?php echo $this->_tpl_vars['viaggi'][$this->_sections['nr']['index']]['num_viaggio']; ?>
"><h5><?php echo $this->_tpl_vars['viaggi'][$this->_sections['nr']['index']]['data_partenza']; ?>
&nbsp-&nbspDa:&nbsp<?php echo $this->_tpl_vars['viaggi'][$this->_sections['nr']['index']]['citta_partenza']; ?>
&nbspA:&nbsp<?php echo $this->_tpl_vars['viaggi'][$this->_sections['nr']['index']]['citta_arrivo']; ?>
</h5></a>
    </div>  
<hr>
<?php endfor; endif; ?>
<?php else: ?>
<h3> Non ci sono viaggi</h3>    
<?php endif; ?>             
</div>