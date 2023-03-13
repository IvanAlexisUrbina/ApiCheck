<?php
require_once('../../public/vendor/autoload.php');
include_once '../Models/CheckModel/CheckModel.php';



        Stripe\Stripe::setApiKey('sk_test_51MkBJpLfAH5mOEW7t9uDj5Fdy0RH8PowaeBenpx7CDYgdV2drtTA6ItwOl6Gh6J4jR1KmqFW9Vebkwurpu5ybFjc00N0Mh5qG3'); // Configurar la API key


        $token = \Stripe\Token::create(array(
        "card" => array(
            "number" => "5525583015692320",
            "exp_month" => 5,
            "exp_year" => 2026,
            "cvc" => "723"
        )
        ));

      
        $charge = \Stripe\Charge::create(array(
        "amount" => 100, 
        "currency" => "usd",
        "source" => $token['id']
        ));

        if ($charge['status'] == 'succeeded') {
        echo 'Tarjeta válida, saldo disponible.';
        } else {
        echo 'No se pudo verificar el saldo de la tarjeta.';
        }



?>