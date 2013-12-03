$(document).ready(function(){
    $('.riepilogo_viaggio').on("click",function(){
    var viaggio=$(this).attr('value');
    $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'riepilogo_viaggio', num_viaggio:viaggio},
            success:smista
        
        });
    });
    
   
$('#submit_ricerca').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'invio_ricerca', citta_partenza:$('#citta_partenza').val(), citta_arrivo:$('#citta_arrivo').val(), data_partenza:$('#data_partenza').val()},
            success:smista
        });    
    });


    

$('#cerca').on("click",function(){
    $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'cerca'},
            success:smista
        
        });
    });

$('#offri').on("click",function(){
    $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'inserimento', dati:'false'},
            success:smista
        
        });
    });

$('#submit_offri').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'inserisci', citta_partenza:$('#citta_partenza').val(), citta_arrivo:$('#citta_arrivo').val(), data_partenza:$('#data_partenza').val(), note:$('#note').val(), targa:$('#targa').val()},
            success:smista
        });    
    });

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
    
$('#submit_veicolo_da_inserisci').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'inserimento_veicolo',  da:'inserisci' },
            success:aggiungi_veicolo
        });    
    });

$('#submit_veicolo_da_profilo').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'inserimento_veicolo',  da:'profilo'},
            success:smista
        });    
    });
    
$('#visualizza').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'registrazione', task:'visualizza_profilo'},
            success:smista
        });    
    });
    
$('#gestisci').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'registrazione', task:'gestisci_profilo'},
            success:smista
        });    
    });
    
$('#gestisci_viaggi_personali').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'registrazione', task:'gestisci_viaggi', citta_partenza:$('#citta_partenza').val(), citta_arrivo:$('#citta_arrivo').val(), data_partenza:$('#data_partenza').val()},
            success:smista
        });    
    });
    
$('#partecipa').on("click",function(){
    var viaggio=$(this).attr('name');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'partecipa_viaggio', num_viaggio:viaggio},
            success:smista
        });    
    });
    
$('#cancellami').on("click",function(){
    var viaggio=$(this).attr('name1');
    var username=$(this).attr('name2');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'cancella_passeggero', num_viaggio:viaggio, username_passeggero:username},
            success:smista
        });    
    });
    
$('#feedback').on("click",function(){
    var viaggio=$(this).attr('name');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'inserisci_feedback', num_viaggio:viaggio},
            success:smista
        });    
    });
    
$('#valuta').on("click",function(){
    var viaggio=$(this).attr('name');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'conferma_valutazione', num_viaggio:viaggio, valutazione:$('.valutazione').val(), commento:$('.commento').val()},
            success:smista
        });    
    });

$('.visualizza_utente').on("click",function(){
    var username_passeggero=$(this).attr('value');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'registrazione', task:'visualizza_utente', username:username_passeggero},
            success:smista
        });    
    });


$('.feedback_passeggero').on("click",function(){
    var username=$(this).attr('name1');
    var viaggio=$(this).attr('name2');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'inserisci_feedback',username_passeggero:username, num_viaggio:viaggio},
            success:smista
        });    
    });

$('.valuta_pass').on("click",function(){
    var username=$(this).attr('name1');
    var viaggio=$(this).attr('name2');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'verifica_valutazione_guidatore',username_passeggero:username, num_viaggio:viaggio, valutazione:$('.valutazione').val(), commento:$('.commento').val()},
            success:smista
        });    
    });

$('.elimina_passeggero').on("click",function(){
    var username=$(this).attr('name1');
    var viaggio=$(this).attr('name2');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'cancella_passeggero', username_passeggero:username, num_viaggio:viaggio},
            success:smista
        });    
    });
    
$('.elimina_viaggio').on("click",function(){
    var viaggio=$(this).attr('name');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'elimina_viaggio', num_viaggio:viaggio},
            success:smista
        });    
    });
}); 



function smista(data){
    $('#pagina_parziale').html(data).show('slow');
}

function aggiungi_veicolo(data){
    $('#pagina_parziale').hide('slow');
    $('#form_veicolo').html(data).show('slow');
}

function veicolo_aggiunto(data){
    $('#form_veicolo').hide('slow');
    $('#menu_veicoli').html(data).show('slow');
    $('#pagina_parziale').show('slow');
}