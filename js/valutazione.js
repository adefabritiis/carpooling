$(document).ready(function(){
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
});

function smista(data){
    $('#pagina_parziale').html(data).show('slow');
}