<br>
<script src="js/index.js"></script>
<h1 class="pagetitle">Home page</h1>
<div><h1 class="block">Ultimi viaggi inseriti dagli utenti</h1></div>
<div class="column1-unit">	
    <div class="contactform" >
        {if $viaggi}
             <table width:650px;>
                    <tr>
                        <th class="mini">
                            <div>ID</div>
			</th>
			<th class="mini">
                            <div>Data  </div>
			</th>
			<th class="top">
                            <div>Partenza da  </div>
			</th>
			<th class="top">
                            <div>Arrivo a  </div>
			</th>
			<th class="mini">
                            <div>Costo  </div>
			</th>
                    </tr>
			</table>
			<div class="contenitore">
			<table width:650px>
				
                    {section name=nr loop=$viaggi}
                        <tr  class="riepilogo_viaggio pulsante" value="{$viaggi[nr].num_viaggio}"> 
                            <td width="87">
                                <div>{$viaggi[nr].num_viaggio}</div>
                            </td>
                            <td width="87">
                                <div>{$viaggi[nr].data_partenza}</div>
                            </td>
                            <td>
                                <div><b>{$viaggi[nr].citta_partenza}</b></div>
                            </td>
                            <td>
                                <div><b>{$viaggi[nr].citta_arrivo}</b></div>
                            </td>
                            <td width="87">
                                <div>{$viaggi[nr].costo}&nbsp €</div>
                            </td>
			</tr>
                    {/section}
			
                
                </table>
            </div>
        {else}
            <p class="center"><label class="center-title"> Non ci sono viaggi!</label></p>  
        {/if}    
    </div>         
</div>
