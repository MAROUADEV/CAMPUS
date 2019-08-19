<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();



/*if($reg_user->is_logged_in()!="")
{
	// header("refresh:5;accueil.php");
 $reg_user->redirect('accueil.php');
}*/
?>


<!DOCTYPE html>
<html lang="fr">

<head><meta http-equiv="refresh" content="1000;url=deconnexion.php" >

<script type="text/javascript">
function myFunction() {
		valide3 = true;
		valide1 = true;
		valide2 = true;
		while(valide3==true){
		if (document.getElementById('nom').value != ""	&& document.getElementById('prenom').value != ""
			&& document.getElementById('pwd').value != "" && document.getElementById('pwd2').value != ""
			&& document.getElementById('nu').value != "" && document.getElementById('email').value != "") {
						if (document.getElementById('nom').value.length < 3	|| document.getElementById('prenom').value.length < 3
								|| document.getElementById('pwd2').value.length < 3 || document.getElementById('pwd').value.length < 3 
								|| document.getElementById('nom').value.length >50	|| document.getElementById('prenom').value.length >50
								|| document.getElementById('pwd2').value.length >50 || document.getElementById('pwd').value.length >50
								|| document.getElementById('nu').value.length < 3 || document.getElementById('email').value.length < 3 
								|| document.getElementById('nu').value.length >50	|| document.getElementById('email').value.length >50) {
									document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg3" > Vérifiez que le nombre de caractères entre 3 et 50 caractères. </div>';
								valide1=false;
								break;
								
						return false;
							}
						a = document.getElementById('email').value;
						if(!a.match(/\S+@\S+\.\S+/)){
							valide2 = false;
					    }
					    if( a.indexOf(' ')!=-1 || a.indexOf('..')!=-1){
							valide2 = false;
					    }
							if(valide2==false) {
								valide1=false;
										document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg4" > Veuillez saisir une adresse email valide. </div>';
									
									break;
									return false;
							}
							if(document.getElementById('pwd2').value !=document.getElementById('pwd').value){
									
										document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg5" > Attention, le mot de passe de confirmation est différent du mot de passe ! </div>';
								
								valide1=false;
							break;
							return false;
					    }
						if (document.getElementById('check').checked==false) {
										document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg6" > Cochez la case pour confirmer l\'inscription.</div>';
								
								valide1=false;
							break;
							return false;
									}
						}
						else {
					document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg7" > Veuillez remplir les champs vides. </div>';
			
			valide1=false;
			break;a
			return false;
		}
			if (valide1==true) {
			document.getElementById('ins').submit();
							<?php
                    $r = $_GET['r'];
				if(!empty($_POST)){
					extract($_POST);
					$valid = true;
					$Nom = trim($nom);
					$Prenom = trim($prenom);
					$Email =trim($Email);
					$NomUtilisateur = trim($NomUtilisateur);
                    $role = trim($r);
					$MotDePasse = trim($Password);
					$PasswordConfirmation = trim($PasswordConfirmation);
					$code = (uniqid(rand()));								
					 $stmt = $reg_user->runQuery("SELECT * FROM utilisateur WHERE Email=:Email");
					 $stmt->execute(array(":Email"=>$Email));
					 $row = $stmt->fetch(PDO::FETCH_ASSOC);					 
					 if($stmt->rowCount() > 0)
					 {
						$valid = false;
						$msg = "
						<div class='alert alert-info'>
					 <strong> Désolé ! </strong> Cet Email existe déjà, veuillez créer un compte.
					 </div>
					 ";
					 }
					
					 $stmt = $reg_user->runQuery("SELECT * FROM utilisateur WHERE NomUtilisateur=:NomUtilisateur");
					 $stmt->execute(array(":NomUtilisateur"=>$NomUtilisateur));
					 $row = $stmt->fetch(PDO::FETCH_ASSOC);					 
					 if($stmt->rowCount() > 0)
					 {
						$valid = false;
						$msg = "
					 	<div class='alert alert-info'>
					 <strong> Désolé ! </strong> Ce nom d'utilisateur existe déjà, veuillez créer un compte.
					 </div>
					 ";
					 }		 
					 if($valid == true)
				 {
				  if($reg_user->register($Nom,$Prenom,$Email,$NomUtilisateur,$role,$MotDePasse,$code))
				  {   
				   $IdUtilisateur = $reg_user->lasdID();  
				   $key = base64_encode($IdUtilisateur);
				   $IdUtilisateur = $key;
				   
				   $message = "     
					  Bonjour  $Nom,
					  <br /><br />
					  Bienvenue chez Clicampus !<br/>
					  Pour compléter votre inscription, cliquez sur le lien suivant.<br/>
					  <br /><br />
					  <a href='http://127.0.0.1/clicCampus/verify.php?IdUtilisateur=$IdUtilisateur&code=$code'>Cliquez ici pour activer :)</a>
					  <br /><br />
					  Merci";
					  
				   $subject = "Confirmation de l'inscription";
					  
				   $reg_user->send_mail($Email,$message,$subject); 
				   $msg = "
					 <div class='alert alert-success'>
					  <strong> Félicitations! </strong> Nous avons envoyé un courriel à $Email.
									Cliquez sur le lien de confirmation dans l'email pour activer votre compte. 
					   </div>
					 ";
					 header("refresh:5;index.php");
				  }
				  else
				  {
				   echo " Désolé, la requête n'a pas pu être exécutée ... ";
				  }  
				 }
				}
				?>
			return false;
		}
}
}
</script>


	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Clicampus </title>
        <link rel="shortcut icon" href="images/a.ico">    <link href="css/media_query.css" <!-- CSS
	================================================== -->
	<link rel="stylesheet" href="assets/plugins/css/plugins.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        #btn1
         {
             background: -webkit-linear-gradient(to right, #487fee, #32fa95);
             background: -o-linear-gradient(to right, #487fee, #32fa95);
             background: -moz-linear-gradient(to right, #487fee, #32fa95);
             background: linear-gradient(to right, #487fee, #32fa95);
             border: 1px solid #487fee;
            border-radius: 25px;
             margin: 17px;
             color: white;
             text-align: center;
             width: 150px
         }
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
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Inscrivez-vous</h3>
							<p class="text-center text-muted">Vous avez déjà un compte ? 
                                <a href='login.php?r=etd'>Connectez-vous</a> </p>
							<hr>
                            <?php if(isset($msg)) echo $msg;  ?>
							<form class="con-form" method="post" action="" id="ins">
								<div class="row top-margin">
								<div class="col-sm-6">
									<label>Nom</label>
									<input type="text" class="form-control" placeholder="Nom" id="nom" name="nom" required="required">
								</div>
								<div class="col-sm-6">
									<label>Prénom</label>
									<input type="text" class="form-control" placeholder="Prénom" id="prenom" name="prenom" required="required">
								</div></div>
								<div class="top-margin">
									<label>Nom d'utilisateur<span class="text-danger">*</span></label>
									<input type="text" class="form-control" placeholder="Nom d'utilisateur" id="nu" name="NomUtilisateur" required="required">
								</div>
								<div class="top-margin">
									<label>Adresse Email<span class="text-danger">*</span></label>
									<input type="email" class="form-control" placeholder="Adresse Email" id="email" name="Email" required="required">
								</div>

								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Mot de passe<span class="text-danger">*</span></label>
										<input type="password" class="form-control" placeholder="Mot de passe" id="pwd" name="Password" required="required">
									</div>
									<div class="col-sm-6">
										<label>Confirmation du mot de passe<span class="text-danger">*</span></label>
										<input type="password" class="form-control" placeholder="Confirmez le mot de passe" id="pwd2" name="PasswordConfirmation" required="required">
									</div>
								</div>

								<hr>
                                <div class="top-margin">
									   
				                    <input type="checkbox" id="check" name="check" value="Accepter" required="required">
								    <label for="check">Oui, je souhaite m'inscrire </label>
										     
								</div>
								<div class="row top-margin">
									
									<div class="col-sm-12 text-right">
										<button class="btn btn-success" type="button" id="btn1" name="MyBtn" onclick="myFunction()" >S'inscrire </button>
										
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

	<div id="tag-id"></div>
		

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
	<script>
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>	
</body>
</html>