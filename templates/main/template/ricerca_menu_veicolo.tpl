<script src="js/index.js"></script>
<div id="menu_veicoli">
   <select class="veicoli"> 
       {section name=nr loop=$veicoli}
           <option value="{$veicoli[nr].targa}"><h5>{$veicoli[nr].targa}</h5></option>
       {/section}
   </select>
</div>