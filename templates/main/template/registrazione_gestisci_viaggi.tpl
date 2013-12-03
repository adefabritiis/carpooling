<br>
<script src="js/index.js"></script>
<h1 class="pagetitle">Gestisci viaggi</h1>

        <!-- Content unit - One column -->
		<h1 class="block">Viaggi inseriti da {$username}</h1>        
        <div class="column1-unit">
          <div class="contactform" >
            
            {if $array_viaggi}
<hr>
{section name=nr loop=$array_viaggi}
    <div class="pulsante">     
        <a class="riepilogo_viaggio" value="{$array_viaggi[nr].num_viaggio}"><p><h5>{$array_viaggi[nr].num_viaggio})&nbsp{$array_viaggi[nr].data_partenza}&nbspDa:&nbsp{$array_viaggi[nr].citta_partenza}&nbspA:&nbsp<b>{$array_viaggi[nr].citta_arrivo}</b>&nbsp</h5></a><p><input type="button" name="{$num_viaggio}" class="elimina_viaggio" class="button" value="Elimina" tabindex="1" /><br></p>
    </div>  
<hr>
{/section}
{else}
<h3> Non ci sono viaggi</h3>    
{/if}
           </div>              
        </div>
           
<h1 class="block">Viaggi a cui partecipi </h1>        
        <div class="column1-unit">
          <div class="contactform" >
            
            {if $array_passeggero}
<hr>
{section name=nr loop=$array_passeggero}
    <div class="pulsante">     
        <a class="riepilogo_viaggio" value="{$array_passeggero[nr].num_viaggio}"><p><h5>{$array_passeggero[nr].num_viaggio})&nbsp{$array_passeggero[nr].data_partenza}&nbspDa:&nbsp{$array_passeggero[nr].citta_partenza}&nbspA:&nbsp<b>{$array_passeggero[nr].citta_arrivo}</b>&nbsp</h5>
    </div>  
<hr>
{/section}
{else}
<h3> Non ci sono viaggi</h3>    
{/if}
           </div>              
        </div>