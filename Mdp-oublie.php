<?php
session_start();
require_once 'class.user1.php';
$user = new USER();


if($user->is_logged_in()!="")
{
	// header("refresh:5;accuiel.php");
 $user->redirect('../clicCampus/dashboard/dashboard.php');
}


if(isset($_POST['btn-submit']))
{
 $email = $_POST['Email'];
 $NomUtilisateur="";
 $Email2="";
 $stmt = $user->runQuery("SELECT IdUtilisateur,Email,NomUtilisateur FROM utilisateur WHERE Email=:Email or NomUtilisateur=:Email LIMIT 1");
 $stmt->execute(array(":Email"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC); 
 if($stmt->rowCount() == 1)
 {
  $Email2 = ($row['Email']);
  $NomUtilisateur = ($row['NomUtilisateur']);
  $IdUtilisateur = base64_encode($row['IdUtilisateur']);
  $code = md5(uniqid(rand()));
  
  $stmt = $user->runQuery("UPDATE utilisateur SET Code=:Code WHERE Email=:email");
  $stmt->execute(array(":Code"=>$code,"email"=>$Email2));
  
  $message= "
       Bonjour $NomUtilisateur,
       <br /><br />
       Pour réinitialiser votre mot de passe,
       <br /><br />
       Cliquez sur le lien suivant. 
       <br /><br />
       <a href='http://127.0.0.1/clicCampus/reinitialisation-du-mdp.php?IdUtilisateur=$IdUtilisateur&code=$code'>Cliquez ici </a>
       <br /><br />
       Merci :)
       ";
  $subject = "Réinitialiser le mot de passe";
  
  $user->send_mail($Email2,$message,$subject);
  
  $msg = "<div class='alert alert-success'>
     <button class='close' data-dismiss='alert'>&times;</button>
     Nous avons envoyé un e-mail à $Email2.
                    Cliquez sur le lien de réinitialisation du mot de passe dans l'email pour générer un nouveau mot de passe. 
      </div>";
 }
 else
 {
  $msg = "<div class='alert alert-danger'>
     <strong> Désolé! </strong> Ce compte est introuvable. 
       </div>";
 }
}
?>



<!DOCTYPE html>
<html lang="fr">
<head><meta http-equiv="refresh" content="1000;url=deconnexion.php" >

	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Clicampus </title>
        <link rel="shortcut icon" href="images/a.ico">
     <link rel="stylesheet" href="assets/plugins/css/plugins.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        input 
        {
                border-color: #007bff;
        }
        
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

<body class="simple-bg-screen" style="background-image:url(http://via.placeholder.com/1920x850);">
	

	<header id="head" class="secondary"></header>
	


	<!-- container -->
	<div class="container">

        
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				
				<br>
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
						<br>
							<!--<h3 class="thin text-center">Connectez-vous</h3>-->
							<p class="text-center text-muted">Veuillez saisir l'adresse e-mail associée à votre compte . Un code de vérification vous sera adressé. Lorsque vous le recevrez, vous pourrez choisir un nouveau mot de passe</p>
							<hr>
							 <?php
                                   if(isset($msg))
                                   {
                                    echo $msg;
                                   }
                                   else
                                   {	
                                   }
                                   ?>
							<form class="con-form" method="post" action="" id="rec">
								<div class="row top-margin">
								<div class="col-sm-12">
									<label>Email <span class="text-danger">*</span></label>
									<input type="email" class="form-control" placeholder="Nom utilisateur / Email" id="email" name="Email">
								</div></div>
                                <br>
									<div class="row">
									<div class="col-lg-12 text-right">
										<button class="btn btn-primary" type="submit" name="btn-submit">Envoyer</button>
									</div></div>
									
									
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

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