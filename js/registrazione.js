$(document).ready(function(){        
    // Mostriamo il bottone di jQuery UI
    $("#regbutton").button();        
    // Inserisco il calendario di jQuery UI
    $("#data_nascita").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1935:2005",
        dateFormat: "yyyy/mm/dd",
        defaultDate: "2000/01/01"
    });
    // Controllo sul server se la mail è già utilizzata.
    $('#email').on('focusout', function(){
        $.ajax({
           url:'index.php',
           data: {controller:'registrazione', task:'verifica_email', email:$('#email').val()},
           type: 'GET',
           dataType: 'json',
           success: check_esiste
        });
    return true;
    });
    // Controllo sul server se l'username già esiste
    $('#username').on('focusout', function(){
        $.ajax({
           url:'index.php',
           data: {controller:'registrazione', task:'verifica_username', username:$('#username').val()},
           type: 'GET',
           dataType: 'json',
           success: check_username
        });
    return true;
    });
    // Validazione dei dati client-side
    $("#modulo_reg").validate(
    {   // Regole di validazione
        rules:
        {
            cognome: 
            {   
                required: true,
                maxlength: 20,
                nome:true
            },
            data_nascita:
            {
                required: true,
                date: true
            },
            citta_nascita:
            {
                required: true,
                maxlength: 30
            },
            citta_residenza:
            {
                required: true,
                maxlength: 30
            },
            email:
            {
                required: true,
                email: true,
                maxlength: 30
            },
            num_telefono:
            {
                required: false,
                maxlength: 15
            },
            cod_fiscale:
            {
                required: true,
                maxlength: 16
            },
            username: 
            {   
                    required: true,
                    maxlength: 20,
                    nome:true
            },
            password: 
            {       required: true,
                    password: true,
                    minlength: 4,
                    maxlength: 20
            },
            password_1:
            {
                required: true,
                equalTo: '#password'
            }
        },
        // Messaggi di errore.
        messages:
        {
            cognome: 
            {
                    required: " Inserisci il tuo cognome!",
                    maxlength: " La lunghezza massima è 30",
                    nome: " Il cognome deve contenere solo lettere"
            },
            numero_telefono:
            {
                    required: " Inserisci un numero di telefono valido",
                    maxlength: " La lunghezza massima è 15"
            },
            codice_fiscale:
            {
                    required: " Inserisci un codice fiscale valido",
                    maxlength: " La lunghezza massima è 16"
            },
            email:
            {   
                    required : " Inserisci un indirizzo email valido!",
                    maxlength : " La lunghezza massima è 80",
                    email : " Il formato è 'example@gmail.com'"
            },
            username: 
            {
                    required: " Inserisci il tuo nome!",
                    maxlength: " La lunghezza massima è 30",
                    nome: " Il nome deve contenere solo lettere"
            },
            password: 
            {
                    required: "Inserisci la tua password!",
                    password: "Lunghezza 4-12, almeno un numero"
            },
            conferma: 
            {   
                    required: "La conferma non corrisponde alla scelta della password!",
                    equalTo: "Inserire password uguali"
            },
            data_nascita: "Inserisci una data valida"
        }
        });
});
function check_esiste(data) {

    if(data.unique === 'true'){
        // Mail Libera
        $('#errore_email').hide('normal');
        email_libera=true;
        $('#email').removeClass('error');
    }
    else
    {   // Mail utilizzata
        $('#errore_email').show('normal');
        $('#email').addClass('error');
        email_libera=false;
    }
}        

function check_username(data) {

    if(data.unique === 'true'){
        // Username valido
        $('#errore_username').hide('normal');
        username_valido=true;
        $('#username').removeClass('error');
    }
    else
    {   // Username utilizzato
        $('#errore_username').show('normal');
        $('#username').addClass('error');
        username_valido=false;
    }
}        
