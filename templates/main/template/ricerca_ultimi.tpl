		<br>
		<script src="js/index.js"></script>
        <h1 class="pagetitle">Home page</h1>
		<div><h1 class="block">Ultimi viaggi inseriti</h1></div>
          <div class="contactform" >
            
            {if $viaggi}
<hr>
{section name=nr loop=$viaggi}
    <div class="pulsante">  
	<a class="riepilogo_viaggio" value="{$viaggi[nr].num_viaggio}"><h5>{$viaggi[nr].data_partenza}&nbsp-&nbspDa:&nbsp{$viaggi[nr].citta_partenza}&nbspA:&nbsp{$viaggi[nr].citta_arrivo}</h5></a>
    </div>  
<hr>
{/section}
{else}
<h3> Non ci sono viaggi</h3>    
{/if}             
</div>
