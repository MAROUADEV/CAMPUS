<?php
session_start();
require_once 'class.user1.php';
$user_login = new USER();
?>


<!DOCTYPE html>

<html lang="en" class="no-js">
<head><meta http-equiv="refresh" content="1000;url=deconnexion.php" >
    
<script type="text/javascript">
function myFunction() {
		valide1 = true;
		valide2 = true;
		if (document.getElementById('email').value != "" && document.getElementById('pwd').value != "") {
		document.getElementById('msg7').style.display  = 'none';
						if ( document.getElementById('email').value.length < 3 || document.getElementById('pwd').value.length < 3 
								|| document.getElementById('email').value.length >50	|| document.getElementById('pwd').value.length >50) {
								document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg3" > Vérifier que le nombre de caractères entre 3 et 50 caractères. </div>';
								
								valide1=false;
			return false;
							}

		}
		else {
									document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg7" > Veuillez remplir les champs vides.</div>';
			
			valide1=false;
// 			return valide1;
			return false;
		}
			
			if (valide1==true) {
			document.getElementById('cnx').submit();
			<?php
                $r = $_GET['r'];
      
				if(!empty($_POST)){
					extract($_POST);
					$Email = (trim($email));
					$MotDePasse = trim($pwd);
                    $link = mysqli_connect("localhost", "root", "", "clic_db2019");

                                    // Check connection
                                    if($link === false){
                                        die("ERROR: Could not connect. " . mysqli_connect_error());
                                    }
                                    
                                    $sqlselect = "SELECT role from utilisateur where Email ='$Email'";
                                    $res = $link -> query($sqlselect);
                                     $row = $res->fetch_row();
                                        
					if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
						if($user_login->login1($Email,$MotDePasse))
							 {
                            
                                        
                                       if($row[0] == "etd")
                                        {
                                            
                                           $user_login->redirect('../clicCampus/espace-etudiant.php?r=etd');
                                            
                                        }
                                        else
                                        {
                                            $user_login->redirect('../clicCampus/dashboard/index.php');
                                        }
                                   
                                
                              }
						
					}else{
						if($user_login->login2($Email,$MotDePasse))
							 {
							          
                                       if($row[0] == "etd")
                                        {
                                            
                                           $user_login->redirect('../clicCampus/espace-etudiant.php?r=etd');
                                            
                                        }
                                        else
                                        {
                                            $user_login->redirect('../clicCampus/dashboard/index.php');
                                        }
                                   
							 }
						
					}
				}	
?>
			return false;
		} else {
			document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger" role="alert" id="msg7" > Connexion impossible. </div>';
			
			return false;
		}
	}
</script>



	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Clicampus </title>
        <link rel="shortcut icon" href="images/a.ico">

   <!-- CSS
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
            <article class="col-xs-12 maincontent">
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Connectez-vous </h3>
							<p class="text-center text-muted">Vous n'avez pas de compte ? Inscrivez-vous <a href="inscription.php">Ici</a> </p>
							<hr>
							<div class="text-center">
                                        <?php if(isset($msg)) echo $msg;  ?>
                                           <?php 
                      if(isset($_GET['cnx']))
                      {
                       ?>
                                <div class='alert alert-info'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Bienvenue !</strong> Si vous avez pas un compte cliquez sur <a href='inscription.php'>inscrire </a> ou vous <a href='connexion.php'>connecter</a> si vous avez un compte. </div>

                                <?php
                      }
                      ?>

                             <?php 
                      if(isset($_GET['inactive']))
                      {

                       ?>
                                <div class='alert alert-info'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Désolé!</strong> Ce compte n'est pas activé Accédez à votre Boîte de réception et activez-le ou <a href='mailconfirmation.php?Email=<?php echo $_SESSION['Email'] ?>&MotDePasse=<?php echo base64_encode($_SESSION['MotDePasse'])?>'> cliquez ici</a> pour renvoyer l'email de confirmation. 
                       </div>
                                <?php
                      }
                      ?>
                            <?php
                            if(isset($_GET['error']))
                      {
                       ?>
                                <div class='alert alert-info '>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Mot de passe incorrect</strong> 
                       </div >
                       <?php
                      }
                      ?>
                            <?php
                            if(isset($_GET['error2']))
                      {
                       ?>
                                <div class='alert alert-danger'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Nom d ' utilisateur inconnu!</strong> 
                       </div >
                       <?php
                      }
                      ?>
                            <?php
                            if(isset($_GET['error3']))
                      {
                       ?>
                                <div class='alert alert-danger'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Ce compte n'existe pas!</strong> Entrez une adresse e-mail différente ou créez un autre compte.
                       </div >
                       <?php
                      }
                      ?>
                                    </div>
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
                                    <b><a href="Mdp-oublie.php">Mot de passe oublié?</a></b>                                
									</div>
                                    
                                    <div class="col-sm-5 text-right">
                                    <button type="submit" class="btn btn-warning" name="btn-login"  id="btn1" onclick="myFunction()"> Se connecter</button>
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
		