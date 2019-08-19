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
<title>FAQ</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Bluesky template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/rangeslider.js-2.3.0/rangeslider.css">
<link rel="stylesheet" type="text/css" href="styles/news.css">
<link rel="stylesheet" type="text/css" href="styles/news_responsive.css">
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
    
    
    .accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
        border-style: none;
}
.accordion:after {
  content: '\002B';
  color: #fff;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.ac:after {
  content: "\2212";
}
.ac, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
    
     .carousel-inner img {
    width: 100%;
    height: 100%;
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
								<li><a href="about.php">A propos </a></li>
								<li ><a href="services.php">Services</a></li>
								<li class="active"><a href="faq.php">FAQ</a></li>
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

	<!-- Home Search -->
	
	<!-- News -->

	<div class="news">
		<div class="container">
			<div class="row">

				<!-- News Posts -->
				<div class="col-lg-8">
					<div class="news_posts">

						<!-- News Post -->
						<div class="news_post">
							<button class="accordion" style="background:linear-gradient(to right, #487fee, #32fa95);color:#fff;">Pour qui ?</button>
                            <div class="panel" style="display:block;">
                                <br>
                              <p>Clicampus est réservé uniquement aux étudiants. Seuls les étudiants ont la possibilité de réserver sur le site.</p><br>
                            </div>

                            <button class="accordion" style="background:linear-gradient(to right, #487fee, #32fa95);color:#fff;">Est-ce qu’un étudiant pourrait réserver un logement et le partager avec un non étudiant ?</button>
                            <div class="panel" style="display:block;">
                                <br>
                              <p>Oui bien sûr. Lorsqu’un étudiant voyage avec un ami ou un membre de sa famille qui n'est pas étudiant, il/elle peut faire la réservation et loger avec la personne qui l'accompagne.</p><br>
                            </div>

                            <button class="accordion" style="background:linear-gradient(to right, #487fee, #32fa95);color:#fff;">De quoi ai-je besoin ?</button>
                            <div class="panel" style="display:block;">
                                <br>
                              <p>Pour pouvoir faire la réservation, vous devez créer un compte utilisateur et avoir en votre possession les documents suivant :
                             </p>
                                <br>
                                <ul style="margin-left:25px">
                                    <li type="disc"><p>Une pièce d'identité ou passeport</p></li>
                                    <li type="disc"><p>Une carte étudiante en cours de validité ou un certificat de scolarité</p></li>
                                    <li type="disc"><p>Un moyen de payement électronique (carte bancaire, PayPal)</p></li>
                                </ul><br>
                            </div>
                            
                            
                            <button class="accordion" style="background:linear-gradient(to right, #487fee, #32fa95);color:#fff;">Justificatif de réservation ?</button>
                            <div class="panel" style="display:block;">
                                <br>
                              <p>Un justificatif de réservation vous est envoyé automatiquement après le paiement de la réservation, soit par mail ou par sms
                             </p><br>
                             </div>
                            
                            <button class="accordion" style="background:linear-gradient(to right, #487fee, #32fa95);color:#fff;">Condition d'annulation et remboursement ?</button>
                            <div class="panel" style="display:block;">
                                <br>
                              <p>S’agissant de prestations de services d’hébergement, et conformément à l’article L 121-21-8-12° du Code de la consommation, vous ne disposez pas du droit de rétractation prévu à l’article L 121-21 du Code de la consommation. 
                                Toutes les annulations doivent parvenir dans un délais de 48 heures avant la date de la prestation. Passé ce délais vous ne pouvez plus faire d'annulation.
                                Si vous procédez à la réservation 48 heures ou moins, avant la prestation, vous ne pourrez pas l’annuler. Pour effectuer des modifications, il vous faudra contacter directement le prestataire en question de votre hébergement choisi.
                                Les frais de services liés à la réservation ne sont pas remboursable.

                             </p><br>
                            </div>
                            
                            <button class="accordion" style="background:linear-gradient(to right, #487fee, #32fa95);color:#fff;">Devise et Tarification ?</button>
                            <div class="panel" style="display:block;">
                                <br>
                              <p>Tous les tarifs sont affichés TTC (Toutes Taxes Comprises) et dans la devise du pays du logement.
                                <strong>Exemple :</strong> Vous habitez en France et votre logement de réservation se trouve en Angleterre, la devise sera affiché en Livre Sterling £.


                             </p><br>
                            </div>
                            
                            <button class="accordion" style="background:linear-gradient(to right, #487fee, #32fa95);color:#fff;">Frais de réservation </button>
                            <div class="panel" style="display:block;">
                                <br>
                              <p>Pour toutes les transactions, une commission de 20 % sera appliquée sur le prix total en TTC. En cas d'annulation et de remboursement, ces frais de service ne sont pas remboursés.
                                </p><br>
                            </div>
						</div>
                        

						<!-- News Post -->
						
					</div>

				</div>
 
			</div>
		</div>
        </div>

	<!-- Newsletter -->

	<!-- Footer -->

	<?php include('footer.php') ;?>  
    </div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/rangeslider.js-2.3.0/rangeslider.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/news.js"></script>
    <script src="src/simple-modal.min.js"></script>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("ac");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
</body>
</html>