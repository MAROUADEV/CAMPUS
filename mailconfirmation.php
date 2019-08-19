<?php
session_start();
require_once 'class.user1.php';
$user = new USER();



if(empty($_GET['MotDePasse']) && empty($_GET['Email']))
{
	// header("refresh:5;connexion.php?cnx");
 $user->redirect('connexion.php?cnx');
}

if(isset($_GET['MotDePasse']) && isset($_GET['Email']))
{
 $MotDePasse = base64_decode($_GET['MotDePasse']);
 $email = $_GET['Email'];
 $statusY = "Y";
 $statusN = "N";
 
 $stmt = $user->runQuery("SELECT * FROM utilisateur WHERE email=:email AND MotDePasse=:MotDePasse or NomUtilisateur=:email AND MotDePasse=:MotDePasse LIMIT 1");
 $stmt->execute(array(":email"=>$email,":MotDePasse"=>$MotDePasse));
 $row=$stmt->fetch(PDO::FETCH_ASSOC);
 if($stmt->rowCount() > 0)
 { 
				   $key = base64_encode($row['IdUtilisateur']);
				   
				   $message = "     
					  Bonjour   ,
					  <br /><br />
					  Bienvenue chez Clicampus !<br/>
					  Pour activer votre compte, cliquez sur le lien suivant.<br/>
					  <br /><br />
					  <a href='http://127.0.0.1/clicCampus/verifier.php?IdUtilisateur=".$key."&code=".$row['Code']."'>Cliquez ici pour activer :) </a>
					  <br /><br />
					  Merci,";
					  
				   $subject = "Confirmation d'inscription";
					  
				   $user->send_mail($email,$message,$subject); 
				   $msg = "
					 <div class='alert alert-success'>
					  <button class='close' data-dismiss='alert'>&times;</button>
					  <strong> Félicitations! </strong> Nous avons envoyé un courriel à ".$row['Email'].".
									Cliquez sur le lien de confirmation dans l'email pour activer votre compte. 
					   </div>
					 ";
					 header("refresh:5;connexion.php");
				  }
				  else
				  {
				   echo "Désolé, la requête n'a pas pu être exécutée ...";
				  }  
				 }
?>			
<!DOCTYPE html>

<html lang="en" class="no-js">
<head><meta http-equiv="refresh" content="1000;url=deconnexion.php" >

	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Clicampus </title>
        <link rel="shortcut icon" href="images/a.ico">
   <link rel="stylesheet" href="assets/plugins/css/plugins.css">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="simple-bg-screen" style="background-image:url(http://via.placeholder.com/1920x850);">

      
	<header id="head" class="secondary"></header>
<!-- /container -->
	
    <div class="container">
		<div class="row">
            <article class="col-xs-12 maincontent">
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Connectez-vous </h3>
							<p class="text-center text-muted">Vous n'avez pas de compte ? Inscrivez-vous <a href="inscription.php">Ici</a> </p>
							<hr>
					                   <?php if(isset($msg)) { echo $msg; } ?>

							<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" id="cnx">
                                
                                <div class="col-12 py-3 top-margin">
                                    <label> Adresse Email <span class="text-danger">*</span></label>
									<input type="text" class="form-control" placeholder="Adresse Email" id="email" name="email" required="required">
                                </div>
                                <div class="col-12 py-3">
                                    <label>Mot de passe <span class="text-danger">*</span></label>
									<input type="password" class="form-control" placeholder="Mot de passe" id="pwd" name="pwd" required="required">
                                </div>
								
								<div class="row">
                                    
                                   <div class="col-lg-7">
                                    <b><a href="Mot-de-passe-oublie.php">Mot de passe oublié?</a></b>                                
									</div>
                                    
                                    <div class="col-lg-5 text-right">
                                    <button type="submit" class="btn btn-warning" name="btn-login" onclick="myFunction()"> Se connecter</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				</article>
			<!-- /Article-->

		</div>
	</div>	<!-- /container -->

  	
	<!-- Scripts
			================================================== -->
       	
			<script type="text/javascript" src="assets/plugins/js/jquery.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/viewportchecker.js"></script>
			<script type="text/javascript" src="assets/plugins/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/bootsnav.js"></script>
			<script type="text/javascript" src="assets/plugins/js/select2.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/wysihtml5-0.3.0.js"></script>
			<script type="text/javascript" src="assets/plugins/js/bootstrap-wysihtml5.js"></script>
			<script type="text/javascript" src="assets/plugins/js/datedropper.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/dropzone.js"></script>
			<script type="text/javascript" src="assets/plugins/js/loader.js"></script>
			<script type="text/javascript" src="assets/plugins/js/owl.carousel.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/slick.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/gmap3.min.js"></script>
			<!-- Custom Js -->
			<script src="assets/js/custom.js"></script>


</body>
</html>