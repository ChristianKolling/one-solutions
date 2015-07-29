$(document).ready(function () {
    $('#email-cadastro').on('blur', function () {
//        $.ajax({
//            url: 'arquivo.html',
//            success: function (data) {
//                $('div').html(data);
//            },
//            beforeSend: function () {
//                $('.loader').css({display: "block"});
//            },
//            complete: function () {
//                $('.loader').css({display: "none"});
//            }
//        });
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/core/verificacoes/verifica-email-usuario',
            data: $(this).serialize(),
            success: function (response) {
                if(response.status == false){
                    $("#email-error-message").css('display','block');
                }else{
                    $("#email-sucess-message").css('display','block');
                }
            }
        });
        return false;
    });
});