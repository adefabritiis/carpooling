<?php /* Smarty version 2.6.26, created on 2013-12-20 12:09:50
         compiled from registrazione_modifica_pwd.tpl */ ?>
<script src="js/index.js"></script>
		<br>
<div>
        <h1 class="pagetitle">Modifica password</h1>
        <?php if ($this->_tpl_vars['errore']): ?> <h2>Attenzione errore inserimento campi</h2> <?php endif; ?>
        <!-- Content unit - One column -->
		<h1 class="block">Inserisci password attuale e nuova password</h1>
        <div class="column1-unit">
          <div class="contactform">
                <p><label for="password" class="left">Password attuale:</label>
                   <input type="password" id="pwdattuale" maxlength="20" class="field" value="" tabindex="1" /></p>
                <p><label for="password" class="left">Nuova password:</label>
                   <input type="password" id="pwd" maxlength="20" class="field" value="" tabindex="2" /></p>
                <p><label for="password" class="left">Conferma password:</label>
                   <input type="password" id="pwd1" maxlength="20" class="field" value="" tabindex="3" /></p>
                <p><input type="button" id="conferma_password" class="button" value="Invia" tabindex="4" /></p>
          </div>
        </div>
</div>