<?php /* Smarty version 2.6.26, created on 2013-12-28 14:15:14
         compiled from ricerca_inserisci.tpl */ ?>
<!-- INSERIMENTO VIAGGIO -->
<script src="js/inserisci_viaggio.js"></script>
<br>
<h1 class="pagetitle">Offri un viaggio</h1>
<!-- Content unit - One column -->
<div>
<h1 class="block">Dati del viaggio</h1>
    <div class="column1-unit">
        <div class="contactform">
            <form>
                <fieldset>
                <p><label for="citta_partenza" class="left">Citta di partenza:</label>
                   <input type="text" name="citta_partenza" id="citta_partenza" class="field" value="" tabindex="1"  /></p>
                <p><label for="citta_arrivo" class="left">Citta di arrivo:</label>
                   <input type="text" name="citta_arrivo" id="citta_arrivo" class="field" value="" tabindex="2" /></p>
                <p><label for="data_partenza" class="left">Data di partenza:</label>
                   <input type="text" name="data_partenza" id="data_partenza" class="field" value="" tabindex="3" /></p>
		<div id="menu_veicoli">
                    <p><label for="targa" class="left">Scegli un veicolo:</label>
                    <select name="targa" class="veicoli combo"> 
                        <?php unset($this->_sections['nr']);
$this->_sections['nr']['name'] = 'nr';
$this->_sections['nr']['loop'] = is_array($_loop=$this->_tpl_vars['veicoli']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                            <option value="<?php echo $this->_tpl_vars['veicoli'][$this->_sections['nr']['index']]['targa']; ?>
"><h5><?php echo $this->_tpl_vars['veicoli'][$this->_sections['nr']['index']]['targa']; ?>
</h5></option>
                        <?php endfor; endif; ?>
                   </select></p>
                </div>
                <p><label for="aggiungi_veicolo" class="left">Oppure:</label>
                    <input type="button" name="aggiungi_veicolo" id="submit_veicolo_da_inserisci" class="button_left" value="Aggiungi veicolo" tabindex="5" /></p>
                <br><br>
                <p><label for="costo" class="left">Costo:</label>
                    <input type="text" name="costo" id="costo" class="mini" value="" tabindex="6"  />&nbsp € (a persona)</p>
                <p><label for="note" class="left">Note viaggio:</label>
                   <textarea name="note" maxlength="300" id="note" cols="45" rows="7" tabindex="7"></textarea></p>
                <p><input type="button" id="submit_offri" class="button" value="Inserisci viaggio" tabindex="8" /></p>
		</fieldset>
            </form>
        </div>
    </div>
</div>