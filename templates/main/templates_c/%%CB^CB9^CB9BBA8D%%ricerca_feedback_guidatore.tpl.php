<?php /* Smarty version 2.6.26, created on 2014-01-03 02:17:18
         compiled from ricerca_feedback_guidatore.tpl */ ?>
<script src="js/valutazione.js"></script>
<br>
<h1 class="pagetitle">Rilascia un feedback a <?php echo $this->_tpl_vars['username_passeggero']; ?>
</h1>
<!-- Content unit - One column -->
<div> 
    <h1 class="block">Viaggio: &nbsp<?php echo $this->_tpl_vars['num_viaggio']; ?>
 da: <?php echo $this->_tpl_vars['citta_partenza']; ?>
 a: <?php echo $this->_tpl_vars['citta_arrivo']; ?>
 del <?php echo $this->_tpl_vars['data_partenza']; ?>
</h1>
    <div class="column1-unit">
        <div class="contactform">
			<table>
				<th class="mini">
				<div id='rate' >Voto:&nbsp</div> 
				</th>
				<th class="top">
				Commento: (facoltativo)
				</th>
				<tr>
					<td>
						<div id="jqxWidget">
							<div id="jqxRating"></div>
						</div>
					</td>
					<td>
						<textarea name="commento" class="commento" cols="70" rows="5" tabindex="1" maxlength="100"></textarea></p>
					</td>
				</tr>
			</table>
			 
        

            <p class="center"><input type="button" class="valuta_pass button_center" name1="<?php echo $this->_tpl_vars['username_passeggero']; ?>
" name2="<?php echo $this->_tpl_vars['num_viaggio']; ?>
" value="Valuta" tabindex="3" /></p>
            <br>              
        </div>              
    </div>
</div>