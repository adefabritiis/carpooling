		<br>
<script src="js/index.js"></script>
        <h1 class="pagetitle">Dati viaggio</h1>

        <!-- Content unit - One column -->
<div> 
        <h1 class="block">Riepilogo del viaggio &nbsp{$num_viaggio}</h1>
        <div class="column1-unit">
          <div class="contactform">
			{if ($isPasseggero || $isGuidatore)}
            <p class="center"><label class="center-title">Partecipi a questo viaggio!</p>
			{/if}
            <p class="center"><label class="center">(organizzato da: <b>{$username_guidatore})</b></label></p>
			<p><label class="left">Data di partenza:</label><label class="left">&nbsp<b>{$data_partenza}</label></b><br></p>
            <p><label class="left">Città di partenza:</label><label class="left">&nbsp<b>{$citta_partenza}</b></label><br></p>
            <p><label class="left">Città di arrivo:</label><label class="left">&nbsp<b>{$citta_arrivo}</b><br></label><br></p>
            <p><label class="left">Veicolo:</label><label class="left">&nbsp<b>{$tipo}</b></label><br></p>
            <p><label class="left">Posti disponibili:</label><label class="left">&nbsp<b>{$posti_disponibili}</b></label><br></p>
		    <p><label class="left">Note viaggio:</label><label class="contenitore">&nbsp<b>{$note} //cambiare css</b></label><br><br><br></p>
	    {if ($loggato && !$isPasseggero && !$isGuidatore && $posti_disponibili>0)}
                <p><input type="button" id="partecipa" class="button" name="{$num_viaggio}" value="Partecipa" tabindex="1" /></p><br><br>
                {if $posti_disponibili<1}
                <h3>Non ci sono posti disponibili per questo viaggio</h3>
                {/if}
             {/if}
	     {if $isPasseggero}
                <p><input type="button" id="cancellami" class="button" name1="{$num_viaggio}" name2="{$username_passeggero}" value="Cancellami" tabindex="1" /></p><br><br>
             {/if}
			  {if ($isPasseggero && !$votato)}
                <p><input type="button" id="feedback" class="button" name="{$num_viaggio}" value="Feedback" tabindex="1" /></p><br><br>
             {/if}
		</div>
		</div>
			 <h1 class="block">Informazioni veicolo</h1>
		    <div class="colomn1-unit">
			<div class="contactform">
			<p><label class="left">Targa:</label><label class="left">&nbsp<b>{$targa}</label></b><br></p>
            <p><label class="left">Tipo:</label><label class="left">&nbsp<b>{$tipo}</b></label><br></p>
            <p><label class="left">Posti:</label><label class="left">&nbsp<b>{$num_posti}</b><br></label><br></p>
            <p><label class="left">Carburante:</label><label class="left">&nbsp<b>{$carburante}</b></label><br></p>
            <p><label class="left">Consumo medio:</label><label class="left">&nbsp<b>{$consumo_medio}</b>&nbsp (Km con 1 litro)</label><br></p>
            </div>
			</div>
			<h1 class="block">Informazioni sui passeggeri</h1>
		    <div class="colomn1-unit">
			<div class="contactform">
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
                    <h3> Non ci sono ancora passeggeri</h3>    
            {/if}
          </div>              
        </div>
</div>
