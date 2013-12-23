<?php /* Smarty version 2.6.26, created on 2013-12-23 12:25:28
         compiled from ricerca_elenco.tpl */ ?>
<br>
<h1 class="pagetitle">Elenco Viaggi</h1>
<!-- Content unit - One column -->
<h1 class="block">Dati viaggi</h1>
<script src="js/ricerca_elenco.js"></script>         
<div class="column1-unit">
    <div class="contactform" >
        <?php if ($this->_tpl_vars['viaggi']): ?>
            <div style="width:650px;height:500px;overflow-y: scroll; border:1px ">
                <table width:650px;>
                    <tr>
                        <th class="mini">
                            <div>ID</div>
			</th>
			<th class="mini">
                            <div>Data  </div>
			</th>
			<th class="top">
                            <div>Partenza da  </div>
                        </th>
			<th class="top">
                            <div>Arrivo a  </div>
			</th>
			<th class="mini">
                            <div>Costo  </div>
			</th>
                    </tr>
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
                    <tr class="riepilogo_viaggio pulsante" value="<?php echo $this->_tpl_vars['viaggi'][$this->_sections['nr']['index']]['num_viaggio']; ?>
" name="true">
                        <td>
                            <div><?php echo $this->_tpl_vars['viaggi'][$this->_sections['nr']['index']]['num_viaggio']; ?>
</div>
			</td>
			<td>
                            <div><b><?php echo $this->_tpl_vars['viaggi'][$this->_sections['nr']['index']]['data_partenza']; ?>
</b></div>
			</td>
                        <td>
                            <div><b><?php echo $this->_tpl_vars['viaggi'][$this->_sections['nr']['index']]['citta_partenza']; ?>
</b></div>
			</td>
                        <td>
                            <div><b><?php echo $this->_tpl_vars['viaggi'][$this->_sections['nr']['index']]['citta_arrivo']; ?>
</b></div>
			</td>
			<td>
                            <div><?php echo $this->_tpl_vars['viaggi'][$this->_sections['nr']['index']]['costo']; ?>
&nbsp €</div>
			</td>
                    </tr>
                    <?php endfor; endif; ?>
		</table>
            </div>
        <?php else: ?>
            <p class="center"><label class="center-title"> Non ci sono viaggi!</label></p>     
        <?php endif; ?>
    </div>              
</div>