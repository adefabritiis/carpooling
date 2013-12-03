<br>
<script src="js/index.js"></script>
<h1 class="pagetitle">Gestisci profilo</h1>
<div>
<h1 class="block">&nbsp{$username}&nbsp</h1>
</div>
        <div class="column1-unit">
		<div class="contactform">
          <h1><b>{$nome}&nbsp{$cognome}</b></h1>
          <h3>{$citta_residenza}</h3>                    
         <div>
         <p><img src={$immagine_profilo} alt="Image description"/></p>
         </div>
         <div>
          <p>
          <label class="left">Cambia immagine profilo</label><input type="file" />
          </p>
          </div>
          
		  <br><br>
		  </div>
		  </div>
		  <h1 class="block"> I tuoi veicoli </h1>
		  <div class="coloum1-unit">
		  <div class="contactform">
                  {if $array}
		

<hr>
{section name=nr loop=$array}
    <div class="pulsante">     
        <a class="riepilogo_veicolo" value="{$array[nr].targa}"><h5>{$array[nr].targa}&nbsp-&nbsp{$array[nr].tipo}</h5></a>
    </div>  
<hr>
{/section}
{else}
<h3> Non ci sono veicoli</h3>    
{/if}
<br><br>
 <p><input type="button" id="submit_veicolo_da_profilo" class="button" value="Aggiungi veicolo" tabindex="5" /></p>
 <br><br>
        </div>
		</div>