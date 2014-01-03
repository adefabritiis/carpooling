<?php /* Smarty version 2.6.26, created on 2014-01-03 18:13:17
         compiled from registrazione_visualizza_profilo.tpl */ ?>
<script src="js/index.js"/>
<br>
<h1 class="pagetitle">Il tuo profilo</h1>
<div>
    <h1 class="block">&nbsp<?php echo $this->_tpl_vars['username']; ?>
&nbsp</h1>
</div>
<div class="column1-unit">
    <div class="contactform">
        <h1><b><?php echo $this->_tpl_vars['nome']; ?>
&nbsp<?php echo $this->_tpl_vars['cognome']; ?>
</b></h1>
        <h3><?php echo $this->_tpl_vars['citta_residenza']; ?>
</h3>                    
        <p><img src=<?php echo $this->_tpl_vars['immagine_profilo']; ?>
 alt="Image description" height="200" width="200"/></p>
        <p>Valutazione guidatore: <?php echo $this->_tpl_vars['media_feedback_guidatore']; ?>
(<?php echo $this->_tpl_vars['num_viaggi_guid']; ?>
)</p>
        <p>Valutazione passeggero: <?php echo $this->_tpl_vars['media_feedback_passeggero']; ?>
</p>
	<p>Email:<b>&nbsp<?php echo $this->_tpl_vars['email']; ?>
</b></p>
        <p>Numero di telefono:<b>&nbsp<?php echo $this->_tpl_vars['num_telefono']; ?>
</b></p>
        <p>Data di nascita:<b>&nbsp<?php echo $this->_tpl_vars['data_nascita']; ?>
</b></p>
        <p>Città di nascita:<b>&nbsp<?php echo $this->_tpl_vars['citta_nascita']; ?>
</b></p><br><br><br><br>
    </div>
	</div>
	<div>
	<h1 class="block">Passaggi offerti e feedback ricevuti da <?php echo $this->_tpl_vars['username']; ?>
</h1>
	<div class="contactform">
		<?php if ($this->_tpl_vars['array_commenti_guidatore']): ?>
		   <table>
			<th class="top">
                            <div>Commento dei passeggeri</div>
			</th>
			<th class="mini">
                            <div>Media feedback </div>
			</th>
			<th class="mini">
                            <div>ID </div>
			</th>
                    </tr>
			</table>
			<div class="contenitore">
			<table>
				
                    <?php unset($this->_sections['nr']);
$this->_sections['nr']['name'] = 'nr';
$this->_sections['nr']['loop'] = is_array($_loop=$this->_tpl_vars['array_commenti_guidatore']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['nr']['show'] = true;
$this->_sections['nr']['max'] = $this->_sections['nr']['loop'];
$this->_sections['nr']['step'] = 1;
$this->_sections['nr']['start'] = $this->_sections['nr']['step'] > 0 ? 0 : $this->_sections['nr']['loop']-1;
if ($this->_sections['nr']['show']) {
    $this->_sections['nr']['total'] = $this->_sections['nr']['loop'];
    if ($this->_sections['nr']['total'] == 0)
        $this->_sections['nr']['show'] = false;
} else
    $this->_sections['nr']['total'] = 0;
if ($this->_sections['nr']['show']):

            for ($this->_sections['nr']['index'] = $this->_sections['nr']['start'], $this->_sections['nr']['iteration'] = 1;
                 $this->_sections['nr']['iteration'] <= $this->_sections['nr']['total'];
                 $this->_sections['nr']['index'] += $this->_sections['nr']['step'], $this->_sections['nr']['iteration']++):
$this->_sections['nr']['rownum'] = $this->_sections['nr']['iteration'];
$this->_sections['nr']['index_prev'] = $this->_sections['nr']['index'] - $this->_sections['nr']['step'];
$this->_sections['nr']['index_next'] = $this->_sections['nr']['index'] + $this->_sections['nr']['step'];
$this->_sections['nr']['first']      = ($this->_sections['nr']['iteration'] == 1);
$this->_sections['nr']['last']       = ($this->_sections['nr']['iteration'] == $this->_sections['nr']['total']);
?>
                        <tr class="riepilogo_viaggio pulsante" value="<?php echo $this->_tpl_vars['array_commenti_guidatore'][$this->_sections['nr']['index']]['num_viaggio']; ?>
"> 
                            <td width="35%">
								<div>
								<?php if ($this->_tpl_vars['array_commenti_guidatore'][$this->_sections['nr']['index']]['num_voti'] > 0): ?>
									<?php echo $this->_tpl_vars['array_commenti_guidatore'][$this->_sections['nr']['index']]['commento']; ?>

								<?php else: ?>
									[Nessun commento]
								<?php endif; ?>
                            </td>
                            <td width="25%">
                                <div>
								<?php if ($this->_tpl_vars['array_commenti_guidatore'][$this->_sections['nr']['index']]['num_voti'] > 0): ?>
									<?php echo $this->_tpl_vars['array_commenti_guidatore'][$this->_sections['nr']['index']]['voto_totale']/$this->_tpl_vars['array_commenti_guidatore'][$this->_sections['nr']['index']]['num_voti']; ?>

								<?php else: ?>
									[Nessun voto]
								<?php endif; ?>
								</div>
                            </td>
                             <td width="25%">
                                <div>
									<?php echo $this->_tpl_vars['array_commenti_guidatore'][$this->_sections['nr']['index']]['num_viaggio']; ?>

								</div>
								
                            </td>
			</tr>
                    <?php endfor; endif; ?>
			</table>
		<?php else: ?>
		<p class="center"><label class="center-title"> Nessun passaggio offerto!</label></p>
		<?php endif; ?>
	</div>
	</div>
	<div>
	<h1 class="block">Viaggi effettuati da passeggero e feedback ricevuti da <?php echo $this->_tpl_vars['username']; ?>
</h1>
	<div class="contactform">
		<?php if ($this->_tpl_vars['array_commenti_guidatore']): ?>
		   <table>
			<th class="top">
                            <div>Commento </div>
			</th>
			<th class="mini">
                            <div>Feedback</div>
			</th>
			<th class="mini">
                            <div>ID</div>
			</th>
                    </tr>
			</table>
			<div class="contenitore">
			<table>
				
                    <?php unset($this->_sections['nr']);
$this->_sections['nr']['name'] = 'nr';
$this->_sections['nr']['loop'] = is_array($_loop=$this->_tpl_vars['array_commenti_passeggero']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['nr']['show'] = true;
$this->_sections['nr']['max'] = $this->_sections['nr']['loop'];
$this->_sections['nr']['step'] = 1;
$this->_sections['nr']['start'] = $this->_sections['nr']['step'] > 0 ? 0 : $this->_sections['nr']['loop']-1;
if ($this->_sections['nr']['show']) {
    $this->_sections['nr']['total'] = $this->_sections['nr']['loop'];
    if ($this->_sections['nr']['total'] == 0)
        $this->_sections['nr']['show'] = false;
} else
    $this->_sections['nr']['total'] = 0;
if ($this->_sections['nr']['show']):

            for ($this->_sections['nr']['index'] = $this->_sections['nr']['start'], $this->_sections['nr']['iteration'] = 1;
                 $this->_sections['nr']['iteration'] <= $this->_sections['nr']['total'];
                 $this->_sections['nr']['index'] += $this->_sections['nr']['step'], $this->_sections['nr']['iteration']++):
$this->_sections['nr']['rownum'] = $this->_sections['nr']['iteration'];
$this->_sections['nr']['index_prev'] = $this->_sections['nr']['index'] - $this->_sections['nr']['step'];
$this->_sections['nr']['index_next'] = $this->_sections['nr']['index'] + $this->_sections['nr']['step'];
$this->_sections['nr']['first']      = ($this->_sections['nr']['iteration'] == 1);
$this->_sections['nr']['last']       = ($this->_sections['nr']['iteration'] == $this->_sections['nr']['total']);
?>
                        <tr class="riepilogo_viaggio pulsante" value="<?php echo $this->_tpl_vars['array_commenti_passeggero'][$this->_sections['nr']['index']]['num_viaggio']; ?>
"> 
                            <td width="35%">
								<div>
								<?php if ($this->_tpl_vars['array_commenti_passeggero'][$this->_sections['nr']['index']]['votato']): ?>
									<?php echo $this->_tpl_vars['array_commenti_passeggero'][$this->_sections['nr']['index']]['commento_guid']; ?>

								<?php else: ?>
									[Nessun commento]
								<?php endif; ?>
                            </td>
                            <td width="25%">
                                <div>
								<?php if ($this->_tpl_vars['array_commenti_guidatore'][$this->_sections['nr']['index']]['votato']): ?>
									<?php echo $this->_tpl_vars['array_commenti_passeggero'][$this->_sections['nr']['index']]['feedback_guid']; ?>

								<?php else: ?>
									[Nessun voto]
								<?php endif; ?>
								</div>
                            </td>
                             <td width="25%">
                                <div>
									<?php echo $this->_tpl_vars['array_commenti_passeggero'][$this->_sections['nr']['index']]['num_viaggio']; ?>

								</div>
								
                            </td>
			</tr>
                    <?php endfor; endif; ?>
		<?php else: ?>
		<p class="center"><label class="center-title"> Nessun viaggio presente!</label></p>
		<?php endif; ?>
	</div>
	
</div>