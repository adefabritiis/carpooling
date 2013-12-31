<?php /* Smarty version 2.6.26, created on 2013-12-31 12:25:00
         compiled from registrazione_gestisci_viaggi.tpl */ ?>
<br>
<script src="js/gestisci_viaggi.js"></script>
<h1 class="pagetitle">Gestisci viaggi</h1>

        <!-- Content unit - One column -->
		<h1 class="block">Viaggi inseriti da <?php echo $this->_tpl_vars['username']; ?>
</h1>        
        <div class="column1-unit">
          <div class="contactform" >
            
            <?php if ($this->_tpl_vars['array_viaggi']): ?>
               <table width:650px;>
			<th class="mini">
                            <div>ID  </div>
			</th>
			<th class="mini">
                            <div>Data  </div>
			</th>
			<th class="mini">
                            <div>Partenza da  </div>
			</th>
			<th class="mini">
                            <div>Arrivo a  </div>
			</th>
                    </tr>
			</table>
			<div class="contenitore">
			<table width:650px>
				
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
                        <tr class="riepilogo_viaggio pulsante" value="<?php echo $this->_tpl_vars['array_viaggi'][$this->_sections['nr']['index']]['num_viaggio']; ?>
"> 
                            <td width="108">
                                <div><?php echo $this->_tpl_vars['array_viaggi'][$this->_sections['nr']['index']]['num_viaggio']; ?>
</div>
                            </td>
                            <td width="108">
                                <div><b><?php echo $this->_tpl_vars['array_viaggi'][$this->_sections['nr']['index']]['data_partenza']; ?>
</b></div>
                            </td>
                             <td width="108">
                                <div><b><?php echo $this->_tpl_vars['array_viaggi'][$this->_sections['nr']['index']]['citta_partenza']; ?>
</b></div>
                            </td>
                            <td width="108">
                                <div><b><?php echo $this->_tpl_vars['array_viaggi'][$this->_sections['nr']['index']]['citta_arrivo']; ?>
</b></div>
                            </td>
			</tr>
                    <?php endfor; endif; ?>
			
                
                </table>
            </div>
        <?php else: ?>
                <p class="center"><label class="center-title"> Non hai inserito viaggi!</label></p>     
        <?php endif; ?>
        </div>
		</div>
		

           
      <h1 class="block">Viaggi a cui partecipi </h1>        
		 <div class="column1-unit">
          <div class="contactform" >
            
            <?php if ($this->_tpl_vars['array_passeggero']): ?>
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
			</table>
			<div class="contenitore">
			<table width:650px>
				
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
                        <tr  class="riepilogo_viaggio pulsante" value="<?php echo $this->_tpl_vars['array_passeggero'][$this->_sections['nr']['index']]['num_viaggio']; ?>
"> 
                            <td width="87">
                                <div><?php echo $this->_tpl_vars['array_passeggero'][$this->_sections['nr']['index']]['num_viaggio']; ?>
</div>
                            </td>
                            <td width="87">
                                <div><b><?php echo $this->_tpl_vars['array_passeggero'][$this->_sections['nr']['index']]['data_partenza']; ?>
</b></div>
                            </td>
                            <td>
                                <div><b><?php echo $this->_tpl_vars['array_passeggero'][$this->_sections['nr']['index']]['citta_partenza']; ?>
</b></div>
                            </td>
                            <td>
                                <div><b><?php echo $this->_tpl_vars['array_passeggero'][$this->_sections['nr']['index']]['citta_arrivo']; ?>
</b></div>
                            </td>
                            <td width="87">
                                <div><?php echo $this->_tpl_vars['array_passeggero'][$this->_sections['nr']['index']]['costo']; ?>
&nbsp €</div>
                            </td>
			</tr>
                    <?php endfor; endif; ?>
			
                
                </table>
            <?php else: ?>
                    <p class="center"><label class="center-title"> Non partecipi a nessun viaggio!</label></p>    
            <?php endif; ?>
           </div>              
        </div>