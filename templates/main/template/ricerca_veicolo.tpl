<h1 class="pagetitle">Inserimento nuovo veicolo</h1>
<script src="js/veicolo.js"></script>
<!-- Content unit - One column -->
<div>
    <h1 class="block">Dati veicolo</h1>
    <div class="column1-unit">
        <div class="contactform">
            <form>
                <fieldset>
                <p><label for="targa" class="left">Targa:</label>
                   <input type="text" name="targa" id="targa" class="field" value="" tabindex="1"  /></p>
                <p><label for="tipo" class="left">Tipo:</label>
                   <input type="text" name="tipo" id="tipo" class="field" value="" tabindex="2" /></p>
                <p><label for="num_posti" class="left">Numero Posti:</label>
                   <input type="text" name="num_posti" id="num_posti" class="field" value="" tabindex="3" /></p>
                <p><label for="carburante" class="left">Carburante:</label>
                   <input type="text" name="carburante" id="carburante" class="field" value="" tabindex="4" /></p>
                <p><label for="consumo_medio" class="left">Consumo Medio (km/l):</label>
                   <input type="text" name="consumo_medio" id="consumo_medio" class="field" value="" tabindex="5" /></p>
                {if ($da=='inserisci')}
                    <p><input type="button" id="submit_aggiungi_da_inserisci" class="button" value="Aggiungi" tabindex="6" /></p>
                {else}
                    <p><input type="button" id="submit_aggiungi_da_profilo" class="button" value="Aggiungi" tabindex="7" /></p>
                {/if}
		</fieldset>
            </form>   
        </div>
    </div>
</div>