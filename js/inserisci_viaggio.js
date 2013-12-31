$(document).ready(function(){
    // Inserisco il calendario di jQuery UI
    $("#data_partenza").datepicker({
        showOn: "button",
        buttonImage: "templates/main/template/img/calendario.gif",
        buttonImageOnly: true,
        minDate: 0,
        changeMonth: true,
        changeYear: true,
        yearRange: "2000:2020",
        dateFormat: "yy/mm/dd",
        defaultDate: "2000/01/01"
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

$('#submit_offri').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'inserisci', citta_partenza:$('#citta_partenza').val(), citta_arrivo:$('#citta_arrivo').val(), data_partenza:$('#data_partenza').val(), costo:$('#costo').val(), note:$('#note').val(), targa:$('.veicoli').val()},
            success:smista
        });    
    });

});

function aggiungi_veicolo(data){
    $('#pagina_parziale').hide('slow');
    $('#form_veicolo').html(data).show('slow');
}

function smista(data){
    $('#pagina_parziale').html(data).show('slow');
    $('#ricerca_utenti').hide();
    $('#ricerca_viaggi').hide('slow');
    $('#form_veicolo').hide();
}