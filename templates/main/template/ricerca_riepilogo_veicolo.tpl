<br>
<script src="js/veicolo.js"></script>
<h1 class="pagetitle">Dati viaggio</h1>
<!-- Content unit - One column -->
<div> 
    <h1 class="block">Dettagli veicolo {$targa}&nbsp</h1>
    <div class="column1-unit">
        <div class="contactform">            
            <p><label class="left"><h2> Targa: &nbsp<b>{$targa}</b></h2></label></p>
            <p><label class="left"><h3> Tipo: &nbsp<b>{$tipo}</b></h3></label></p>
            <p><label class="left"><h3> Numero Posti: &nbsp<b>{$num_posti}</b></h3></label></p>
            <p><label class="left"><h3> Carburante: &nbsp<b>{$carburante}</b></h3></label></p>
            <p><label class="left"><h3> Consumo Medio km/l: &nbsp<b>{$consumo_medio}</b></h3></label></p>        
            <div>
                <p><input type="button" class="elimina_veicolo button" tabindex="1" value="Elimina veicolo" name="{$targa}"/></p>
            </div>
        </div>              
    </div>
</div>