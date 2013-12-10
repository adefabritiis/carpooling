<script src="js/index.js"></script>
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
                    <div><a class="visualizza_utente pulsante" value="{$utenti[nr].username}">{$utenti[nr].username}</a></div>
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