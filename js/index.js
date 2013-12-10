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

$('#amm_viaggi').on("click",function(){
    $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'amministra_viaggi'},
            success:smista
        });
    });
    
$('#amm_utenti').on("click",function(){
    $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'amministra_utenti', ordinamento:'username'},
            success:amm_utenti
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
    
$('.visualizza').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'registrazione', task:'visualizza_profilo'},
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
    
$('.gestisci_viaggi_personali').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'registrazione', task:'gestisci_viaggi'},
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
    var user=$(this).attr('value');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'registrazione', task:'visualizza_utente', username:user},
            success:amministrazione
        });    
    });

$('#rendi_amministratore').on("click",function(){
    var user=$(this).attr('name');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'registrazione', task:'rendi_amministratore', username:user},
            success:mostra_amministrazione
        });    
    });

$('#rendi_utente').on("click",function(){
    var user=$(this).attr('name');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'registrazione', task:'rendi_utente', username:user},
            success:mostra_amministrazione
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

$('.riepilogo_veicolo').on("click",function(){
    var targa_veicolo=$(this).attr('value');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'riepilogo_veicolo', targa:targa_veicolo},
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

$('#mostra_amministrazione').on("click",function(){
    var user=$(this).attr('name');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'registrazione', task:'verifica_tipo_utente', username:user},
            success:mostra_amministrazione
        });    
    });

$('#nascondi_amministrazione').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            success:nascondi_amministrazione
        });    
    }); 

$('#attiva_account').on("click",function(){
    var user=$(this).attr('name');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'registrazione', task:'attiva_account', username:user},
            success:mostra_amministrazione
        });    
    });

$('#disattiva_account').on("click",function(){
    var user=$(this).attr('name');
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'registrazione', task:'disattiva_account', username:user},
            success:mostra_amministrazione
        });    
    });

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


$('#submit_ricerca_utenti').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'ricerca_utenti', username_ricerca:$('#username_ricerca').val(), cognome_ricerca:$('#cognome_ricerca').val(), citta_residenza_ricerca:$('#citta_residenza_ricerca').val()},
            success:ricerca_utenti
        });    
    });
    
$('.ordina_utenti').on("click",function(){  //DA FARE
    var ordina=$(this).attr('name');
    $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'amministra_utenti', ordinamento:ordina},
            success:smista
        });
    });
    
    
});

function smista(data){
    $('#pagina_parziale').html(data).show('slow');
    $('#ricerca_utenti').hide('slow');
}

function ricerca_utenti(data){
    $('#pagina_parziale').hide('slow');
    $('#ricerca_utenti').show('slow');
    $('#mostra_avanzata').show();
    $('#nascondi_avanzata').hide();
    $('.mostra_ricerca').show();
    $('#risultati_utenti').hide('slow');
    $('#risultati_ricerca_utenti').html(data).show('slow');
}

function amm_utenti(data){
    $('#pagina_parziale').hide('slow');
    $('#ricerca_utenti').html(data).show('slow');
    $('#mostra_avanzata').hide();
    $('#nascondi_avanzata').show();
    $('.mostra_ricerca').hide();
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
function amministrazione(data){
    $('#pagina_parziale').html(data).show('slow');
    $('#amministrazione').hide('slow');
    $('#mostra_amministrazione').show('slow');
    $('#nascondi_amministrazione').hide('slow');
    $('#ricerca_utenti').hide();
}

function mostra_amministrazione(data){
    $('#amministrazione').html(data).show('slow');
    $('#mostra_amministrazione').hide('slow');
    $('#nascondi_amministrazione').show('slow');
}

function nascondi_amministrazione(){
    $('#amministrazione').hide('slow');
    $('#mostra_amministrazione').show('slow');
    $('#nascondi_amministrazione').hide('slow');
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