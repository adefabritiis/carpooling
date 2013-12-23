<?php /* Smarty version 2.6.26, created on 2013-12-20 18:21:47
         compiled from ricerca_amministra_utenti_lista.tpl */ ?>
<script src="js/ricerca_amministrazione_utenti.js"></script>
<div class="column1-unit">
    <div> 
        <?php if ($this->_tpl_vars['utenti']): ?>
            <h1 class="block"> Risultati ricerca</h1>
                <div style="width:650px;height:800px;overflow-y: scroll; border:1px solid white;">
                    <table width:650px;>
                        <tr>
				<th class="top">
					<div class="ordina_utenti pulsante" name="username">Username  ▼</div>
				</th>
				<th class="top">
					<div class="ordina_utenti pulsante" name="nome">Nome  ▼</div>
				</th>
				<th class="top">
					<div class="ordina_utenti pulsante" name="cognome">Cognome  ▼</div>
				</th>
				<th class="top">
					<div class="ordina_utenti pulsante" name="citta_residenza">Città di residenza  ▼</div>
				</th>
			</tr>
            <?php unset($this->_sections['nr']);
$this->_sections['nr']['name'] = 'nr';
$this->_sections['nr']['loop'] = is_array($_loop=$this->_tpl_vars['utenti']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<tr> 
				<td>
                    <div><a class="visualizza_utente pulsante" value="<?php echo $this->_tpl_vars['utenti'][$this->_sections['nr']['index']]['username']; ?>
"><?php echo $this->_tpl_vars['utenti'][$this->_sections['nr']['index']]['username']; ?>
</a></div>
				</td>
				<td>
                    <div><?php echo $this->_tpl_vars['utenti'][$this->_sections['nr']['index']]['nome']; ?>
</div>
				</td>
				<td>
                    <div><?php echo $this->_tpl_vars['utenti'][$this->_sections['nr']['index']]['cognome']; ?>
</div>
				</td>
				<td>
                    <div><?php echo $this->_tpl_vars['utenti'][$this->_sections['nr']['index']]['citta_residenza']; ?>
</div>
				</td>
			</tr>
            <?php endfor; endif; ?>
			</table>
                  </div>
        <?php else: ?>
			<div class="contactform">
            <p class="center"><label class="center-title"> Nessun utente trovato!</label></p>  
			</div>
        <?php endif; ?>
    </div>
</div>