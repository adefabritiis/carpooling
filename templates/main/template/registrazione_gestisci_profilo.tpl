<br>
<script src="js/gestisci_profilo.js"></script>
<h1 class="pagetitle">Gestisci profilo</h1>
<h1 class="block">&nbsp{$username}&nbsp</h1>
        <div class="column1-unit">
            <div class="contactform">
                <h1><b>{$nome}&nbsp{$cognome}</b></h1>                   
                    <p><img src={$immagine_profilo} alt="Image description"/></p>
                <div>
                    <form action="index.php" method="post" enctype="multipart/form-data" name="carica_immagine">
                        <p><input type="hidden" name="controller" value="registrazione" /></p>
                        <p><input type="hidden" name="task" value="carica_immagine" /></p>    
                        <h3><label class="left">Cambia immagine profilo:</label><br><input type="file" name="img" style="font-weight: bold;"/></h3>
                        <p><input type="submit" class="button_center" name="carica_immagine"  value="Carica immagine" tabindex="5" /></p>
                    </form>
                </div>
            <h3><label class="left">Modifica password</label></h3><br><br>        
            <p><input type="button" id="modifica_password" class="button_center" value="Modifica" tabindex="6" /></p>
            </div>
        </div>
        <h1 class="block"> I tuoi veicoli </h1>
        <div class="coloum1-unit">
            <div class="contactform">
                {if $array}
                    <table>
                        <tr>
                            <th class="mini">
                                <div>Targa</div>
                            </th>
                            <th class="mini">
                                <div>Tipo</div>
                            </th>
                            </tr>
                    {section name=nr loop=$array}     
                        <tr class="riepilogo_veicolo pulsante" value="{$array[nr].targa}">
                            <td>
                                <div>{$array[nr].targa}</div>
                            </td>
                            <td>
                                <div><b>{$array[nr].tipo}</b></div>
                            </td>
                        </tr>
                    {/section}
                    </table>
                {else}
                    <p class="center"><label class="center-title"> Non ci sono veicoli!</label></p>  
                {/if}
                <p><input type="button" id="submit_veicolo_da_profilo" class="button" value="Aggiungi veicolo" tabindex="5" /></p>
                <br><br><br>
            </div>
        </div>