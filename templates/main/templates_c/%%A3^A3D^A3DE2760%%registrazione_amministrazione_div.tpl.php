<?php /* Smarty version 2.6.26, created on 2013-12-20 16:15:06
         compiled from registrazione_amministrazione_div.tpl */ ?>
<script src="js/amministrazione_utenti.js"></script>
<br>
<?php if ($this->_tpl_vars['attivo']): ?>
    <?php if (( $this->_tpl_vars['amministratore'] )): ?>
        <div id="utente_amministratore">
            <p>Tipo utente: <b> Amministratore</b></p>
            <p><input type="button" class="button_center" id="rendi_utente" value="◄ Utente default" name="<?php echo $this->_tpl_vars['username']; ?>
"></P>
        </div>
    <?php else: ?>
        <div id="utente_normale">
            <p>Tipo utente: <b>Utente default</b></p>
            <p><input type="button" class="button_center" id="rendi_amministratore" value="► Amministratore" name="<?php echo $this->_tpl_vars['username']; ?>
"></p>
        </div>
    <?php endif; ?>
    <br><br>
    <div id="utente_attivo">
        <p>Stato: <b> Attivo </b></p>
        <p><input type="button" class="button_center" id="disattiva_account" value="◄ Disattiva" name="<?php echo $this->_tpl_vars['username']; ?>
"></p>
    </div>
<?php else: ?>
    <div id="utente_non_attivo">
        <p>Stato:<b> Non attivo</b></p>
        <p><input type="button" class="button_center" id="attiva_account" value="► Attiva" name="<?php echo $this->_tpl_vars['username']; ?>
"></p>
    </div>
<?php endif; ?>