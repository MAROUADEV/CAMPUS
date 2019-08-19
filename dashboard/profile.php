<?php
session_start();
require_once("../configure.php");

require_once '../class.user1.php';

$reg_user = new USER();


if($reg_user->is_logged_in()=="")
{
	// header("refresh:5;accueil.php");
 $reg_user->redirect('connexion.php');
}
$IdUtilisateur=$_SESSION['IdUtilisateur'];
$nom=$_SESSION['Nom'];
$Email=$_SESSION['Email'];
$sql2 = "SELECT * FROM utilisateur WHERE IdUtilisateur =:IdUtilisateur";
	try {
		$stmt = $DB->prepare($sql2);
		$stmt->execute(array(":IdUtilisateur"=>$IdUtilisateur));
		$results = $stmt->fetchAll();
	} catch (Exception $ex) {
	}

$sql3 = "SELECT count(*) as count FROM biens WHERE nom_locataire =:nom";
	try {
		$stmt = $DB->prepare($sql3);
		$stmt->execute(array(":nom"=>$nom));
		$results3 = $stmt->fetchAll();
	} catch (Exception $ex) {
	}
?>
<!DOCTYPE html>
<html>

<head><meta http-equiv="refresh" content="1000;url=../deconnexion.php" >
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Clicampus dashboard</title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <script type="text/javascript">
function myFunction() {
		valide3 = true;
		valide1 = true;
		valide2 = true;
		while(valide3==true){
		if (document.getElementById('nom').value != ""	&& document.getElementById('prenom').value != ""
			&& document.getElementById('pwd').value != "" && document.getElementById('pwd2').value != ""
			&& document.getElementById('nu').value != "" ) {
						if (document.getElementById('nom').value.length < 3	|| document.getElementById('prenom').value.length < 3
								|| document.getElementById('pwd2').value.length < 3 || document.getElementById('pwd').value.length < 3 
								|| document.getElementById('nom').value.length >50	|| document.getElementById('prenom').value.length >50
								|| document.getElementById('pwd2').value.length >50 || document.getElementById('pwd').value.length >50
								|| document.getElementById('nu').value.length < 3 || document.getElementById('nu').value.length >50 ) {
									document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger col-md-12" role="alert" id="msg3" > Vérifiez que le nombre de caractères entre 3 et 50 caractères. </div>';
								valide1=false;
								break;
								
						return false;
							}
							if(document.getElementById('pwd2').value !=document.getElementById('pwd').value){
									
										document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger col-md-12" role="alert" id="msg5" > Attention, le mot de passe de confirmation est différent du mot de passe ! </div>';
								
								valide1=false;
							break;
							return false;
					    }
						}
						else {
					document.getElementById('tag-id').innerHTML = '<div class="alert alert-danger col-md-12" role="alert" id="msg7" > Veuillez remplir les champs vides. </div>';
			
			valide1=false;
			break;a
			return false;
		}
			if (valide1==true) {
			document.getElementById('ins').submit();
							<?php

				if(!empty($_POST)){
					extract($_POST);
					$valid = true;
					$Nom = trim($nom);
					$Prenom = trim($prenom);
                    $date = trim($date);
                    $lieu = trim($lieu);
					$NomUtilisateur = trim($NomUtilisateur);
					$MotDePasse = trim($Password);
                    $fonction = trim($fonction);
                    $adresse = trim($adresse);
                    $siret = trim($siret);
                    $siren = trim($siren);
                    $denomination = trim($denomination);
					 $stmt = $reg_user->runQuery("SELECT * FROM utilisateur WHERE NomUtilisateur=:NomUtilisateur");
					 $stmt->execute(array(":NomUtilisateur"=>$NomUtilisateur));
					 $results2 = $stmt->fetchAll();				 
					 foreach ($results2 as $res2) {
						 if($res2['IdUtilisateur']<> $IdUtilisateur){
						$valid = false;
						$msg = "
					 	<div class='alert alert-info col-md-12'>
					 <strong> Désolé ! </strong> Ce Nom d'Utilisateur existe déjà ,  Vous essayez un autre Nom d'Utilisateur .
					 </div>
					 ";
					 }	
					 }	 
					 if($valid == true)
				 {
				  if($reg_user->updateUser1($IdUtilisateur,$Nom,$Prenom,$date,$lieu,$NomUtilisateur,$MotDePasse,$fonction,$adresse,$denomination,$siren,$siret))
				  {
				   $msg = "
					 <div class='alert alert-success col-md-12'>
					  <strong> Félicitations! </strong> Opération réussie, attendez un moment s'il vous plaît.
					   </div>
					 ";
					 header("refresh:4;http://localhost/clicCampus/dashboard/profile.php");
				  }
				  else
				  {
				   $msg = "
					 <div class='alert alert-info col-md-12'>
					  <strong> Désolé! </strong> La modification de votre compte n'est pas effectué. 
					   </div>
					 ";
				  }  
				 }
				}
				?>
			return false;
		}
}
}
</script>
 <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 3000);
        $('.alert').hide();

    </script> 
    
    <style>

        
        #drop
        {
            font-size: .9rem; 

            padding-right: 1rem;
            padding-left: 1rem;
            
        }
        #drop a
        {
            color: rgba(0, 0, 0, .5);
        }
        #drop > i {
            font-size: .9375rem;
            line-height: 1.5rem;
            min-width: 2.25rem;
            margin-right: 12px;
        }
        #drop i.ni {
            position: relative;
            top: 2px;
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

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.php">
        <img src="./assets/img/logo.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/brand/icons.png">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Salut!</h6>
            </div>
            
            <div class="dropdown-divider"></div>
            <a href="../deconnexion.php" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Déconnexion</span>
            </a>
          </div>
            
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.php">
                <img src="./assets/img/logo.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->

        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="mise-a-jour-biens.php">
              <i class="ni ni-planet text-blue"></i> Mise à jour biens
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="paiement.php">               
                <i class="fas fa-money-bill-alt text-orange"></i> Paiement             
              </a>
              
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">
              <i class="ni ni-single-02 text-yellow"></i> Mon profil
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reservations.php">
              <i class="ni ni-bullet-list-67 text-red"></i> Réservations
            </a>
          </li>
          
        </ul>
        <!-- Divider -->
        
      </div>
    </div>
  </nav>
    
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.php">Profil utilisateur</a>
        <!-- Form -->
        
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="./assets/img/brand/icons.png">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['Nom'];?> </span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Salut!</h6>
              </div>
              
              <div class="dropdown-divider"></div>
              <a href="../deconnexion.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Déconnexion</span>
              </a>
            </div>
          </li>
        </ul>
          
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Salut <?php echo $_SESSION['Nom'];?> </h1>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="assets/img/brand/icons.png" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                        <?php foreach($results3 as $res){?>
                          <span class="heading"><?php echo $res['count']; ?></span>
                          <span class="description">bien</span>
                        <?php } ?>
                    </div>
                    
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Mon compte</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="" class="btn btn-sm btn-primary">Paramétres</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form class="con-form" method="post" action="" id="ins">
                <div id="tag-id"></div>
                        <?php if(isset($msg)) echo $msg;  ?>
                        <?php foreach ($results as $res) { ?>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="nom">Nom</label>
                        <input type="text" id="nom" class="form-control form-control-alternative" placeholder="Nom" name="nom" value="<?php echo $res['Nom'];?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom" class="form-control form-control-alternative" value="<?php echo $res['Prenom'];?>" required placeholder="Prénom">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="date">Date de naissance</label>
                        <input type="date" id="date" class="form-control form-control-alternative"  name="date" value="<?php echo $res['Date_naissance'];?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="lieu">Lieu de naissance</label>
                        <input type="text" id="lieu" name="lieu" class="form-control form-control-alternative" value="<?php echo $res['lieu_naissance'];?>" required placeholder="Lieu de naissance">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="NomUtilisateur">Nom d'utilisateur</label>
                        <input type="text" id="nu" name="NomUtilisateur" class="form-control form-control-alternative" placeholder="First name" value="<?php echo $res['NomUtilisateur'];?>" required>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Mot de passe</label>
                        <input type="password" placeholder="************" id="pwd" name="Password" required="required" class="form-control form-control-alternative"  value="<?php echo $res['MotDePasse'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Confirmation de mot de passe </label>
                        <input type="password" placeholder="************"  id="pwd2" name="PasswordConfirmation" required class="form-control form-control-alternative"  value="<?php echo $res['MotDePasse'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="fonction">Fonction</label>
                        <input type="text" id="fonction" name="fonction" class="form-control form-control-alternative" placeholder="Fonction" value="<?php echo $res['fonction'];?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="adresse">Adresse</label>
                        <input type="text" placeholder="adresse" id="adresse" name="adresse" required="required" class="form-control form-control-alternative"  value="<?php echo $res['adresse'];?>">
                      </div>
                    </div>
                      </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Dénomination social</label>
                        <input type="text" placeholder="Dénomination social"  id="denomination" name="denomination" required class="form-control form-control-alternative"  value="<?php echo $res['denomination_sociale'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="date">Siren</label>
                        <input type="text" id="siren" class="form-control form-control-alternative"  name="siren" value="<?php echo $res['siren'];?>" required placeholder="Siren">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="lieu">Siret</label>
                        <input type="text" id="siret" name="siret" class="form-control form-control-alternative" value="<?php echo $res['siret'];?>" required placeholder="Siret">
                      </div>
                    </div>
                  </div>
                </div>
                  <div class=" text-right">
                    <button class="btn btn btn-info" type="button" id="btn1" name="MyBtn" onclick="myFunction()" > Modifier  </button>
                  </div>
                  <?php }?>
                
              </form>
                
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php include('footer.php')?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.0.0"></script>
</body>

</html>