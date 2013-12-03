		<br>
<script src="js/index.js"></script>
        <h1 class="pagetitle">Dati viaggio</h1>

        <!-- Content unit - One column -->
<div> 
        <h1 class="block">Riepilogo del viaggio &nbsp{$num_viaggio}</h1>
        <div class="column1-unit">
          <div class="contactform">
			{if ($isPasseggero || $isGuidatore)}
            <p><label class="left"><h3>Parteciperai a questo viaggio!</h3></p><br><br>
			{/if}
            <p><label class="left"><h2> Viaggio organizzato da: &nbsp<b>{$username_guidatore}</b></h2></label></p>
            <p><label class="left"><h3> Città di partenza: &nbsp<b>{$citta_partenza}</b></h3></label></p>
            <p><label class="left"><h3> Città di arrivo: &nbsp<b>{$citta_arrivo}</b></h3></label></p>
            <p><label class="left"><h3> Data di partenza: &nbsp<b>{$data_partenza}</b></h3></label></p>
            <p><label class="left"><h3> Veicolo: &nbsp<b>{$tipo}</b></h3></label></p>
			<p><label class="left"><h3> Informazioni veicolo: &nbsp{$targa}</h3></label></p>
            {$posti_disponibili}
            <p><label class="left"><h3> Informazioni aggiuntive: &nbsp<b>{$note}</b></h3></label></p>
	    {if ($loggato && !$isPasseggero && !$isGuidatore && $posti_disponibili>0)}
                <p><input type="button" id="partecipa" class="button" name="{$num_viaggio}" value="Partecipa" tabindex="1" /></p><br><br>
                {if $posti_disponibili<1}
                NON CI SONO PIU POSTI DISPONIBILI
                {/if}
             {/if}
	     {if $isPasseggero}
                <p><input type="button" id="cancellami" class="button" name1="{$num_viaggio}" name2="{$username_passeggero}" value="Cancellami" tabindex="1" /></p><br><br>
             {/if}
            {$targa}
            {$tipo}
            {$num_posti}
            {$carburante}
            {$consumo_medio}
             {if ($isPasseggero && !$votato)}
                <p><input type="button" id="feedback" class="button" name="{$num_viaggio}" value="Feedback" tabindex="1" /></p><br><br>
             {/if}
            {if $array_passeggeri}
                <h1> Passeggeri partecipanti: </h1>
						   <br>
                           <hr>
                    {section name=nr loop=$array_passeggeri}
                    <div>
						<br>
						<p>
                        <a class="visualizza_utente"  value="{$array_passeggeri[nr].username_passeggero}"><label class="left pulsante">{$array_passeggeri[nr].username_passeggero} </label></a> {if ($array_passeggeri[nr].feedback_guid==0)  && $isGuidatore} <input type="button"  class="feedback_passeggero button_left" name1="{$array_passeggeri[nr].username_passeggero}" name2="{$num_viaggio}" value="Feedback" tabindex="1" /><input type="button"  class="elimina_passeggero button_left" name1="{$array_passeggeri[nr].username_passeggero}" name2="{$num_viaggio}" value="Elimina" tabindex="2" /><br> {else}<br>{/if}
						</p>
                    </div>  
                    <hr>
                    {/section}
            {else}
                    <h3> Non ci sono passeggeri</h3>    
            {/if}
          </div>              
        </div>
</div>
