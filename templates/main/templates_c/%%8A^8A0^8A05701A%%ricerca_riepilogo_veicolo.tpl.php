<?php /* Smarty version 2.6.26, created on 2014-01-03 18:07:05
         compiled from ricerca_riepilogo_veicolo.tpl */ ?>
<br>
<script src="js/veicolo.js"></script>
<h1 class="pagetitle">Dati veicolo</h1>
<!-- Content unit - One column -->
<div> 
    <h1 class="block">Dettagli del veicolo</h1>
    <div class="column1-unit">
        <div class="contactform">            
            <p class="center"><label class="center-title">Targa:</label><label class="center-title">&nbsp<b><?php echo $this->_tpl_vars['targa']; ?>
</label></b><br></p>
            <p><label class="left">Tipo:</label><label class="left">&nbsp<b><?php echo $this->_tpl_vars['tipo']; ?>
</b></label><br></p>
            <p><label class="left">Posti:</label><label class="left">&nbsp<b><?php echo $this->_tpl_vars['num_posti']; ?>
</b><br></label><br></p>
            <p><label class="left">Carburante:</label><label class="left">&nbsp<b><?php echo $this->_tpl_vars['carburante']; ?>
</b></label><br></p>
            <p><label class="left">Consumo medio:</label><label class="left">&nbsp<b><?php echo $this->_tpl_vars['consumo_medio']; ?>
</b>&nbsp (Km con 1 litro)</label></p>       
            <div>
				<br>
                <p class="center"><input type="button" class="elimina_veicolo button_center" tabindex="1" value="Elimina veicolo" name="<?php echo $this->_tpl_vars['targa']; ?>
"/></p>
            </div>
        </div>              
    </div>
</div>