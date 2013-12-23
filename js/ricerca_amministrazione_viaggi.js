$(document).ready(function(){
$('#mostra_avanzata').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            success:mostra_avanzata
        });    
    });

$('#nascondi_avanzata').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            success:nascondi_avanzata
        });    
    });

$('#submit_ricerca_viaggi').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'ricerca_viaggi', ricerca:true, citta_partenza_ricerca:$('#citta_partenza_ricerca').val(), citta_arrivo_ricerca:$('#citta_arrivo_ricerca').val(), data_partenza_ricerca:$('#data_partenza_ricerca').val()},
            success:ricerca_viaggi
        });    
    });

$('.ordina_viaggi').on("click",function(){  
    var ordina=$(this).attr('name');
    $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'amministra_viaggi', ordinamento:ordina},
            success:smista
        });
    });

$('.riepilogo_viaggio').on("click",function(){
    var viaggio=$(this).attr('value');
    var indietro=$(this).attr('name'); //se vero appare il tasto indietro
    $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'riepilogo_viaggio', ricerca:indietro, num_viaggio:viaggio},
            success:smista
        });
    });

});

function smista(data){
    $('#pagina_parziale').html(data).show('slow');
    $('#ricerca_utenti').hide('slow');
    $('#ricerca_viaggi').hide('slow');
    $('.mostra_ricerca').hide('slow');
    $('#mostra_avanzata').hide('slow');
}

function mostra_avanzata(){
    $('#nascondi_avanzata').show('slow');
    $('#mostra_avanzata').hide('slow');
    $('.mostra_ricerca').hide('slow');
}
function nascondi_avanzata(){
    $('#mostra_avanzata').show('slow');
    $('#nascondi_avanzata').hide('slow');
    $('.mostra_ricerca').show('slow');
}

function ricerca_viaggi(data){
    $('#pagina_parziale').hide('slow');
    $('#mostra_avanzata').show();
    $('#nascondi_avanzata').hide();
    $('.mostra_ricerca').show();
    $('#risultati_viaggi').hide('slow');
    $('#risultati_ricerca_viaggi').html(data).show('slow');
}