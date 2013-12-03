<?php /* Smarty version 2.6.26, created on 2013-12-02 12:31:52
         compiled from ricerca_veicolo.tpl */ ?>
 <h1 class="pagetitle">Inserimento nuovo veicolo</h1>
 <script src="js/index.js"></script>
        <!-- Content unit - One column -->
        <div>
		 <h1 class="block">Dati veicolo</h1>
        <div class="column1-unit">
          <div class="contactform">
            <form>
                <fieldset>
                <p><label for="targa" class="left">Targa:</label>
                   <input type="text" name="targa" id="targa" class="field" value="" tabindex="1"  /></p>
                <p><label for="tipo" class="left">Tipo:</label>
                   <input type="text" name="tipo" id="tipo" class="field" value="" tabindex="2" /></p>
                <p><label for="num_posti" class="left">Numero Posti:</label>
                   <input type="text" name="num_posti" id="num_posti" class="field" value="" tabindex="3" /></p>
                <p><label for="carburante" class="left">Carburante:</label>
                   <input type="text" name="carburante" id="carburante" class="field" value="" tabindex="4" /></p>
                <p><label for="consumo_medio" class="left">Consumo Medio:</label>
                   <input type="text" name="consumo_medio" id="consumo_medio" class="field" value="" tabindex="5" /></p>
                <?php if (( $this->_tpl_vars['da'] == 'inserisci' )): ?>
                <p><input type="button" id="submit_aggiungi_da_inserisci" class="button" value="Aggiungi" tabindex="6" /></p>
                <?php else: ?>
                <p><input type="button" id="submit_aggiungi_da_profilo" class="button" value="Aggiungi" tabindex="7" /></p>
                <?php endif; ?>
		</fieldset> 
            </form>   
           </div>              
        </div>
</div>