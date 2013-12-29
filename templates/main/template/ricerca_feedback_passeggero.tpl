<script src="js/valutazione.js"></script>
<h1 class="pagetitle">Rilascia un feedback a {$username_guidatore}</h1>
<!-- Content unit - One column -->
<div> 
    <h1 class="block">Viaggio: &nbsp{$num_viaggio} da: {$citta_partenza} a: {$citta_arrivo} del {$data_partenza}</h1>
    <div class="column1-unit">
        <div class="contactform">
            <p><label for="commento" class="left">Commento:</label>
                <textarea name="commento" class="commento" cols="45" rows="7" tabindex="1"></textarea></p>
            <div id="jqxWidget" style="font-size: 13px; font-family: Verdana;">
                <div id="jqxRating"></div>
                <div style='margin-top:10px;'>
                    <div style='float: left;'>Rating:</div> <div style='float: left;' id='rate'></div>
                </div>
            </div>
            <br><br>
            <!--<p><label for="valutazione" class="left">Valutazione:</label>
                <input type="text" name="valutazione" class="valutazione" class="field" value="" tabindex="2"  /></p>-->
            <p><input type="button" id="valuta" class="button_left" name="{$num_viaggio}" value="Valuta" tabindex="3" /></p>
            <br>
        </div>              
    </div>
</div>
