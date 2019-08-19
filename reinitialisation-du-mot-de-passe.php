
<?php
session_start();
require_once 'class.user.php';
$user = new USER();

if(empty($_GET['IdUtilisateur']) && empty($_GET['code']))
{
	// header("refresh:5;connexion.php?cnx");
 $user->redirect('login.php?cnx');
}

if(isset($_GET['IdUtilisateur']) && isset($_GET['code']))
{
 $IdUtilisateur = base64_decode($_GET['IdUtilisateur']);
 $code = $_GET['code'];
 
 $stmt = $user->runQuery("SELECT * FROM utilisateur WHERE IdUtilisateur=:IdUtilisateur AND Code=:token");
 $stmt->execute(array(":IdUtilisateur"=>$IdUtilisateur,":token"=>$code));
 $rows = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if($stmt->rowCount() == 1)
 {
  if(isset($_POST['btn-reset-pass']))
  {
   $pass = $_POST['mdp'];
   $cpass = $_POST['mdp2'];
   
   if($cpass!==$pass)
   {
    $msg = '<div class="alert alert-danger" role="alert" id="msg5" >Attention, le mot de passe de confirmation est différent du mot de passe !</div>';
   }
   else
   {
    $stmt = $user->runQuery("UPDATE utilisateur SET MotDePasse=:upass WHERE IdUtilisateur=:IdUtilisateur");
    $stmt->execute(array(":upass"=>$cpass,":IdUtilisateur"=>$rows['IdUtilisateur']));
    
    $msg = "<div class='alert alert-success'>
      Votre mot de passe a été changé avec succès .
      </div>";
    header("refresh:5;login.php?r=etd");
   }
  } 
 }
 else
 {
  exit;
 }
 
 
}

?>



<!DOCTYPE html>
<html lang="fr">
<head><meta http-equiv="refresh" content="1000;url=deconnexion.php" >

<script type="text/javascript">
function myFunction() {
		valide1 = true;
		valide2 = true;
		if (document.getElementById('mdp2').value != "" && document.getElementById('mdp').value != "") {
		
						if ( document.getElementById('mdp2').value.length < 3 || document.getElementById('mdp').value.length < 3 
								|| document.getElementById('mdp2').value.length >50	|| document.getElementById('mdp').value.length >50) {
								alert("Vérifier que le nombre de caractères entre 3 et 25 caractères.");
								valide1=false;
// 								return valide1;
							}	
		}
		else {
			alert("Veuillez remplir les champs vide.");
			valide1=false;
// 			return valide1;
		}
			
			if (valide1==true) {
			alert("Les champs saisir est valide.");
			return true;
		} else {
			alert("Les champs saisir n'est pas valide.");
			return true;
		}
	}
</script>


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
	 <br>
	 <br>
	<!-- container -->
	<div class="container">
		<div class="row">
            <article class="col-xs-12 maincontent">
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<p class="text-center text-muted">Pour terminer la ré-initialisation de votre mot de passe, veuillez saisir <b>un nouveau mot de passe</b>.</p>
							<hr>
							<?php if(isset($msg)) { echo $msg; } ?>
							<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" id="cnx">
                                
                                <div class="col-12 py-3 top-margin">
                                    <label>Mot de passe <span class="text-danger">*</span></label>
									<input type="password" class="form-control" placeholder="Mot de passe" id="mdp" name="mdp">
                                </div>
                                <div class="col-12 py-3 ">
                                    <label>Confirmation de mot de passe<span class="text-danger">*</span></label>
									<input type= "password" class="form-control" placeholder="Confirmation de mot de passe" id="mdp2" name="mdp2">
                                </div>
								<br>
								<div class="row">
                                    
                                    <div class="col-sm-5 text-right">
                                    <button class="btn btn-info" type="submit" name="btn-reset-pass">Terminer</button>
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