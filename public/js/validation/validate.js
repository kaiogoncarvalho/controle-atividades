$(document).ready(function() {
    var myLanguage = {
        badEmail : 'Informe um e-mail válido',
        requiredField : 'Campo Obrigatório',
        lengthTooShortStart : 'O valor do campo deve ser maior que ',
        lengthBadEnd : ' caracteres',
        notConfirmed : 'Confirmação está incorreta'
    };
    $.validate({
        modules : 'security',
        language : myLanguage
    });
})