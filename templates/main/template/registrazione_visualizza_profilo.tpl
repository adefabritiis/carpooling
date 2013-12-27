<script src="js/index.js"/>
<br>
<h1 class="pagetitle">Dati profilo</h1>
<div>
    <h1 class="block">&nbsp{$username}&nbsp</h1>
</div>
<div class="column1-unit">
    <div class="contactform">
        <h1><b>{$nome}&nbsp{$cognome}</b></h1>
        <h3>{$citta_residenza}</h3>                    
        <p><img src={$immagine_profilo} alt="Image description" height="200" width="200"/></p>
        <p>Valutazione guidatore: {$media_feedback_guidatore}({$num_viaggi_guid})</p>
        <p>Valutazione passeggero: {$media_feedback_passeggero}</p>
	<p>Email:<b>&nbsp{$email}</b></p>
        <p>Numero di telefono:<b>&nbsp{$num_telefono}</b></p>
        <p>Data di nascita:<b>&nbsp{$data_nascita}</b></p>
        <p>Città di nascita:<b>&nbsp{$citta_nascita}</b></p><br><br><br><br>
    </div>
</div>