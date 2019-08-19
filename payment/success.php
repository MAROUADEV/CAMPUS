<?php
session_start();
$host="localhost";
$username="root";
$password="";
$databasename="clic_db2019";

$connect=mysqli_connect($host,$username,$password);
$db=mysqli_select_db($connect,$databasename);
require('includes/config.php');
require('includes/paypal/adaptive-payments.php');

$paypal = new PayPal($config);

$property = $_GET['property'];
$price = $_GET['price'];
$id = $_GET['id'];
//$pa1 = $_GET['paypal'];
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
    'actionType'  => 'Pay',
    'payKey'  => $_SESSION['payKey'],
  ), "PaymentDetails"
);

if ($result['responseEnvelope']['ack'] == "Success" && $result['status'] == "COMPLETED") {

  //print '<pre>';
  //print_r($result);
    $id_trans = $result['paymentInfoList']['paymentInfo'][0]['transactionId'];
    //echo $id_trans;
    $cur = $result['currencyCode'];
    $item_na = $result['memo'];
    $a = $result['paymentInfoList']['paymentInfo'][0]['receiver']['amount'];
    $b = $result['paymentInfoList']['paymentInfo'][1]['receiver']['amount'];
    $price = $a + $b;
    $code=(uniqid(rand()));
    
    $sql1 = "insert into payment_transaction values('','$id_trans','$price','$cur','$item_na')";
     mysqli_query($connect,$sql1);
    
    $sql2 = "INSERT INTO reservations (code_reservation,nom_reserveur, libelle,Date_debreserv, Date_finreserv,nbr_jours,prix,total,reserved,email_reserveur,id_bien,proprietaire,created_date) VALUES ('$code','$nom','$property', '$deb', '$fin','$nbrj','$prix_nuit','$price',1,'$email','$id','$prop',Now())";
    mysqli_query($connect,$sql2);
    
    $sql3 = "update utilisateur set id_payment ='".$id_trans."' where IdUtilisateur='".$user."' ";
     mysqli_query($connect,$sql3);

 $msg =  '<div class="col-sm-12 col-md-12">
            <div class="alert alert-success">
                
               <center><i class="fa fa-check-circle-o" aria-hidden="true"></i></center><br>
                <p style="text-align:center;color:#3c763d;">
                    Paiement avec succées</p>
                    <p style="text-align:center;color:#3c763d;">
                    Réservation compléte</p>
            </div>
        </div>';
    
    header("refresh:2;../index.php");

} 
else {
  $msg =  '<div class="col-sm-6 col-md-6">
            <div class="alert alert-danger">
                
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                <p>
                    Echec de paiement</p>
            </div>
        </div>';
    
header("refresh:3;../index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Thank you for your payment</title>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Bluesky template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="../styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="../styles/properties.css">
<link rel="stylesheet" type="text/css" href="../styles/properties_responsive.css">
    
    <style>
         body, html{     
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;  
}
    
    </style>
</head>
<body>

<div class="container">
    <h2></h2>
    <p></p>
    <div class="card text-center">
      <div class="card-header">
        Confirmation de paiement
      </div>
      <div class="card-body">

        <p class="card-text"><?php if(isset($msg)) echo $msg;  ?></p>

      </div>
      <div class="card-footer text-muted">
        
      </div>
</div>

</div>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../js/custom.js"></script>
<script src="../src/simple-modal.min.js"></script>
    <script src="../js/properties.js"></script>
</body>
</html>
