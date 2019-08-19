<?php

session_start();
require('includes/config.php');
require('includes/paypal/adaptive-payments.php');

$paypal = new PayPal($config);
$property = $_GET['property'];
$price = $_GET['price'];
$id = $_GET['id'];
$pa1 = $_GET['paypal'];
$nom = $_GET['nom'];
$email = $_GET['email'];
$deb = $_GET['deb'];
$fin = $_GET['fin'];
$prop = $_GET['prop'];
$nbrj = $_GET['nbrj'];
$prix_nuit = $_GET['prix_nuit'];
$user = $_GET['u'];


$result = $paypal->call(
        array(
    'actionType' => 'PAY',
    'currencyCode' => 'EUR',
    'feesPayer' => 'EACHRECEIVER',
    'memo' => $property,
    'cancelUrl' => 'http://localhost/clicCampus/payment/cancel.php',
    'returnUrl' => 'http://localhost/clicCampus/payment/success.php?id='.$id.'&property='.$property.'&price='.$price.'&nom='.$nom.'&email='.$email.'&deb='.$deb.'&fin='.$fin.'&prop='.$prop.'&nbrj='.$nbrj.'&prix_nuit='.$prix_nuit.'&u='.$user.'',
    'receiverList' => array(
        'receiver' => array(
            array(
                'amount' => ($_GET['price']*2/10),
                'email' => 'marouadev_business@gmail.com',
                'primary' => 'false',
            ),
            array(
                'amount' => ($_GET['price']*8/10),
                'email' => $pa1,
            ),
        ),
    ),
        ), 'Pay'
);

if ($result['responseEnvelope']['ack'] == 'Success') {
    $_SESSION['payKey'] = $result["payKey"];
    $paypal->redirect($result);
} else {
    echo 'Handle the payment creation failure';
}
