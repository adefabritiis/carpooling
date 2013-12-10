<br>
<script src="js/index.js"></script>
<h1 class="pagetitle">Dati profilo</h1>
<div>
<h1 class="block">&nbsp{$username}&nbsp</h1>
</div>
        <div class="column1-unit">
          <h1><b>{$nome}&nbsp{$cognome}</b></h1>
          <h3>{$citta_residenza}</h3>                    
          <p><img src={$immagine_profilo} alt="Image description"/></p>
          <p>Valutazione guidatore: {$media_feedback_guidatore}({$num_viaggi_guid})</p>
          <p>Valutazione passeggero: {$media_feedback_passeggero}</p>
	  <p>Email:<b>&nbsp{$email}</b></p>
          <p>Data di nascita:<b>&nbsp{$data_nascita}</b></p>
          <p>Città di nascita:<b>&nbsp{$citta_nascita}</b></p>
</div>
{if ($loggato_amministratore)}
    <div>
        <div id="mostra_amministrazione" name="{$username}"><input type="button" value="+ opzioni"></div>
        <div id="nascondi_amministrazione"><input type="button" value="- opzioni"></div>
        <div id="amministrazione"></div> 
    </div>
{/if}