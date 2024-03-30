function create_transaction(id_curso){

    data = {
        "id_curso" : id_curso
    }

     jQuery.ajax({
            type : "POST",
            data : data,
            url : wp_ajax_sinapsis_pay.ajax_url_create_transaction,
            error: function(response){
                console.log(response);
            },
            success: function(res) {

                console.log(res);

               if(res.status == true){

                jQuery('#divbuttonpay').html(
                    '<form action="'+res.response.response.url+'" method="POST">'+
                    '<input type="hidden" name="token_ws" value="'+res.response.response.token+'"/>'+
                    '<input type="submit" value="Ir a pagar"/>'+
                    '</form>'
                );

                jQuery('#modalpay').modal('show');

               }else{

               }
               
            },
            beforeSend: function (qXHR, settings) {
                jQuery('#loading_create_transaction_user').fadeIn();
            },
            complete: function () {
                jQuery('#loading_create_transaction_user').fadeOut();
            },
        })

}