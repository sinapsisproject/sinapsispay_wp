<?php

    require(dirname(__FILE__) .'/../../../../wp-load.php');

    $id_curso = $_POST["id_curso"];

    $user_id = get_current_user_id();
    $token   = get_user_meta($user_id, 'tokensinapsisplatform', true);

    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $protocolo = 'https://';
    } else {
        $protocolo = 'http://';
    }

    $body = [
        "id_curso" => (int)$id_curso,
        "fecha" => date('Y-m-d H:i:s')
    ];

    $new_order = RfCoreCurl::curl('/api/pay/create_order' , 'POST' , $token, $body);

    if($new_order->status == true){

        $body_pay = [
            "id_curso"  => (int)$id_curso,
            "fecha"     => date('Y-m-d H:i:s'),
            "id_order"  => $new_order->response->id 
        ];

        $response_webpay = RfCoreCurl::curl('/api/pay/create' , 'POST' , $token, $body_pay);
        $response_paypal = RfCoreCurl::curl('/api/pay/create_paypal' , 'POST' , $token, $body_pay);

        if($response_webpay->status == true){
            wp_send_json(array(
                'status' => true,
                'response_webpay' => $response_webpay,
                'response_paypal' => $response_paypal
            ));
        }else{
            wp_send_json(array(
                'status' => false,
                'response_webpay' => $response_webpay,
                'response_paypal' => $response_paypal
            ));
        }

    }else{
        wp_send_json(array(
            'status'    => false,
            'msg'       =>  "Error al crear la orden"
        ));
    }


?>