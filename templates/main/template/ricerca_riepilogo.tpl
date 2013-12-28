<br>
<script src="js/riepilogo.js"></script>
<h1 class="pagetitle">Dati viaggio</h1>
<div>
<!-- Content unit - One column -->
    <h1 class="block">Riepilogo del viaggio &nbsp{$num_viaggio}</h1>
    <div class="column1-unit">
        <div class="contactform">
            {if ($isPasseggero || $isGuidatore)}
                <p class="center"><label class="center-title">Partecipi a questo viaggio!</p>
            {/if}
			 {if $posti_disponibili<1 && !$isPasseggero}
                <p class="center"><label class="center-title">Non ci sono più posti disponibili!</label></p>
             {/if}
            <p class="center"><b>organizzato da:</b>&nbsp<label class="center pulsante"><a class="visualizza_utente"  name="{$partecipa}" value="{$username_guidatore}">{$username_guidatore}</a></label>{if ($isPasseggero && !$votato)}<input type="button" id="feedback" class="button_center" name="{$num_viaggio}" value="Feedback" tabindex="1" />{/if}</p>
            <p><label class="left">Data di partenza:</label><label class="left">&nbsp<b>{$data_partenza}</b></label></p><br>
            <p><label class="left">Città di partenza:</label><label class="left">&nbsp<b>{$citta_partenza}</b></label></p><br>
            <p><label class="left">Città di arrivo:</label><label class="left">&nbsp<b>{$citta_arrivo}</b><br></label></p><br>
            <p><label class="left">Veicolo:</label><label class="left">&nbsp<b>{$tipo}</b></label></p><br>
            <p><label class="left">Posti disponibili:</label><label class="left">&nbsp<b>{$posti_disponibili}</b></label></p><br>
            <p><label class="left">Costo a persona:</label><label class="left">&nbsp<b>{$costo}&nbsp€</b></label></p><br>
			<p><label class="left">Note viaggio:</label><div class="contenitore_mini"><div style="width:430px;"><p><h3><b>{$note}</b></h3></p></div></div><br><br>
		   
			{if ($loggato && !$isPasseggero && !$isGuidatore && $posti_disponibili>0)}
			
                <p class="center"><input type="button" id="partecipa" class="button_center" name="{$num_viaggio}" value="Partecipa" tabindex="1" /></p>
                
            {/if}
            {if $isPasseggero}
                <p class="center"><input type="button" id="cancellami" class="button_center" name1="{$num_viaggio}" name2="{$username_passeggero}" value="Cancellami" tabindex="1" /></p>
			
			{/if}
			
            </div>
			</div>
    <h1 class="block">Informazioni veicolo</h1>
        <div class="contactform">
            <p><label class="left">Targa:</label><label class="left">&nbsp<b>{$targa}</label></b><br></p>
            <p><label class="left">Tipo:</label><label class="left">&nbsp<b>{$tipo}</b></label><br></p>
            <p><label class="left">Posti:</label><label class="left">&nbsp<b>{$num_posti}</b><br></label><br></p>
            <p><label class="left">Carburante:</label><label class="left">&nbsp<b>{$carburante}</b></label><br></p>
            <p><label class="left">Consumo medio:</label><label class="left">&nbsp<b>{$consumo_medio}</b>&nbsp (Km con 1 litro)</label><br></p>
        
        </div>
    <h1 class="block">Informazioni sui passeggeri</h1>
        <div class="contactform">
            {if $array_passeggeri}
                <h2> Passeggeri partecipanti: </h2>
		<br>
                <hr>
                {section name=nr loop=$array_passeggeri}
                    <div>
                        <br>
			<p><a class="visualizza_utente"  name="{$partecipa}" value="{$array_passeggeri[nr].username_passeggero}"><label class="left pulsante">{$array_passeggeri[nr].username_passeggero} </label></a> {if ($array_passeggeri[nr].feedback_guid==0)  && $isGuidatore}<input type="button"  class="feedback_passeggero button_left" name1="{$array_passeggeri[nr].username_passeggero}" name2="{$num_viaggio}" value="Feedback" tabindex="1" /><input type="button"  class="elimina_passeggero button_left" name1="{$array_passeggeri[nr].username_passeggero}" name2="{$num_viaggio}" value="Elimina" tabindex="2" /><br>{else}<br>{/if}</p>
                    </div>  
                <hr>
                <br>
                {/section}
            {else}
                <h3> Non ci sono ancora passeggeri</h3>    
            {/if}
        </div>

		
            {if $isGuidatore || $isAmministratore}
				<h1 class="block"> Modifica viaggio </h1>
        <div class="contactform">
                <div>
                    <p class="center"><input type="button" class="elimina_viaggio button_center" name="{$num_viaggio}" value="Elimina viaggio" tabindex="8" /></p>
                </div>
            {/if}
			</div>
            {if $indietro}
                <div>
                    <p class="center"><input type="button_center" class="indietro button_center" value="Indietro" tabindex="8" /></p>
                </div>
            {/if}             
</div>