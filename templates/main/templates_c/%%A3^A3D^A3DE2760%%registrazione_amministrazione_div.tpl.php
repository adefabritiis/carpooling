<?php /* Smarty version 2.6.26, created on 2013-12-06 17:49:25
         compiled from registrazione_amministrazione_div.tpl */ ?>
<script src="js/index.js"></script>
<br><br>
<?php if ($this->_tpl_vars['attivo']): ?>
    <?php if (( $this->_tpl_vars['amministratore'] )): ?>
        <div id="utente_amministratore">
            <p>- Amministratore</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" id="rendi_utente" value="Rendi Utente normale" name="<?php echo $this->_tpl_vars['username']; ?>
">
        </div>
    <?php else: ?>
        <div id="utente_normale">
            <p>- Utente</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" id="rendi_amministratore" value="Rendi Amministratore" name="<?php echo $this->_tpl_vars['username']; ?>
">
        </div>
    <?php endif; ?>
    <br><br>
    <div id="utente_attivo">
        <p>- Attivo</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" id="disattiva_account" value="Disattiva Account" name="<?php echo $this->_tpl_vars['username']; ?>
">
    </div>
<?php else: ?>
    <div id="utente_non_attivo">
        <p>- Non attivo</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" id="attiva_account" value="Attiva Account" name="<?php echo $this->_tpl_vars['username']; ?>
">
    </div>
<?php endif; ?>