$(document).ready(function(){
$('#submit_aggiungi_da_inserisci').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'aggiungi_veicolo', da:'inserisci', targa:$('#targa').val(), tipo:$('#tipo').val(), num_posti:$('#num_posti').val(), carburante:$('#carburante').val(), consumo_medio:$('#consumo_medio').val()}, 
            success:veicolo_aggiunto
        });    
    });

$('#submit_aggiungi_da_profilo').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'aggiungi_veicolo', da:'profilo', targa:$('#targa').val(), tipo:$('#tipo').val(), num_posti:$('#num_posti').val(), carburante:$('#carburante').val(), consumo_medio:$('#consumo_medio').val()}, 
            success:smista
        });    
    });

$('.gestisci').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'registrazione', task:'gestisci_profilo'},
            success:smista
        });    
    });

$('.elimina_veicolo').on("click",function(){
    var targa_veicolo=$(this).attr('name');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'elimina_veicolo', targa:targa_veicolo},
            success:smista
        });    
    });
});

function veicolo_aggiunto(data){
    $('#form_veicolo').hide('slow');
    $('#menu_veicoli').html(data).show('slow');
    $('#pagina_parziale').show('slow');
}

function smista(data){
    $('#pagina_parziale').html(data).show('slow');
}