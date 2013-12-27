<?php /* Smarty version 2.6.26, created on 2013-12-27 18:39:16
         compiled from registrazione_gestisci_profilo.tpl */ ?>
<br>
<script src="js/gestisci_profilo.js"></script>
<h1 class="pagetitle">Gestisci profilo</h1>
<h1 class="block">&nbsp<?php echo $this->_tpl_vars['username']; ?>
&nbsp&nbsp(<?php echo $this->_tpl_vars['nome']; ?>
&nbsp<?php echo $this->_tpl_vars['cognome']; ?>
)</h1>
        <div class="column1-unit">
            <div class="contactform">  
					<p class="center"><label class="center-title">Immagine del profilo:</label></p><br>
                    <p><img class="center" src=<?php echo $this->_tpl_vars['immagine_profilo']; ?>
 alt="Image description" height="200" width="200"/></p><br>
                <div>
                    <form action="index.php" method="post" enctype="multipart/form-data" name="carica_immagine">
                        <input type="hidden" name="controller" value="registrazione" />
                        <input type="hidden" name="task" value="carica_immagine" />    
                        <p class="center"><label for="img" class="center-title">Cambia immagine del profilo:</label></p><br>
						<p class="center"><input type="file" name="img" style="font-weight: bold;"/>
                        <input type="submit" class="button_center" name="carica_immagine"  value="Carica immagine" tabindex="5" /></p>
                    </form>
                </div>
				<hr>
				<br>
            <p><label for="modifica_password" class="center-title">Modifica password:</label>
            <input type="button" name="modifica_password" id="modifica_password" class="button_center" value="Modifica" tabindex="6" /></p>
            </div>
        </div>
        <h1 class="block"> I tuoi veicoli </h1>
        <div class="coloum1-unit">
            <div class="contactform">
                <?php if ($this->_tpl_vars['array']): ?>
                    <table>
                        <tr>
                            <th class="mini">
                                <div>Targa</div>
                            </th>
                            <th class="mini">
                                <div>Tipo</div>
                            </th>
                            </tr>
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
                        <tr class="riepilogo_veicolo pulsante" value="<?php echo $this->_tpl_vars['array'][$this->_sections['nr']['index']]['targa']; ?>
">
                            <td>
                                <div><?php echo $this->_tpl_vars['array'][$this->_sections['nr']['index']]['targa']; ?>
</div>
                            </td>
                            <td>
                                <div><b><?php echo $this->_tpl_vars['array'][$this->_sections['nr']['index']]['tipo']; ?>
</b></div>
                            </td>
                        </tr>
                    <?php endfor; endif; ?>
                    </table>
                <?php else: ?>
                    <p class="center"><label class="center-title"> Non ci sono veicoli!</label></p>  
                <?php endif; ?>
                <p class="center"><input type="button" id="submit_veicolo_da_profilo" class="button_center" value="Aggiungi un veicolo" tabindex="5" /></p>
                <br><br><br>
            </div>
        </div>