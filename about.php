<?php
session_start();
require_once 'class.user.php';


require_once("configure.php");;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php if($_SESSION['Nom'] !="") {?>
<meta http-equiv="refresh" content="1000;url=deconnexion.php" >
    <?php }?>
<title>A propos</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Bluesky template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/about.css">
<link rel="stylesheet" type="text/css" href="styles/about_responsive.css">
    
    <link rel="stylesheet" href="src/simple-modal.min.css" />
<link rel="stylesheet" href="src/simple-modal-default.min.css" />
    
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    
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
    .carousel-inner img {
    width: 100%;
    height: 100%;
  }
    
    </style>
</head>
<body>

<div class="super_container">
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
								<li><a href="index.php">Accueil</a></li>
								<li class="active"><a href="about.php">A propos </a></li>
								<li ><a href="services.php">Services</a></li>
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

	
	<!-- About -->

	<div class="about">
		<div class="container">
			<div class="row">

				<!-- About Content -->
				<div class="col-lg-12">
					<div class="about_content">
						<div class="section_title">Qui sommes-nous ?</div>
						<div class="about_text">
							<p>Clicampus est une petite Start-up qui a été créée par un jeune entrepreneur dont le principal objectif est d'aider les étudiants à se loger facilement et à moindre coût, en France, en Europe, voire dans le monde entier dans quelques temps. </p>
						</div>
					</div>
				</div>

				
			</div>
            <div class="row">


				<!-- About Image -->
				<div class="col-lg-12">
					<div class="about_content">
						<div class="section_title">Histoire de Clicampus</div>
						<div class="about_text">
							<p>L’idée de création de Clicampus est venue lorsque ce jeune entrepreneur, Mr Traoré, était lui même étudiant et confronté à la difficulté de trouver un logement pour une courte période et un petit budget, tout comme des milliers d’étudiants chaque année. </p>
						</div>
					</div>
				</div>
			</div>
            <div class="row">


				<!-- About Image -->
				<div class="col-lg-12">
					<div class="about_content">
						<div class="section_title">Le concept</div>
                            <div class="about_text">
                                <p>Le concept Clicampus est de centraliser toutes les résidences universitaires publiques et privées sur notre plateforme, en plus des autres professionnels du logement comme les hôtels, auberges de jeunesse, ou encore des étudiants qui souhaitent aider d'autres étudiants en proposant leur propre logement.
                                Les prestataires indiqueront leurs tarifs par nuitée ainsi que les services dont ils disposent dans leurs
                                établissements (salle de sport, machine à laver, salle de jeux etc.), tout comme sur le site des hôtels.
                                Notre plateforme sert à la mise en relation entre les résidences et les étudiants qui cherchent des logements pour de courtes durées. Elle permet ainsi à chaque étudiant de choisir et trouver, en quelques clics, un logement parmi une liste de suggestion qui sera affinée par rapport à ses souhaits : pays, ville, dates, prix, services, emplacement, etc. Les séjours pourront s’étendre d’une nuit à quelques semaines.
                                La plateforme a pour mission de proposer aux étudiants des logement adéquats à petit prix partout en Europe.
                                 </p>
                            </div>
					</div>
				</div>
			</div>
            <div class="row">


				<!-- About Image -->
				<div class="col-lg-12">
					<div class="about_content">
						<div class="section_title">Nouvelle façon de réserver </div>
                            <div class="about_text">
                                <p>À présent les étudiants ont la possibilité de parcourir l’Europe et loger à petit prix dans une résidence universitaire, hôtel ou auberge de jeunesse de leur choix selon la disponibilité et l'emplacement. Peu importe la raison, que ce soit pour un stage, job, concours ou juste pour le tourisme, logez où vous voulez à petit prix dans l’Europe aujourd'hui et peut être dans le monde entier demain.
                                    
                                 </p>
                                <br>
                                
                                    <ul style="margin-left:25px">
                                        <li type="disc" ><p>D’une nuit à quelques semaines</p></li>
                                        <li type="disc"><p>Dans un établissement surveillé et adéquat, à prix étudiant</p></li>
                                    </ul>
                            </div>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<!-- Realtors -->

	<!--div class="realtors">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title">The Realtors</div>
					<div class="section_subtitle">Search your dream home</div>
				</div>
			</div>
			<div class="row realtors_row">
				
				
				<div class="col-lg-3 col-md-6">
					<div class="realtor_outer">
						<div class="realtor">
							<div class="realtor_image"><img src="images/realtor_1.jpg" alt=""></div>
							<div class="realtor_body">
								<div class="realtor_title">Maria Williams</div>
								<div class="realtor_subtitle">Senior Realtor</div>
							</div>
							<div class="realtor_link"><a href="#">+</a></div>
						</div>
						<div class="realtor_link_background_container">
							<div><div class="realtor_link_background"></div></div>
						</div>
					</div>
				</div>

				
				<div class="col-lg-3 col-md-6">
					<div class="realtor_outer">
						<div class="realtor">
							<div class="realtor_image"><img src="images/realtor_2.jpg" alt=""></div>
							<div class="realtor_body">
								<div class="realtor_title">Christian Smith</div>
								<div class="realtor_subtitle">Senior Realtor</div>
							</div>
							<div class="realtor_link"><a href="#">+</a></div>
						</div>
						<div class="realtor_link_background_container">
							<div><div class="realtor_link_background"></div></div>
						</div>
					</div>
				</div>

				
				<div class="col-lg-3 col-md-6">
					<div class="realtor_outer">
						<div class="realtor">
							<div class="realtor_image"><img src="images/realtor_3.jpg" alt=""></div>
							<div class="realtor_body">
								<div class="realtor_title">Steve G. Brown</div>
								<div class="realtor_subtitle">Senior Realtor</div>
							</div>
							<div class="realtor_link"><a href="#">+</a></div>
						</div>
						<div class="realtor_link_background_container">
							<div><div class="realtor_link_background"></div></div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6">
					<div class="realtor_outer">
						<div class="realtor">
							<div class="realtor_image"><img src="images/realtor_4.jpg" alt=""></div>
							<div class="realtor_body">
								<div class="realtor_title">Jessica Walsh</div>
								<div class="realtor_subtitle">Senior Realtor</div>
							</div>
							<div class="realtor_link"><a href="#">+</a></div>
						</div>
						<div class="realtor_link_background_container">
							<div><div class="realtor_link_background"></div></div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div-->

	<!-- Newsletter -->

	
	<!-- Footer -->

	<?php include('footer.php')?>
    
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/about.js"></script>
    <script src="src/simple-modal.min.js"></script>
</body>
</html>