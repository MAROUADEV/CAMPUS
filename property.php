<?php
session_start();
require_once 'class.user.php';


require_once("configure.php");;
$ville=$_GET['ville'];
$sqlbiens = "SELECT * FROM `biens` where ville =:ville";
	try {
		$stmt = $DB->prepare($sqlbiens);
        $stmt->bindparam(":ville",$ville);
		$stmt->execute();
        $count1 = $stmt->rowCount();
		$results3 = $stmt->fetchAll();
                
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}
$sqlcount = "SELECT COUNT(*) as count FROM `biens` where ville =:ville";
	try {
		$stmt = $DB->prepare($sqlcount);
        $stmt->bindparam(":ville",$ville);
		$stmt->execute();
		$results4 = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Bluesky template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/properties.css">
<link rel="stylesheet" type="text/css" href="styles/properties_responsive.css">

    <link rel="stylesheet" href="src/simple-modal.min.css" />
<link rel="stylesheet" href="src/simple-modal-default.min.css" />
        
    
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
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/properties.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content d-flex flex-row align-items-end justify-content-start">
							<div class="home_title">Search results</div>
							<div class="breadcrumbs ml-auto">
								<ul>
									<li><a href="index.htmo">Home</a></li>
									<li>Search Results</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Home Search -->
	<div class="home_search">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_search_container">
						<div class="home_search_content">
							<form action="search.php?search=4d54493" method="post" class="search_form d-flex flex-row align-items-start justfy-content-start">
								<div class="search_form_content d-flex flex-row align-items-start justfy-content-start flex-wrap">
									
									<div >
										
                                        <select class="search_form_select" name="country" id="country"   
                                             data-live-search="true"  >
                                                <option value="" style="text-transform:capitalize;" >Choisissez un pays</option>
                                        </select>
									</div>
                                    <div >
										
                                        <select class="search_form_select" name="city" id="city" standard title="Choisissez une ville" autofocus="autofocus" >
                                        <option value="" name="optcity" id="optcity" style="text-transform:capitalize;" >Choisissez une ville</option>
                                    </select>
									</div>
                                    <div >
                                        <select name="categories" id="categories"   
                                     data-live-search="true" class="search_form_select"  >
                                        <option value="">Propriété</option>
                                    </select>
                                   </div>
                                    <div >
                                       <select name="logement" id="logement"   
                                     data-live-search="true" class="search_form_select" >
                                        <option value="">Type de logement</option>
                                    </select>
                                    </div>
                                    
									
								</div>
								<button type="submit" class="search_form_button ml-auto">Rechercher</button>
							</form>
                            
						</div>
                        
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Properties -->

	<div class="properties">
		<div class="container">
			<div class="row">
				<div class="col">
                    <?php if($count1 ==1) {?>
					<div class="section_title" id="cnt"><?php echo $count1;?> Propriété trouvée</div>
                    <?php } else if($count <= 0){?>
                        <div class="section_title" id="cnt"></div>
                    <?php } else {?>
                    <div class="section_title" id="cnt"><?php echo $count1;?> Propriétés trouvées</div>
                    <?php }?>
				</div>
            </div>
			
				
				<!-- Property -->
                <?php 
                    if($count1 > 0)
                    {?>
                        <div class="row properties_row">
                        <?php
                        foreach($results3 as $res3) {?>
                        <div class="col-xl-4 col-lg-6 property_col">
                        <div class="property">
                            <div class="property_image">
                                <img src="dashboard/uploads/<?php echo $res3['photo'];?>" alt="">
                                <div class="tag_featured property_tag"><a href="#">Featured</a></div>
                            </div>
                            <div class="property_body text-center">
                                <div class="property_location"><?php echo $res3['localisation'];?> </div>
                                <div class="property_title"><a href="property-details.php?property=<?php echo $res3['libelle'];?>"><?php echo $res3['libelle'];?></a></div>
                                <div class="property_price"><?php echo $res3['prix_nuit'];?> £</div>
                            </div>
                            <div class="property_footer d-flex flex-row align-items-center justify-content-start">
                                <div><div class="property_icon"><img src="images/icon_1.png" alt=""></div><span><?php echo $res3['nbr_lits'];?></span></div>
                                <div><div class="property_icon"><img src="images/icon_2.png" alt=""></div><span><?php echo $res3['nbr_chambres'];?></span></div>
                                <div><div class="property_icon"><img src="images/icon_3.png" alt=""></div><span><?php echo $res3['nbr_salles'];?></span></div>
                            </div>
                        </div>
                    </div>
        </div>
                <?php }}
                    else
                    {?>
                        <div class="container">
                        <div class="row">
                            <div class="col">
                                
                                <div class="section_title" id="error">Aucune propriétée trouvée</div>
                                
                            </div>
                        </div></div>
                <?php }?>
			</div>
			
    </div>




	<!-- Footer -->

	<?php include('footer.php'); ?>
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
<script src="js/properties.js"></script>
    <script>
        $(function(){
    
                $('#cnt').toggle(!$('#error').length);
            });
    </script>
</body>
    
</html>