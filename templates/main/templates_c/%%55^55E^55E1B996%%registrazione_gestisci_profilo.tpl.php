<?php /* Smarty version 2.6.26, created on 2013-11-15 12:24:48
         compiled from registrazione_gestisci_profilo.tpl */ ?>
<br>
<script src="js/index.js"></script>
<h1 class="pagetitle">Gestisci profilo</h1>
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
		  <br><br>
		  </div>
		  </div>
		  <h1 class="block"> I tuoi veicoli </h1>
		  <div class="coloum1-unit">
		  <div class="contactform">
                  <?php if ($this->_tpl_vars['array']): ?>
		

<hr>
<?php unset($this->_sections['nr']);
$this->_sections['nr']['name'] = 'nr';
$this->_sections['nr']['loop'] = is_array($_loop=$this->_tpl_vars['array']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <a class="riepilogo_veicolo" value="<?php echo $this->_tpl_vars['array'][$this->_sections['nr']['index']]['targa']; ?>
"><h5><?php echo $this->_tpl_vars['array'][$this->_sections['nr']['index']]['targa']; ?>
&nbsp-&nbsp<?php echo $this->_tpl_vars['array'][$this->_sections['nr']['index']]['tipo']; ?>
</h5></a>
    </div>  
<hr>
<?php endfor; endif; ?>
<?php else: ?>
<h3> Non ci sono veicoli</h3>    
<?php endif; ?>
<br><br>
 <p><input type="button" id="submit_veicolo_da_profilo" class="button" value="Aggiungi veicolo" tabindex="5" /></p>
 <br><br>
        </div>
		</div>