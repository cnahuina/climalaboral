<?php

require 'autoload.php';

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;

// Configure client
$config = Configuration::getDefaultConfiguration();
$config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU0Mjc3Nzk3NywiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjY0MTQ4LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0._esst67Cq_PA9_5IBkoOG32msOfUCtRHJkbf0SHA5Lw');
$apiClient = new ApiClient($config);
$messageClient = new MessageApi($apiClient);

$nombres = $_POST['nombres'];
$sms = $_POST['sms'];
$promoCode = '3423AAA';
$mensaje = 'Hola '.$nombres.', '.$promoCode.' Es tu PromoCode puedes canjearlo hasta el 31/12/2018';


// Sending a SMS Message
$sendMessageRequest1 = new SendMessageRequest([
    'phoneNumber' => $sms,
    'message' => $mensaje,
    'deviceId' => 105380	
]);

$sendMessages = $messageClient->sendMessages([
    $sendMessageRequest1
]);



$result = $sendMessages;

require 'ingresa_datos.php';
?>