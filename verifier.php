<?php
session_start();
require_once 'class.user1.php';
$user = new USER();

if(empty($_GET['IdUtilisateur']) && empty($_GET['code']))
{
	// header("refresh:5;connexion.php?cnx");
	$user->redirect('connexion.php?cnx');
}

if(isset($_GET['IdUtilisateur']) && isset($_GET['code']))
{

 $IdUtilisateur = base64_decode($_GET['IdUtilisateur']);
 $code = $_GET['code'];
 
 $statusY = "Y";
 $statusN = "N";
 
 $stmt = $user->runQuery("SELECT * FROM utilisateur WHERE IdUtilisateur=:IdUtilisateur AND Code=:code LIMIT 1");
 $stmt->execute(array(":IdUtilisateur"=>$IdUtilisateur,":code"=>$code));
 $row=$stmt->fetch(PDO::FETCH_ASSOC);
 if($stmt->rowCount() > 0)
 {
						$_SESSION['userSession'] = $row['IdUtilisateur'];
						$_SESSION['IdUtilisateur'] = $row['IdUtilisateur'];
						$_SESSION['Nom'] = $row['Nom'];
						$_SESSION['Prenom'] = $row['Prenom'];
						$_SESSION['Email'] = $row['Email'];
						$_SESSION['NomUtilisateur'] = $row['NomUtilisateur'];
						$_SESSION['MotDePasse'] = $row['MotDePasse'];
  if($row['Status']==$statusN)
  {
   $stmt = $user->runQuery("UPDATE utilisateur SET Status=:status WHERE IdUtilisateur=:IdUtilisateur");
   $stmt->bindparam(":status",$statusY);
   $stmt->bindparam(":IdUtilisateur",$IdUtilisateur);
   $stmt->execute(); 
   
   $msg = "
             <div class='alert alert-success'>
       <button class='close' data-dismiss='alert'>&times;</button>
       <strong> Félicitations  !</strong>  Votre compte est activé attendez un moment s'il vous plaît.</a>
          </div>
          "; 
		  header('refresh:5;../clicCampus/dashboard/index.php');
                                     
                               
			
  }
  else
  {
   $msg = "
             <div class='alert alert-info'>
       <button class='close' data-dismiss='alert'>&times;</button>
       <strong>Désolé !</strong>  Votre compte est déjà activé
          </div>
          ";
  }
 }
 else
 {
  $msg = "
         <div class='alert alert-info'>
      <strong>Désolé !</strong>  Aucun compte trouvé : <a href='inscription.php'>Inscrivez-vous ici</a>
      </div>
      ";
 } 
}

?>
<!DOCTYPE html>

<html lang="en" class="no-js">
<head><meta http-equiv="refresh" content="1000;url=deconnexion.php" >
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Clicampus</title>
     <link rel="stylesheet" href="assets/plugins/css/plugins.css">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="simple-bg-screen" style="background-image:url(http://via.placeholder.com/1920x850);">
    
    <header id="head" class="secondary"></header>
	 <br>
	 <br>
	<!-- container -->
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
                                <div class="col-12 py-3 ">
                                    <label>Mot de passe <span class="text-danger">*</span></label>
									<input type="password" class="form-control" placeholder="Mot de passe" id="pwd" name="pwd" required="required">
                                </div>
								<br>
								<div class="row">
                                    
                                   <div class="col-sm-7">
                                    <b><a href="Mot-de-passe-oublie.php">Mot de passe oublié?</a></b>                                
									</div>
                                    
                                    <div class="col-sm-5 text-right">
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
	</div>

	
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