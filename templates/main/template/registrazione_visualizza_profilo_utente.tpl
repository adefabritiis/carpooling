<br>
<script src="js/amministrazione_utenti.js"></script>
<h1 class="pagetitle">Dati profilo</h1>
<div>
    <h1 class="block">&nbsp{$username}&nbsp</h1>
</div>
<div class="column1-unit">
    <div class="contactform">
        <h1><b>{$nome}&nbsp{$cognome}</b></h1>
        <h3>{$citta_residenza}</h3>                    
        <p><img src={$immagine_profilo} alt="Image description" width="200" height="200"/></p>
        <p>Valutazione guidatore: {$media_feedback_guidatore}({$num_viaggi_guid})</p>
        <p>Valutazione passeggero: {$media_feedback_passeggero}</p>
		<p>Email:<b>&nbsp{$email}</b></p>
        {if $partecipa || $loggato_amministratore}
            <p>Numero di telefono:<b>&nbsp{$num_telefono}</b></p>
        {/if}
        <p>Data di nascita:<b>&nbsp{$data_nascita}</b></p>
        <p>Città di nascita:<b>&nbsp{$citta_nascita}</b></p><br><br>
	<p><hr></p>
        {if ($loggato_amministratore)}
            <div id="mostra_amministrazione" name="{$username}"><p><input type="button" class="button_center" value="► Opzioni"></p></div>
            <div id="nascondi_amministrazione"><p><input type="button" class="button_center" value="◄ Opzioni"></p></div>
            <div id="amministrazione"></div>
        {/if}
    </div>
</div>