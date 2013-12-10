<script src="js/index.js"></script>
<br><br>
{if $attivo}
    {if ($amministratore)}
        <div id="utente_amministratore">
            <p>- Amministratore</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" id="rendi_utente" value="Rendi Utente normale" name="{$username}">
        </div>
    {else}
        <div id="utente_normale">
            <p>- Utente</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" id="rendi_amministratore" value="Rendi Amministratore" name="{$username}">
        </div>
    {/if}
    <br><br>
    <div id="utente_attivo">
        <p>- Attivo</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" id="disattiva_account" value="Disattiva Account" name="{$username}">
    </div>
{else}
    <div id="utente_non_attivo">
        <p>- Non attivo</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" id="attiva_account" value="Attiva Account" name="{$username}">
    </div>
{/if}