<br>
<h1 class="pagetitle">Elenco Utenti</h1><br>
<script src="js/index.js"></script>
<!-- Content unit - One column -->
<h2 class="block">
        <a class="pulsante" id="nascondi_avanzata" name="nascondi">+ ricerca avanzata</a>
        <a class="pulsante" id="mostra_avanzata" name="mostra">- nascondi</a>
</h2>
<div class="mostra_ricerca">
    <h1 class="block">Ricerca Utenti</h1>
        <div class="column1-unit">
          <div class="contactform">
             <form>
              <fieldset>
                <p><label for="username" class="left">Username: </label>
                   <input type="text" name="username" id="username_ricerca" class="field" value="" tabindex="1"  /></p>
                <p><label for="cognome" class="left">Cognome:</label>
                   <input type="text" name="cognome" id="cognome_ricerca" class="field" value="" tabindex="2"  /></p>
                <p><label for="citta" class="left">Citta Residenza:</label>
                   <input type="text" name="citta" id="citta_residenza_ricerca" class="field" value="" tabindex="3"  /></p>
                
                <p><input type="button" id="submit_ricerca_utenti" class="button" value="Cerca" tabindex="4" /></p>
              </fieldset>
            </form>
         </div>
        </div>
</div>
<div class="column1-unit">
    <div id="risultati_utenti" >
        <div class="column1-unit">
    <div> 
        {if $utenti}
            <h1> Lista utenti cercati </h1>
            <hr>
            <div><a class="ordina_utenti pulsante" name="username">Username</a></div>
            <div><a class="ordina_utenti pulsante" name="nome">Nome</a></div>
            <div><a class="ordina_utenti pulsante" name="cognome">Cognome</a></div>
            <div><a class="ordina_utenti pulsante" name="citta_residenza">Citta di residenza</a></div>
            {section name=nr loop=$utenti}
                <div>     
 <!--da implementare--><div><a class="visualizza_utente pulsante" value="{$utenti[nr].username}">{$utenti[nr].username}</a></div>
                    <div>{$utenti[nr].nome}</div>
                    <div>{$utenti[nr].cognome}</div>
                    <div>{$utenti[nr].citta_residenza}</div>
                </div>  
            <hr>
            {/section}
        {else}
            <h3> Non ci sono utenti</h3>    
        {/if}
    </div>
</div>
    </div>
    <div id="risultati_ricerca_utenti"></div>
    </div>