$(document).ready(function(){
$('#submit_ricerca').on("click",function(){
        $.ajax({
            url:'index.php',
            dataType:'html',
            type:'GET',
            data:{controller:'ricerca', task:'invio_ricerca', citta_partenza:$('#citta_partenza').val(), citta_arrivo:$('#citta_arrivo').val(), data_partenza:$('#data_partenza').val()},
            success:ricerca_avanzata
        });    
    });
});

function ricerca_avanzata(data){
    $('#ricerca').html(data).show('slow');
}