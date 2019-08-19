<?php
session_start();

require_once("configure.php");

require_once 'class.user.php';
$r=$_GET['r'];
$reg_user = new USER();


if($reg_user->is_logged_in()=="")
{
	// header("refresh:5;accueil.php");
 $reg_user->redirect('login.php?r=etd');
}
$IdUtilisateur=$_SESSION['IdUtilisateur'];
$Email=$_SESSION['Email'];
$sql2 = "SELECT * FROM utilisateur WHERE IdUtilisateur =:IdUtilisateur";
	try {
		$stmt = $DB->prepare($sql2);
		$stmt->execute(array(":IdUtilisateur"=>$IdUtilisateur));
		$results = $stmt->fetchAll();
	} catch (Exception $ex) {
	}
$sqlreserv = "SELECT distinct libelle, code_reservation,Date_debreserv,Date_finreserv,nbr_jours,total FROM `reservations` , utilisateur us WHERE nom_reserveur=:nom";
	try {
		$stmt = $DB->prepare($sqlreserv);
		$stmt->execute(array(":nom"=>$_SESSION['Nom']));
		$resultsReserv = $stmt->fetchAll();
	} catch (Exception $ex) {
	}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php if($_SESSION['Nom'] !="") {?>
<meta http-equiv="refresh" content="1000;url=deconnexion.php" >
    <?php }?>
<title>Clicampus</title>
<meta charset="utf-8">
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
					$NomUtilisateur = trim($NomUtilisateur);
					$MotDePasse = trim($Password);
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
				  if($reg_user->updateUser($IdUtilisateur,$Nom,$Prenom,$date,$NomUtilisateur,$MotDePasse))
				  {
				   $msg = "
					 <div class='alert alert-success col-md-12'>
					  <strong> Félicitations! </strong> Opération réussie, attendez un moment s'il vous plaît.
					   </div>
					 ";
					 header("refresh:4;http://localhost/clicCampus/espace-etudiant.php");
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
    

      
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Bluesky template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
    
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
    
<link rel="stylesheet" href="src/simple-modal.min.css" />
<link rel="stylesheet" href="src/simple-modal-default.min.css" />
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" /><link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap4.min.css" />

    
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
<script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 2500);
    </script>
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#datepicker-13" ).datepicker();
             $( "#datepicker-14" ).datepicker();
             
         });
          
      </script>
    
     <style>
         
         #btn-ins
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
    
     body, html{     
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;  
}

            .tabs {
          left: 50%;
          -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
          position: relative;
          background: white;
          padding: 50px;
          padding-bottom: 80px;
          width: 70%;
          box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
          border-radius: 5px;
          min-width: 240px;
        }

        .tabs input[name="tab-control"] { display: none; }

        .tabs .content section h2, .tabs ul li label {
          font-weight: bold;
          font-size: 18px;
          color: #428BFF;
        }

        .tabs ul {
          list-style-type: none;
          padding-left: 0;
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display: flex;
          -webkit-box-orient: horizontal;
          -webkit-box-direction: normal;
          -webkit-flex-direction: row;
          -ms-flex-direction: row;
          flex-direction: row;
          margin-bottom: 10px;
          -webkit-box-pack: justify;
          -webkit-justify-content: space-between;
          -ms-flex-pack: justify;
          justify-content: space-between;
          -webkit-box-align: end;
          -webkit-align-items: flex-end;
          -ms-flex-align: end;
          align-items: flex-end;
          -webkit-flex-wrap: wrap;
          -ms-flex-wrap: wrap;
          flex-wrap: wrap;
        }

        .tabs ul li {
          box-sizing: border-box;
          -webkit-box-flex: 1;
          -webkit-flex: 1;
          -ms-flex: 1;
          flex: 1;
          padding: 0 4px;
          text-align: center;
        }

        .tabs ul li label {
          -webkit-transition: all 0.3s ease-in-out;
          transition: all 0.3s ease-in-out;
          color: #929daf;
          padding: 5px auto;
          overflow: hidden;
          text-overflow: ellipsis;
          display: block;
          cursor: pointer;
          -webkit-transition: all 0.2s ease-in-out;
          transition: all 0.2s ease-in-out;
          white-space: nowrap;
          -webkit-touch-callout: none;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
        }

        .tabs ul li label br { display: none; }

        .tabs ul li label svg {
          fill: #929daf;
          height: 1.2em;
          vertical-align: bottom;
          margin-right: 0.2em;
          -webkit-transition: all 0.2s ease-in-out;
          transition: all 0.2s ease-in-out;
        }

        .tabs ul li label:hover, .tabs ul li label:focus, .tabs ul li label:active {
          outline: 0;
          color: #bec5cf;
        }

        .tabs ul li label:hover svg, .tabs ul li label:focus svg, .tabs ul li label:active svg { fill: #bec5cf; }

        .tabs .slider {
          position: relative;
          width: 25%;
          -webkit-transition: all 0.33s cubic-bezier(0.38, 0.8, 0.32, 1.07);
          transition: all 0.33s cubic-bezier(0.38, 0.8, 0.32, 1.07);
        }

        .tabs .slider .indicator {
          position: relative;
          width: 50px;
          max-width: 100%;
          margin: 0 auto;
          height: 4px;
          background: #428BFF;
          border-radius: 1px;
        }

        .tabs .content { margin-top: 30px; }

        .tabs .content section {
          display: none;
          -webkit-animation-name: content;
          animation-name: content;
          -webkit-animation-direction: normal;
          animation-direction: normal;
          -webkit-animation-duration: 0.3s;
          animation-duration: 0.3s;
          -webkit-animation-timing-function: ease-in-out;
          animation-timing-function: ease-in-out;
          -webkit-animation-iteration-count: 1;
          animation-iteration-count: 1;
          line-height: 1.4;
        }

        .tabs .content section h2 {
          color: #428BFF;
          display: none;
        }

        .tabs .content section h2::after {
          content: "";
          position: relative;
          display: block;
          width: 30px;
          height: 3px;
          background: #428BFF;
          margin-top: 5px;
          left: 1px;
        }

        .tabs input[name="tab-control"]:nth-of-type(1):checked ~ ul > li:nth-child(1) > label {
          cursor: default;
          color: #428BFF;
        }

        .tabs input[name="tab-control"]:nth-of-type(1):checked ~ ul > li:nth-child(1) > label svg { fill: #428BFF; }
        @media (max-width: 600px) {

        .tabs input[name="tab-control"]:nth-of-type(1):checked ~ ul > li:nth-child(1) > label { background: rgba(0, 0, 0, 0.08); }
        }

        .tabs input[name="tab-control"]:nth-of-type(1):checked ~ .slider {
          -webkit-transform: translateX(0%);
          transform: translateX(0%);
        }

        .tabs input[name="tab-control"]:nth-of-type(1):checked ~ .content > section:nth-child(1) { display: block; }

        .tabs input[name="tab-control"]:nth-of-type(2):checked ~ ul > li:nth-child(2) > label {
          cursor: default;
          color: #428BFF;
        }

        .tabs input[name="tab-control"]:nth-of-type(2):checked ~ ul > li:nth-child(2) > label svg { fill: #428BFF; }
        @media (max-width: 600px) {

        .tabs input[name="tab-control"]:nth-of-type(2):checked ~ ul > li:nth-child(2) > label { background: rgba(0, 0, 0, 0.08); }
        }

        .tabs input[name="tab-control"]:nth-of-type(2):checked ~ .slider {
          -webkit-transform: translateX(100%);
          transform: translateX(100%);
        }

        .tabs input[name="tab-control"]:nth-of-type(2):checked ~ .content > section:nth-child(2) { display: block; }

        .tabs input[name="tab-control"]:nth-of-type(3):checked ~ ul > li:nth-child(3) > label {
          cursor: default;
          color: #428BFF;
        }

        .tabs input[name="tab-control"]:nth-of-type(3):checked ~ ul > li:nth-child(3) > label svg { fill: #428BFF; }
        @media (max-width: 600px) {

        .tabs input[name="tab-control"]:nth-of-type(3):checked ~ ul > li:nth-child(3) > label { background: rgba(0, 0, 0, 0.08); }
        }

        .tabs input[name="tab-control"]:nth-of-type(3):checked ~ .slider {
          -webkit-transform: translateX(200%);
          transform: translateX(200%);
        }

        .tabs input[name="tab-control"]:nth-of-type(3):checked ~ .content > section:nth-child(3) { display: block; }

        .tabs input[name="tab-control"]:nth-of-type(4):checked ~ ul > li:nth-child(4) > label {
          cursor: default;
          color: #428BFF;
        }

        .tabs input[name="tab-control"]:nth-of-type(4):checked ~ ul > li:nth-child(4) > label svg { fill: #428BFF; }
        @media (max-width: 600px) {

        .tabs input[name="tab-control"]:nth-of-type(4):checked ~ ul > li:nth-child(4) > label { background: rgba(0, 0, 0, 0.08); }
        }

        .tabs input[name="tab-control"]:nth-of-type(4):checked ~ .slider {
          -webkit-transform: translateX(300%);
          transform: translateX(300%);
        }

        .tabs input[name="tab-control"]:nth-of-type(4):checked ~ .content > section:nth-child(4) { display: block; }
        @-webkit-keyframes 
        content {  from {
         opacity: 0;
         -webkit-transform: translateY(5%);
         transform: translateY(5%);
        }

        to {
          opacity: 1;
          -webkit-transform: translateY(0%);
          transform: translateY(0%);
        }
        }
        @keyframes 
        content {  from {
         opacity: 0;
         -webkit-transform: translateY(5%);
         transform: translateY(5%);
        }

        to {
          opacity: 1;
          -webkit-transform: translateY(0%);
          transform: translateY(0%);
        }
        }
        @media (max-width: 1000px) {

        .tabs ul li label { white-space: initial; }

        .tabs ul li label br { display: initial; }

        .tabs ul li label svg { height: 1.5em; }
        }
        @media (max-width: 600px) {

        .tabs ul li label {
          padding: 5px;
          border-radius: 5px;
        }

        .tabs ul li label span { display: none; }

        .tabs .slider { display: none; }

        .tabs .content { margin-top: 20px; }

        .tabs .content section h2 { display: block; }
        }
        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            border-spacing: 0;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        table tr {
            border: 1px solid #ddd;
        }

        table th, table td {
            padding: 1em;
            text-align: left;
        }

        table td {
            vertical-align: top;
        }
        tbody tr:nth-child(odd){
          background-color: #4C8BF5;
          color: #fff;
        }

        @media screen and (max-width: 40em) {

            table {
                border: 0;
            }

            table thead {
                display: none;
            }

            table tr,
            table td {
                display: block;
            }

            table tr {
                margin-bottom: 0.5em;
            }

            table td {
                border-bottom: 1px dotted #ccc;
                text-align: right;
            }

            table td:last-child {
                border-bottom: 0;
            }

            table td:before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }
        }
 .carousel-inner img {
    width: 100%;
    height: 100%;
  }
</style>
    
</head>
<body>

<div class="super_container">

			<!-- Header -->

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						<div class="logo">
							<a href="#"><img src="images/logo.png" alt=""></a>
						</div>
						<nav class="main_nav">
							<ul>
								<li class="active"><a href="index.php">Accueil</a></li>
								<li><a href="about.php">A propos </a></li>
								<li><a href="services.php">Services</a></li>
								<li><a href="faq.php">FAQ</a></li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</nav>
                        <?php if(!isset($_SESSION['Nom'])) { ?> 
						      <div class="phone_num ml-auto">
							     <a class="btn" role="button" data-modal="open-modal" style="color: white">Créer un espace </a>
						      </div>
                        <?php } ?> 
                        <?php if(isset($_SESSION['Nom']) ){
                         if($_SESSION['role'] == "etd") {?> 
                               <div class="phone_num ml-auto">
                                   <a class="btn" href="espace-etudiant.php" style="color: white">Mon compte </a>|
                                   <a class="btn" href="deconnexion.php" style="color: white">Déconnexion</a>
                               </div>
                        <?php }
                        else {?>
                         <div class="phone_num ml-auto">
							     <a class="btn" role="button" data-modal="open-modal" style="color: white">Créer un espace </a>
						      </div>
                        <?php }}?>
                        
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<div class="logo menu_logo">
				<a href="#">
					<div class="logo_container d-flex flex-row align-items-start justify-content-start">
						<div class="logo_image"><div><img src="images/logo.png" alt=""></div></div>
					</div>
				</a>
			</div>
			<ul>
                <li class="menu_item"><a href="index.php">Accueil</a></li>
				<li class="menu_item"><a href="about.php">A propos de nous</a></li>
				<li class="menu_item"><a href="services.php">Services</a></li>
				<li class="menu_item"><a href="faq.php">FAQ</a></li>
				<li class="menu_item"><a href="contact.php">Contact</a></li>
			</ul>
		</div>
        <?php if(!isset($_SESSION['Nom']) ) { ?> 
		      <div class="menu_phone"><a class="btn" role="button" data-modal="open-modal" style="color: white">Créer un espace</a></div>
        <?php } ?> 
        <?php if(isset($_SESSION['Nom']) ){
                         if($_SESSION['role'] == "etd") {?> 
                               <div class="phone_num ml-auto">
                                   <a class="btn" href="espace-etudiant.php" style="color: white">Mon compte  </a>|
                                   <a class="btn" href="deconnexion.php" style="color: white">Déconnexion</a>
                               </div>
                        <?php }
                        else {?>
                         <div class="menu_phone"><a class="btn" role="button" data-modal="open-modal" style="color: white">Créer un espace</a></div>
                        <?php }}?>
        
	</div>
    
	               <!-- The Modal -->
                        <div class="modal" data-modal>
                            <div class="modal-content">
                              <button  class="close-icon" data-modal="close-modal">X</button>
                              <div class="modal-header" style="border-bottom:none;">
                                
                              </div>
                              <div class="modal-body">
                                    <center>
                                        <a class="btn" href="register.php?r=etd" role="button" data-modal="open-modal" id="btn-ins" >Etudiant</a>
                                
                                        <a class="btn" href="inscription.php" role="button" data-modal="open-modal"  id="btn-ins">Propriétaire</a>
                                    </center>
                                
                              </div>
                              <div class="modal-footer" style="border-top:none;background:white">
                                
                              </div>
                            </div><!-- .modal-content -->
                          </div>
                        <!-- The Modal -->
	<!-- Home -->

	<div class="home">

        <div id="demo" class="home_slider_containe carousel slide" data-ride="carousel">
          
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/IMG1.jpg" alt="Los Angeles" width="1100" height="500">
              <div class="carousel-caption">

              </div>   
            </div>
            <div class="carousel-item">
              <img src="images/IMG2.jpg" alt="Chicago" width="1100" height="500">
              <div class="carousel-caption">

              </div>   
            </div>
            <div class="carousel-item">
              <img src="images/IMG3.jpg" alt="New York" width="1100" height="500">
              <div class="carousel-caption">

              </div>   
            </div>
              <div class="carousel-item">
              <img src="images/IMG4.jpg" alt="New York" width="1100" height="500">
              <div class="carousel-caption">

              </div>   
            </div>
              <div class="carousel-item">
              <img src="images/IMG5.jpg" alt="New York" width="1100" height="500">
              <div class="carousel-caption">

              </div> 
                  
            </div>
               <div class="carousel-item">
              <img src="images/IMG6.jpg" alt="New York" width="1100" height="500">
              <div class="carousel-caption">

              </div> 
                  
            </div>             

          </div>
 
        </div>
        
        
    </div>

  <div class="recent">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title">Mon espace </div>
				</div>
			</div>
			<div class="row recent_row">
                
                <div class="tabs">
                      <input type="radio" id="tab1" name="tab-control" checked>
                      <input type="radio" id="tab2" name="tab-control">
                      <input type="radio" id="tab3" name="tab-control">
                      <input type="radio" id="tab4" name="tab-control">
                      <ul>
                        <li title="Mon compte">
                          <label for="tab1" role="button">
                              <svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
						</svg><br>
                            <span>Mon compte</span></label>
                        </li>
                        <li title="Réservation">
                          <label for="tab2" role="button">
                              <svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M14.467,1.771H5.533c-0.258,0-0.47,0.211-0.47,0.47v15.516c0,0.414,0.504,0.634,0.802,0.331L10,13.955l4.136,4.133c0.241,0.241,0.802,0.169,0.802-0.331V2.241C14.938,1.982,14.726,1.771,14.467,1.771 M13.997,16.621l-3.665-3.662c-0.186-0.186-0.479-0.186-0.664,0l-3.666,3.662V2.711h7.994V16.621z"></path>
						</svg><br>
                            <span>Mes résérvations</span></label>
                        </li>
                        <li title="Fichiers à ajouter">
                          <label for="tab3" role="button">
                              <svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M10,6.978c-1.666,0-3.022,1.356-3.022,3.022S8.334,13.022,10,13.022s3.022-1.356,3.022-3.022S11.666,6.978,10,6.978M10,12.267c-1.25,0-2.267-1.017-2.267-2.267c0-1.25,1.016-2.267,2.267-2.267c1.251,0,2.267,1.016,2.267,2.267C12.267,11.25,11.251,12.267,10,12.267 M18.391,9.733l-1.624-1.639C14.966,6.279,12.563,5.278,10,5.278S5.034,6.279,3.234,8.094L1.609,9.733c-0.146,0.147-0.146,0.386,0,0.533l1.625,1.639c1.8,1.815,4.203,2.816,6.766,2.816s4.966-1.001,6.767-2.816l1.624-1.639C18.536,10.119,18.536,9.881,18.391,9.733 M16.229,11.373c-1.656,1.672-3.868,2.594-6.229,2.594s-4.573-0.922-6.23-2.594L2.41,10l1.36-1.374C5.427,6.955,7.639,6.033,10,6.033s4.573,0.922,6.229,2.593L17.59,10L16.229,11.373z"></path>
						</svg><br>
                            <span>Fichiers à ajouter obligatoirement</span></label>
                        </li>
                        
                      </ul>
                      <div class="slider">
                        <div class="indicator"></div>
                      </div>
                      <div class="content">
                        <section>
                          <h2>Mon compte</h2>   
                            
                          <form class="con-form" method="post" action="" id="ins">
								
	                           <div id="tag-id"></div>
                                <?php if(isset($msg)) echo $msg;  ?>
							     <?php foreach ($results as $res) { ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" class="form-control" placeholder="Nom" id="nom" name="nom" required="required"
                                                value="<?php echo $res['Nom']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Prénom</label>
									       <input type="text" class="form-control" placeholder="Prénom" id="prenom" name="prenom" required="required"
									value="<?php echo $res['Prenom']; ?>">
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date naissance</label>
                                                    <input type="date" class="form-control"  id="date" value ="<?php echo $res['Date_naissance']; ?>" name="date" required="required">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nom d'utilisateur<span class="text-danger">*</span></label>
									               <input type="text" class="form-control" placeholder="Nom d'utilisateur" id="nu" name="NomUtilisateur" required="required"
									                   value="<?php echo $res['NomUtilisateur']; ?>">
                                                </div>
                                            </div>
                                        </div>
									
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mot de passe<span class="text-danger">*</span></label>
										          <input type="password" class="form-control" placeholder="Mot de passe" id="pwd" name="Password" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirmez le mot de passe<span class="text-danger">*</span></label>
										      <input type="password" class="form-control" placeholder="Confirmez le mot de passe" id="pwd2" name="PasswordConfirmation" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" id="btn1" name="MyBtn" class="btn btn-primary" onclick="myFunction()" > Modifier  </button>

                                    <div class="clearfix"></div>
                                    
                                    <?php
									}
									?>
                                </form>
                                
                          </section>
                        <section>
                          <h2>Réservation</h2>
                            <table id="reserv">
                              <thead >
                                <tr>
                                  <th>Libellé</th>
                                  <th>Date d'arrivée</th>
                                  <th>Date de départ</th>
                                  <th>Nombre de jours</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php foreach($resultsReserv as $reserv){?>
                                    <tr>
                                      <td data-label="Libellé"><?php echo $reserv['libelle'];?> </td>
                                      <td data-label="Date d'arrivée"><?php echo $reserv['Date_debreserv'];?> </td>
                                      <td data-label="Date de départ"><?php echo $reserv['Date_finreserv'];?> </td>
                                      <td data-label="Nombre de jours"><?php echo $reserv['nbr_jours'];?> </td>
                                      <td data-label="Total"><?php echo $reserv['total'];?> </td>
                                    </tr>
                                    <?php } ?>
                              </tbody>
                            </table>
                          </section>
                        <section>
                          <h2>Fichiers à ajouter</h2>
                          
                          <form action="retr.php" method="post" enctype="multipart/form-data" name="form">
                              <?php echo $message;?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Carte étudiant</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Certificat de scolarité</label>
                                                <input type="file" name="image1" class="form-control" >
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Passeport</label>
                                                <input type="file" name="image2" class="form-control">
                                            </div>
                                        </div>
                                        
                                    </div>
                              
                                    <input type="submit" name="uploadfilesub" value="Upload" class="btn btn-primary" />

                                    <div class="clearfix"></div>
                                  
                                </form>
                          </section>
                        

                      </div>
                    </div>

                
            </div>
		</div>
	</div>

	<!-- Footer -->

	<?php include('footer.php'); ?>
    
</div>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>


<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>

<script src="js/custom.js"></script>
<script src="src/simple-modal.min.js"></script>
<script src="js/card.js"></script>
<script type='text/javascript' src='jquery.min.js'></script>
<script type="text/javascript">
	$(document).ready( function () {
		$('.file').submit( function () {
			var formdata = $(this).serialize();
			$.ajax({
			    type: "POST",
			    url: "retr.php?id=<?php echo $IdUtilisateur ?>",
			    data: formdata,
			 });
			return false;
		});
	});
</script>
<script>
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        fixedHeader: true
    } );
} );
</script>     
    

</body>
</html>