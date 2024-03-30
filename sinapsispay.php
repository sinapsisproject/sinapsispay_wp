<?php

   /*
    Plugin Name: [Sinapsis] sinapsispay
    Plugin URI: https://sinapsis.com
    Description: Plugin para gestionar transacciones y pagos en transbank
    Version: 1.0
    Author: Diego Baeza
    Author URI: https://sisnapsis.com
    License: GPL2
    */


    add_action( 'wp_enqueue_scripts', 'ajax_enqueue_scripts_sinapsispay' );


    function ajax_enqueue_scripts_sinapsispay() {

        wp_enqueue_script(
        'sinapsis-pay-js',
        plugins_url( '/public/js/sinapsispay.js', __FILE__ ), 
        array('jquery'),
        rand(0, 99),
        true
        );

        wp_enqueue_style( 
        'sinapsis-pay-css',
        plugins_url( '/public/css/sinapsispay.css', __FILE__ ),
        array(),
        rand(0, 99)
        );


        wp_localize_script(
            'sinapsis-pay-js',
            'wp_ajax_sinapsis_pay',
            array(
              'ajax_url_create_transaction' => plugins_url( '/public/create_transaction.php' , __FILE__ )
            )
        );

    }


    function shortcode_create_transaction_button($atts){

        $atributos = shortcode_atts(
            array(
                'text_button' => 'Comprar este curso',
                'display_price' => 'no'
            ),
            $atts
        );


        $id_curso = $_GET["curso"];

        $smarty = new Smarty;
        $smarty->setTemplateDir(dirname(__FILE__) . '/public/partials/');
        $smarty->setCompileDir(dirname(__FILE__) .'/public/compile/');

        $token = get_option('tokensinapsisplatform');

        $response_curso = RfCoreCurl::curl('/api/course/get_course_by_id/'.$id_curso , 'GET' , $token, NULL);
        $response_instructor = RfCoreCurl::curl('/api/instructor/'.$response_curso->id_instructor , 'GET' , $token, NULL);

        $text_button = esc_attr($atributos['text_button']);
        $display_price = esc_attr($atributos['display_price']);

        $smarty->assign('text_button' , $text_button);
        $smarty->assign('display_price' , $display_price);
        $smarty->assign('id_curso', $id_curso);
        $smarty->assign('curso', $response_curso);
        $smarty->assign('instructor' , $response_instructor->response);

        return $smarty->fetch('create_transaction_button.tpl');

       
    }

    add_shortcode("shortcodecreatetransactionbutton" , "shortcode_create_transaction_button");





    function shortcode_validate_transaction($atts){

        $token_ws = $_POST["token_ws"];    

        $smarty = new Smarty;
        $smarty->setTemplateDir(dirname(__FILE__) . '/public/partials/');
        $smarty->setCompileDir(dirname(__FILE__) .'/public/compile/');

        $token = get_option('tokensinapsisplatform');

    }

    add_shortcode("shortcodevalidatetransaction" , "shortcode_validate_transaction");


?>