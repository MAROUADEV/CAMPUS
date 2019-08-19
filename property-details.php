<?php
session_start();
require_once 'class.user.php';


require_once("configure.php");
require_once("connect.php");



$property=$_GET['property'];
$sqlbiens = "SELECT * FROM `biens` where libelle=:property";
	try {
		$stmt = $DB->prepare($sqlbiens);
        $stmt->bindparam(":property",$property);
		$stmt->execute();
		$results3 = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}
function dateDiffInDays($date1, $date2)  
 { 
    // Calulating the difference in timestamps 
    
     $diff = strtotime($date2) - strtotime($date1); 

    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
   
     return abs(round($diff / 86400)); 
 }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php if($_SESSION['Nom'] !="") {?>
<meta http-equiv="refresh" content="1000;url=deconnexion.php" >
    <?php }?>
<title><?php echo $property; ?> - Clicampus</title>
<meta charset="utf-8">
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
 
<link rel="stylesheet" type="text/css" href="plugins/rangeslider.js-2.3.0/rangeslider.css">
<link rel="stylesheet" type="text/css" href="styles/property.css">
<link rel="stylesheet" type="text/css" href="styles/property_responsive.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/fullcalendar.min.js'></script>
<script src='fullcalendar/locale-all.js'></script>

  
        <script>
       window.load=$( document ).ready(function() {
	
	 $.ajax({
                type:'POST',
                url:'pays/ajaxPays.php',
                success:function(html){
                    $('#country').html(html);
                
                                      }
                   }); 
				   
				    });  
					
					
				   $( document ).ready(function() {
					   
					   $('#country').on('change',function(){//change function on country to display all state 
        var libelle_pays = $(this).val();
        if(libelle_pays){
            $.ajax({
                type:'POST',
                url:'pays/ajaxVilles.php',
                data:'libelle_pays='+libelle_pays,
                success:function(html){
                    $('#city').html(html);
                                      }
                   }); 
                      }else{
                           $('#city').html('<option value="">Choisissez le pays </option>');
                           }
    });
	
	});
	 
				   </script>
    
        <script>
       window.load=$( document ).ready(function() {
	
	 $.ajax({
                type:'POST',
                url:'biens/ajaxCategorie.php',
                success:function(html){
                    $('#categories').html(html);
                
                                      }
                   }); 
				   
				    });  
					
					
				   $( document ).ready(function() {
					   
					   $('#categories').on('change',function(){//change function on country to display all state 
        var libelle = $(this).val();
        if(libelle){
            $.ajax({
                type:'POST',
                url:'biens/ajaxSub.php',
                data:'libelle='+libelle,
                success:function(html){
                    $('#logement').html(html);
                                      }
                   }); 
                      }else{
                           $('#logement').html('<option value="">Type de logement </option>');
                           }
    });
	
	});
	 
				   </script>
    
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#datepicker-13" ).datepicker();
             $( "#datepicker-14" ).datepicker();
             
         });
          
      </script>
    
    <script>

  $(document).ready(function() {
    var initialLocaleCode = 'en';

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month'
      },

      locale: 'fr',
      buttonIcons: true, // show the prev/next text

      editable: false,

      events: 'load.php?pr=<?php echo $property;?>',
        eventColor:'#487fee',
        eventTextColor:'white'
    });

    

   
  });

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
         
         body, html{     
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;  
}
         #email
         {
             -webkit-touch-callout: text;
    -webkit-user-select: text;
    -khtml-user-select: text;
    -moz-user-select: text;
    -ms-user-select: text;
    user-select: text;  
         }
         #btn-ins,#btnct
         {
             background: -webkit-linear-gradient(to right, #487fee, #32fa95);
             background: -o-linear-gradient(to right, #487fee, #32fa95);
             background: -moz-linear-gradient(to right, #487fee, #32fa95);
             background: linear-gradient(to right, #487fee, #32fa95);
             
             border-color: linear-gradient(to right, #487fee, #32fa95);
            border-radius: 25px;
             
             color: white;
             text-align: center;
             width: 250px
         }
    @media (min-width: 1281px) {
  
  #calendar{width:350px;
      height:300px;}
  
}

/* 
  ##Device = Laptops, Desktops
  ##Screen = B/w 1025px to 1280px
*/

@media (min-width: 900px) and (max-width: 1440px) {
  
  #calendar{width:350px;
      height:300px;}
  
}

/* 
  ##Device = Tablets, Ipads (portrait)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) {
  
  #calendar{width:350px;
      height:300px;}
  
}

/* 
  ##Device = Tablets, Ipads (landscape)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
  
  #calendar{width:350px;
      height:300px;}
  
}

/* 
  ##Device = Low Resolution Tablets, Mobiles (Landscape)
  ##Screen = B/w 481px to 767px
*/

@media (min-width: 481px) and (max-width: 767px) {
  
  #calendar{width:350px;
      height:300px;}
  
}

/* 
  ##Device = Most of the Smartphones Mobiles (Portrait)
  ##Screen = B/w 320px to 479px
*/

@media (min-width: 320px) and (max-width: 480px) {
  
  #calendar{width:330px;
      height:300px;}
  
}
    .form-control {
    color: black;
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
                                   <a class="btn" href="espace-etudiant.php" style="color: white">Mon compte </a>|
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

	<!-- Intro -->

	<div class="intro">
		<div class="container">
			<div class="row">
                <?php foreach($results3 as $res3){?>
				<div class="col">
					<div class="intro_content d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="intro_title_container">
							<div class="intro_title"><?php echo $property ;?></div>
							<div class="intro_tags">
								<ul>
									<li><a ><?php echo $res3['pays'] ;?></a></li>
									<li><a ><?php echo $res3['ville'] ;?></a></li>
                                    <li><a ><?php echo $res3['categories'] ;?></a></li>
                                    <li><a ><?php echo $res3['subcategories'] ;?></a></li>
								</ul>
							</div>
						</div>
                        
						<div class="intro_price_container ml-lg-auto d-flex flex-column align-items-start justify-content-center">
							<div></div>
                            
							<div class="intro_price" id="prix">
                                
                                    
                                <?php
                           
                                    $prix =$res3['prix_nuit'];
                                    $user = $_SESSION['IdUtilisateur'];
                                 if(isset($_POST['submit']))
                                {

                                    $link = mysqli_connect("localhost", "root", "", "clic_db2019");

                                    // Check connection
                                    if($link === false){
                                        die("ERROR: Could not connect. " . mysqli_connect_error());
                                    }


                                    // Escape user inputs for security

                                    $deb = mysqli_real_escape_string($link, $_REQUEST['deb']);
                                    $fin = mysqli_real_escape_string($link, $_REQUEST['fin']);
                                    $nom = mysqli_real_escape_string($link, $_SESSION['Nom']);
                                    $email = mysqli_real_escape_string($link, $_SESSION['Email']);
                                     $id = $res3['id_bien'];
                                     $prop = $res3['nom_locataire'];
                                     
                                     $pay = $_SESSION['paypal'];
                                     if($fin < $deb)
                                     {
                                         echo $prix.' £/j';
                                         $msg = "<div class='alert alert-danger col-md-12'>
                                      <strong> Echec </strong> Veuillez réessayer la date de fin est inférieure à la date de début .
                                       </div>";
                                     }
                                     else 
                                     {
                                         $sqlselect = "SELECT count(*) from reservations where ((Date_debreserv BETWEEN '$deb'AND '$fin') OR (Date_finreserv BETWEEN '$deb' AND '$fin') OR (Date_debreserv <= '$deb' AND Date_finreserv >= '$fin')) and libelle ='$property'";
                                    $res = $link -> query($sqlselect);
                                     $row = $res->fetch_row();
                                       if($row[0] == 0)
                                       {
                                           
                                           
                                           $dateDiff = dateDiffInDays($deb, $fin); 
                                            $total= $prix * $dateDiff;
                                            $final_total=$total;
                                            if($dateDiff == 1)
                                            {
                                                //echo $final_total .'£/j';
echo '<a style="color:white" href= "payment/start.php?property='.$property.'&price='.$final_total.'&id='.$id.'&paypal='.$pay.'&nom='.$nom.'&email='.$email.'&deb='.$deb.'&fin='.$fin.'&prop='.$prop.'&nbrj='.$dateDiff.'&prix_nuit='.$prix.'&u='.$user.'">' .$final_total.' £/j </a>';
                                            }
                                           else if ($dateDiff == 0)
                                           {
                                               $total1= $prix * 1;
                                               $final_total1=$total1;
                                               echo '<a style="color:white" href= "payment/start.php?property='.$property.'&price='.$final_total1.'&id='.$id.'&paypal='.$pay.'&nom='.$nom.'&email='.$email.'&deb='.$deb.'&fin='.$fin.'&prop='.$prop.'&nbrj=1&prix_nuit='.$prix.'&u='.$user.'">' .$final_total1.' £/j </a>';
                                           }
                                            else
                                            {
                                                //echo $final_total .'£/'.$dateDiff.'j';
echo '<a style="color:white" href= "payment/start.php?property='.$property.'&price='.$final_total.'&id='.$id.'&paypal='.$pay.'&nom='.$nom.'&email='.$email.'&deb='.$deb.'&fin='.$fin.'&prop='.$prop.'&nbrj='.$dateDiff.'&prix_nuit='.$prix.'&u='.$user.'" >'.$final_total.' £/'.$dateDiff.'j </a>';
                                            }
                                            
                                            $msg = "<div class='alert alert-success col-md-12'>
                                      <strong> Disponible </strong> .
                                       </div>";

                                        
                                            
                                       }
                                       else if($row[0] >= 1)
                                       {
                                            $msg = "<div class='alert alert-warning col-md-12'>
                                      <strong> Désolé! </strong> cette période est déjà réservée.
                                       </div>";
                                           echo $prix.' £/j';
                                        
                                       }
                                     }

                                    
                                       

                                }
                                  else if ($_SESSION['Nom'] == "" && $_SESSION['Email'] == "" && $_SESSION['role'] == "")
                                  {
                                      $msg="<div class='alert alert-warning col-md-12'>
                                      <strong> Désolé! </strong> Vous devez se connecter pour effectuer cette opération.
                                       </div>";
                                     echo $prix.' £/j';
                                      header("refresh:3;login.php?r=etd");
                                  }
                                  else
                                  {
                                      echo $prix .' £/j';
                                  }


                          ?>
                                                
                                    
                                </div>
						</div>
                        
					</div>
				</div>
                <?php }?>
			</div>
            
		</div>
        
      <div class="container">
          
                        
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary" id="btnct" onclick="show();">Contactez le propriétaire</button><br><br>
                                <div  id="email" style="display:none">
                                Adresse email : <strong><?php echo $res3['email_proprietaire'];?> </strong>
                            </div>
                            </div>
                            
                        </div>
          <br><br>
          <div class="row">
          <div class="col-md-6">
              <div id="calendar"></div>
          </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <div class="col-md-6">
              
                      <!--hrere code for this form -->   
              <form method="post" action="" class="reserv">
                  
                  <?php if(isset($msg)) echo $msg;  ?>
                  <?php
                  $id = $res3['id_bien'];

                    $sqlpaypal = "SELECT distinct paypal FROM utilisateur , biens  where libelle = :property and id_bien = :id and role = 'pro'";
                    try {
                        $stmt = $DB->prepare($sqlpaypal);
                        $stmt->bindparam(":property",$property);
                        $stmt->bindparam(":id",$id);
                        $stmt->execute();
                        $resultspaypal = $stmt->fetchAll();
                    } catch (Exception $ex) {
                        echo($ex->getMessage());
                    }
                    
                  ?>
                  <?php foreach($resultspaypal as $pa){
                  $_SESSION['paypal'] =   $pa['paypal'];?>
                  
                  <input type="hidden" value ="<?php echo $pa['paypal'];?>" name="paypal"/>
                  <?php }?>
                <input type="date" name="deb" id="deb" class="form-control" required value="<?php echo date('Y-m-d'); ?>" style="color:#929daf"/><br>
                <input type="date" name="fin" id="fin" class="form-control" required value="<?php echo date('Y-m-d'); ?>" style="color:#929daf"/>
                  <br>
                <input type="submit" name="submit" value="Réserver" class="env btn btn-primary"/>
              </form>
          </div>
        </div>
      </div><br><br><br><br>
     <?php foreach ($results3 as $res3){
        if($res3['photo1'] != "" && $res3['photo2'] != "" && $res3['photo3'] != ""){?>
     <div class="intro_slider_container">

			<!-- Intro Slider -->
			<div class="owl-carousel owl-theme intro_slider">
				<!-- Slide -->
				<div class="owl-item"><img src="dashboard/uploads/<?php echo $res3['photo1'] ;?>" alt=""></div>
				<!-- Slide -->
				<div class="owl-item"><img src="dashboard/uploads/<?php echo $res3['photo2'] ;?>" alt=""></div>
				<!-- Slide -->
				<div class="owl-item"><img src="dashboard/uploads/<?php echo $res3['photo3'] ;?>" alt=""></div>
			</div>

			<!-- Intro Slider Nav -->
			<div class="intro_slider_nav_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="intro_slider_nav_content d-flex flex-row align-items-start justify-content-end">
								<div class="intro_slider_nav intro_slider_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
								<div class="intro_slider_nav intro_slider_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <?php }}?>
	

	<!-- Property -->

	<div class="property">
		<div class="container">
			<div class="row">
				
				<!-- Sidebar -->

				<!-- Property Content -->
                <?php foreach($results3 as $res3){?>
				<div class="col-lg-7 offset-lg-1">
					<div class="property_content">
						<div class="property_icons">
							<div class="property_title">Extra Facilities</div>
							<div class="property_text property_text_1">

							</div>
							<div class="property_rooms d-flex flex-sm-row flex-column align-items-start justify-content-start">

								<!-- Property Room Item -->
								<div class="property_room">
									<div class="property_room_title">Chambres</div>
									<div class="property_room_content d-flex flex-row align-items-center justify-content-start">
										<div class="room_icon"><img src="images/room_1.png" alt=""></div>
										<div class="room_num"><?php echo $res3['nbr_chambres'] ;?></div>
									</div>
								</div>

								<!-- Property Room Item -->
								<div class="property_room">
									<div class="property_room_title">Salle de bain</div>
									<div class="property_room_content d-flex flex-row align-items-center justify-content-start">
										<div class="room_icon"><img src="images/room_2.png" alt=""></div>
										<div class="room_num"><?php echo $res3['nbr_salles'] ;?></div>
									</div>
								</div>

								<!-- Property Room Item -->
								<div class="property_room">
									<div class="property_room_title">Lits</div>
									<div class="property_room_content d-flex flex-row align-items-center justify-content-start">
										<div class="room_icon"><img src="images/bed.png" alt=""></div>
										<div class="room_num"><?php echo $res3['nbr_lits'] ;?></div>
									</div>
								</div>


							</div>
						</div>

						<!-- Description -->

						<div class="property_description">
							<div class="property_title">Description</div>
							<div class="property_text property_text_2">
								<p><?php echo $res3['description'] ;?>
                                </p>
                                <p>Capacité d'accueil d'étudiants : &nbsp;&nbsp;&nbsp;<?php echo $res3['capacite'] ;?>
                                </p>
                                <p><?php echo $res3['typechambre'] ;?>
                                </p>
                                <p><?php echo $res3['typelit'] ;?>
                                </p>
							</div>
						</div>

						<!-- Additional Details -->

						<div class="additional_details">
							<div class="property_title">Equipements</div>
							<div class="details_container">
								<p><?php echo $res3['equipement'] ;?></p>
							</div>
						</div>

						<!-- Property On Map -->

						
					</div>
				</div>
                <?php }?>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	

	<!-- Footer -->
    <?php include('footer.php')?>
	
</div>
     

<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/rangeslider.js-2.3.0/rangeslider.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/property.js"></script>
<script>
    function show()
    {
        var email = document.getElementById('email') ;
        if(email.style.display === "none")
            {
                email.style.display = "block";
            }
        else
            {
                email.style.display = "none";
            }
    }
      
</script>
 </body>
</html>
