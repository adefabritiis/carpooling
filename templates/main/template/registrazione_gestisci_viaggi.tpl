<br>
<script src="js/gestisci_viaggi.js"></script>
<h1 class="pagetitle">Gestisci viaggi</h1>

        <!-- Content unit - One column -->
		<h1 class="block">Viaggi inseriti da {$username}</h1>        
        <div class="column1-unit">
          <div class="contactform" >
            
            {if $array_viaggi}
                <div style="width:650px;height:700px;overflow-y: scroll; border:1px ">
                <table width:650px;>
			<tr>
				<th class="mini">
					<div>ID</div>
				</th>
				<th class="mini">
					<div>Data  </div>
				</th>
				<th class="mini">
					<div>Partenza da  </div>
				</th>
				<th class="mini">
					<div>Arrivo a  </div>
				</th>
				<th class="mini">
					<div>Costo  </div>
				</th>
                                <th class="mini">
                                        <div>Opzioni  </div>
                                </th>
                                    
				
			</tr>
           {section name=nr loop=$array_viaggi}
                <div class="pulsante">     
                    <tr class="riepilogo_viaggio pulsante" value="{$array_viaggi[nr].num_viaggio}">
                        <td>
                                <div>{$array_viaggi[nr].num_viaggio}</div>
			 </td>
			 <td>
                                <div><b>{$array_viaggi[nr].data_partenza}</b></div>
			 </td>
                         <td>
                                <div><b>{$array_viaggi[nr].citta_partenza}</b></div>
			 </td>
                         <td>
                                <div><b>{$array_viaggi[nr].citta_arrivo}</b></div>
			 </td>
			 <td>
				<div>{$array_viaggi[nr].costo}&nbsp €</div>
			 </td>
                         <td> 
                                <div><input type="button" name="{$array_viaggi[nr].num_viaggio}" class="elimina_viaggio pulsante" value="Elimina" tabindex="1" /></div>
                         </td>    
                    </tr>
        {/section}
            </table>
            </div>
        {else}
                <p class="center"><label class="center-title"> Non hai inserito viaggi!</label></p>     
        {/if}
           </div>              
        </div>
           
<h1 class="block">Viaggi a cui partecipi </h1>        
        <div class="column1-unit">
          <div class="contactform" >
            
            {if $array_passeggero}
                <table>
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
            {section name=nr loop=$array_passeggero}
                 <div class="pulsante">     
                       <tr class="riepilogo_viaggio" value="{$array_passeggero[nr].num_viaggio}"><p>
                           <td>
                                <div>{$array_passeggero[nr].num_viaggio}</div>
			 </td>
			 <td>
                                <div><b>{$array_passeggero[nr].data_partenza}</b></div>
			 </td>
                         <td>
                                <div><b>{$array_passeggero[nr].citta_partenza}</b></div>
			 </td>
                         <td>
                                <div><b>{$array_passeggero[nr].citta_arrivo}</b></div>
			 </td>
			 <td>
				<div>{$array_passeggero[nr].costo}&nbsp €</div>
			 </td>
		</tr>
            {/section}
                </table>
            {else}
                    <p class="center"><label class="center-title"> Non partecipi a nessun viaggio!</label></p>    
            {/if}
           </div>              
        </div>