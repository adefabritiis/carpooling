<script src="js/index.js"></script>
{if ($amministratore)}
    <div id="utente_amministratore">
        <input type="button" id="rendi_utente" value="Rendi Utente normale" name="{$username}">
    </div>
{else}
    <div id="utente_normale">
         <input type="button" id="rendi_amministratore" value="Rendi Amministratore" name="{$username}">
    </div>
{/if}
{if ($attivo)}
    <div id="utente_attivo">
        <input type="button" id="disattiva_account" value="Disattiva Account" name="{$username}">
    </div>
{else}
    <div id="utente_attivo">
        <input type="button" id="attiva_account" value="Attiva Account" name="{$username}">
    </div>
{/if}