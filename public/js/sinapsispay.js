function create_transaction(id_curso , modalRedirect = null){
    
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


               if(res.status == true){

                if(res.response_webpay.status == true){
                    jQuery('#divbuttonpay').html(
                        '<form action="'+res.response_webpay.response.url+'" method="POST">'+
                        '<input type="hidden" name="token_ws" value="'+res.response_webpay.response.token+'"/>'+
                        '<input class="button-pay" type="submit" value="Pagar desde Chile"/>'+
                        '</form>'
                    );
                }

                if(res.response_paypal.status == true){
                    jQuery('#divbuttonpaypal').html(
                        '<a class="button-pay" type="button" href="'+res.response_paypal.url_redirect+'">Pagar con USD</a>'
                    );
                }
                
                jQuery('#modalpay').modal('show');

               }else{

                    if(res.status == false && res.response_webpay.code == 403){
                        if(modalRedirect == "register" || modalRedirect == null){
                            jQuery('#modalRegister').modal('show');
                        }else if(modalRedirect == "login"){
                            jQuery('#modalLogin').modal('show');
                        }
                        
                    }
                
               }
               
            },
            beforeSend: function (qXHR, settings) {
                if(modalRedirect == 'register' || modalRedirect == null){
                    jQuery('.loading_create_transaction_user_1').fadeIn();
                }else if(modalRedirect == 'login'){
                    jQuery('.loading_create_transaction_user_2').fadeIn();
                }
            },
            complete: function () {
                if(modalRedirect == 'register' || modalRedirect == null){
                    jQuery('.loading_create_transaction_user_1').fadeOut();
                }else if(modalRedirect == 'login'){
                    jQuery('.loading_create_transaction_user_2').fadeOut()
                }
            },
        })

}
