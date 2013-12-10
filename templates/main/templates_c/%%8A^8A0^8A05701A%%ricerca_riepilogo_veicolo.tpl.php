<?php /* Smarty version 2.6.26, created on 2013-12-04 15:47:04
         compiled from ricerca_riepilogo_veicolo.tpl */ ?>
		<br>
<script src="js/index.js"></script>
        <h1 class="pagetitle">Dati viaggio</h1>

        <!-- Content unit - One column -->
<div> 
        <h1 class="block">Dettagli veicolo <?php echo $this->_tpl_vars['targa']; ?>
&nbsp</h1>
        <div class="column1-unit">
          <div class="contactform">            
            <p><label class="left"><h2> Targa: &nbsp<b><?php echo $this->_tpl_vars['targa']; ?>
</b></h2></label></p>
            <p><label class="left"><h3> Tipo: &nbsp<b><?php echo $this->_tpl_vars['tipo']; ?>
</b></h3></label></p>
            <p><label class="left"><h3> Numero Posti: &nbsp<b><?php echo $this->_tpl_vars['num_posti']; ?>
</b></h3></label></p>
            <p><label class="left"><h3> Carburante: &nbsp<b><?php echo $this->_tpl_vars['carburante']; ?>
</b></h3></label></p>
            <p><label class="left"><h3> Consumo Medio km/l: &nbsp<b><?php echo $this->_tpl_vars['consumo_medio']; ?>
</b></h3></label></p>        
            <div><p><input type="button" class="elimina_veicolo button" tabindex="1" value="Elimina veicolo" name="<?php echo $this->_tpl_vars['targa']; ?>
"/></p></div>
          </div>              
        </div>
</div>