<?php
$msg =  '<div class="col-sm-12 col-md-12">
            <div class="alert alert-danger">
                
                <center><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></center>
                <p style="text-align:center;color:#a94442;">
                    Echec de paiement</p>
            </div>
        </div>';
header("refresh:3;../index.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Annulation de paiement</title>
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
        Annulation de paiement
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