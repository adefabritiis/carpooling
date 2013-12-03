		<br>
        <h1 class="pagetitle">Elenco Viaggi</h1>

        <!-- Content unit - One column -->
		 <h1 class="block">Dati viaggi</h1>
         <script src="js/index.js"></script>         
        <div class="column1-unit">
          <div class="contactform" >
            
            {if $viaggi}
<h1> Lista viaggi cercati </h1>
<hr>
{section name=nr loop=$viaggi}
    <div>     
        <a class="riepilogo_viaggio" value="{$viaggi[nr].num_viaggio}"><h5>{$viaggi[nr].citta_partenza}&nbsp{$viaggi[nr].citta_arrivo}&nbsp{$viaggi[nr].data_partenza}</h5></a>
    </div>  
<hr>
{/section}
{else}
<h3> Non ci sono viaggi</h3>    
{/if}
           </div>              
        </div>
