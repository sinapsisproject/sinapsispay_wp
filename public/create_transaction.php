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

    $response = RfCoreCurl::curl('/api/pay/create' , 'POST' , $token, $body);


    if($response->status == true){
        wp_send_json(array(
            'status' => true,
            'response' => $response
        ));
    }else{
        wp_send_json(array(
            'status' => false,
            'response' => $response
        ));
    }



    


?>