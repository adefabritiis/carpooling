<script src="js/index.js"/>
<br>
<h1 class="pagetitle">Il tuo profilo</h1>
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
	<div>
	<h1 class="block">Passaggi offerti e feedback ricevuti da {$username}</h1>
	<div class="contactform">
		{if $array_commenti_guidatore}
		   <table>
			<th class="top">
                            <div>Commento dei passeggeri</div>
			</th>
			<th class="mini">
                            <div>Media feedback </div>
			</th>
			<th class="mini">
                            <div>ID </div>
			</th>
                    </tr>
			</table>
			<div class="contenitore">
			<table>
				
                    {section name=nr loop=$array_commenti_guidatore}
                        <tr class="riepilogo_viaggio pulsante" value="{$array_commenti_guidatore[nr].num_viaggio}"> 
                            <td width="35%">
								<div>
								{if $array_commenti_guidatore[nr].num_voti>0}
									{$array_commenti_guidatore[nr].commento}
								{else}
									[Nessun commento]
								{/if}
                            </td>
                            <td width="25%">
                                <div>
								{if $array_commenti_guidatore[nr].num_voti>0}
									{$array_commenti_guidatore[nr].voto_totale/$array_commenti_guidatore[nr].num_voti}
								{else}
									[Nessun voto]
								{/if}
								</div>
                            </td>
                             <td width="25%">
                                <div>
									{$array_commenti_guidatore[nr].num_viaggio}
								</div>
								
                            </td>
			</tr>
                    {/section}
			</table>
		{else}
		<p class="center"><label class="center-title"> Nessun passaggio offerto!</label></p>
		{/if}
	</div>
	</div>
	<div>
	<h1 class="block">Viaggi effettuati da passeggero e feedback ricevuti da {$username}</h1>
	<div class="contactform">
		{if $array_commenti_guidatore}
		   <table>
			<th class="top">
                            <div>Commento </div>
			</th>
			<th class="mini">
                            <div>Feedback</div>
			</th>
			<th class="mini">
                            <div>ID</div>
			</th>
                    </tr>
			</table>
			<div class="contenitore">
			<table>
				
                    {section name=nr loop=$array_commenti_passeggero}
                        <tr class="riepilogo_viaggio pulsante" value="{$array_commenti_passeggero[nr].num_viaggio}"> 
                            <td width="35%">
								<div>
								{if $array_commenti_passeggero[nr].votato}
									{$array_commenti_passeggero[nr].commento_guid}
								{else}
									[Nessun commento]
								{/if}
                            </td>
                            <td width="25%">
                                <div>
								{if $array_commenti_guidatore[nr].votato}
									{$array_commenti_passeggero[nr].feedback_guid}
								{else}
									[Nessun voto]
								{/if}
								</div>
                            </td>
                             <td width="25%">
                                <div>
									{$array_commenti_passeggero[nr].num_viaggio}
								</div>
								
                            </td>
			</tr>
                    {/section}
		{else}
		<p class="center"><label class="center-title"> Nessun viaggio presente!</label></p>
		{/if}
	</div>
	
</div>