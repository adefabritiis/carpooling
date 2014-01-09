<?php /* Smarty version 2.6.26, created on 2014-01-09 15:56:42
         compiled from ricerca_amministra_viaggi.tpl */ ?>
<br>
<h1 class="pagetitle">Elenco Viaggi</h1><br>
<script src="js/ricerca_amministrazione_viaggi.js"></script>
<!-- Content unit - One column -->
<div class="column1-unit">
    <h1 class="block">Ricerca viaggi</h1>
<h2 class="block">
        <a class="pulsante" id="nascondi_avanzata" name="nascondi">► ricerca avanzata</a>
        <a class="pulsante" id="mostra_avanzata" name="mostra">◄ nascondi</a>
</h2>
<div class="mostra_ricerca">
    <h1 class="block">Ricerca viaggi</h1>
        <div class="column1-unit">
          <div class="contactform">
             <form>
              <fieldset>
                <p><label for="citta_partenza" class="left">Citta di partenza:</label>
                   <input type="text" name="citta_partenza" id="citta_partenza_ricerca" class="field" value="" tabindex="1"  /></p>
                <p><label for="citta_arrivo" class="left">Citta di arrivo:</label>
                   <input type="text" name="citta_arrivo" id="citta_arrivo_ricerca" class="field" value="" tabindex="2" /></p>
                <p><label for="data_partenza" class="left">Data di partenza:</label>
                   <input type="text" name="data_partenza" id="data_partenza_ricerca" class="field" value="" tabindex="3" /></p>
                
                <p><input type="button" id="submit_ricerca_viaggi" class="button" value="Cerca" tabindex="4" /></p>
              </fieldset>
            </form>
         </div>
        </div>
</div>
</div>    
<div class="column1-unit">
    <div id="risultati_viaggi" >
        <div class="column1-unit">
    <div> 
        <?php if ($this->_tpl_vars['viaggi']): ?>
            <h1> Lista viaggi cercati </h1>
            <div style="width:650px;height:800px;overflow-y: scroll; border:1px solid white;">
            <table width:650px;>
                <tr>
                    <th class="top">
                        <div class="ordina_viaggi pulsante" name="num_viaggio">Numero Viaggio ▼</div>
                    </th>
                    <th class="top">
                        <div class="ordina_viaggi pulsante" name="citta_partenza">Citta Partenza ▼</div>
                    </th>
                    <th class="top">
                        <div class="ordina_viaggi pulsante" name="citta_arrivo">Citta Arrivo ▼</div>
                    </th>
                    <th class="top">
                        <div class="ordina_viaggi pulsante" name="data_partenza">Data Partenza ▼</div>
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
">
             <div>
                <td>
                    <div><?php echo $this->_tpl_vars['viaggi'][$this->_sections['nr']['index']]['num_viaggio']; ?>
</div>
                </td>
                <td>
                    <div><?php echo $this->_tpl_vars['viaggi'][$this->_sections['nr']['index']]['citta_partenza']; ?>
</div>
                </td>
                <td>
                    <div><?php echo $this->_tpl_vars['viaggi'][$this->_sections['nr']['index']]['citta_arrivo']; ?>
</div>
                </td>
                <td>
                    <div><?php echo $this->_tpl_vars['viaggi'][$this->_sections['nr']['index']]['data_partenza']; ?>
</div>
                </td>    
                    </div> 
              </div>
            </tr>    
            <?php endfor; endif; ?>
            </table>
            </div>
        <?php else: ?>
            <div class="contactform">
                <p class="center"><label class="center-title"> Nessun viaggio trovato!</label></p>  
            </div>     
        <?php endif; ?>
    </div>
         </div>
    </div>
</div> 
    </div>
        <div id="risultati_ricerca_viaggi"></div>
    </div>