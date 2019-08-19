<?php 
    session_start();
    
        
    require_once('../class.user1.php');
    require_once('../configure.php');



$reg_user = new USER();


if($reg_user->is_logged_in()=="")
{
	// header("refresh:5;accueil.php");
 $reg_user->redirect('connexion.php');
}
    require_once('../connect.php');
require_once('../db_config.php');
    $nom = $_SESSION['Nom'];
$id = $_SESSION['IdUtilisateur'];
    
     

    if(isset($_POST['ajouter'])) {
                                        $email= $_POST['email'];
                                        
                                        
                                        $sql = "update `utilisateur` set paypal='$email' where IdUtilisateur='$id' and role = 'pro'";
                                        
                                        $qry = mysqli_query($conn,  $sql);

                                        if( $qry) { 
                                            
                                            $message="<div class='alert alert-success col-md-12'>
                                              <strong> Félicitations! </strong> Opération réussie...
                                               </div>";
                                        }
                                        else
                                        {
                                            $message="<div class='alert alert-warning col-md-12'>
                                              <strong> Echec! </strong> d'enregistrement...
                                               </div>";
                                        }

                            }
?>
<!DOCTYPE html>
<html>

<head><meta http-equiv="refresh" content="1000;url=../deconnexion.php" >
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Clicampus Dashboard</title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 3000);
        $('.alert').hide();

    </script> 
    <style>
        
        .btn1{
                font-size: 1rem;
    font-weight: 600;
    line-height: 1.5;
    display: inline-block;
    padding: 0.425rem 0.4rem;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
    border: 1px solid transparent;
    border-radius: .375rem;cursor: pointer;
        }
        
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
        table {
          border: 1px solid #ccc;
          border-collapse: collapse;
          margin: 0;
          padding: 0;
          width: 100%;
          margin-top:150px;
        }

        table caption {
          font-size: 1.5em;
          margin: .25em 0 .75em;
        }

        table tr {
          background: #f8f8f8;
          border: 1px solid #ddd;
          padding: .35em;
        }

        table th, table td {
          padding: .625em;
          text-align: center;
        }

        table th {
          font-size: .85em;
          letter-spacing: .1em;
          text-transform: uppercase;
        }

        table td img { text-align: center; }
        @media screen and (max-width: 600px) {

        table { border: 0; }

        table caption { font-size: 1.3em; }

        table thead { display: none; }

        table tr {
          border-bottom: 3px solid #ddd;
          display: block;
          margin-bottom: .625em;
        }

        table td {
          border-bottom: 1px solid #ddd;
          display: block;
          font-size: .8em;
          text-align: center;
        }

        table td:before {
          content: attr(data-label);
          float: left;
          font-weight: bold;
          text-transform: uppercase;
        }

        table td:last-child { border-bottom: 0; }
        }
        
        @media screen and (max-width: 768px) {

        table { border: 0; }

        table caption { font-size: 1.3em; }

        table thead { display: none; }

        table tr {
          border-bottom: 3px solid #ddd;
          display: block;
          margin-bottom: .625em;
        }

        table td {
          border-bottom: 1px solid #ddd;
          display: block;
          font-size: .8em;
          text-align: center;
        }

        table td:before {
          content: attr(data-label);
          float: left;
          font-weight: bold;
          text-transform: uppercase;
        }

        table td:last-child { border-bottom: 0; }
        }
        /* Style the input container */
.input-container {
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

/* Style the form icons */
.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

/* Style the input fields */
.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php">Dashboard</a>
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
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
         
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card bg-gradient-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Ajouter votre compte paypal</h3>
                </div>
                
              </div>
            </div>
              <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data" name="form">
                              <?php if(isset($message)) echo $message;  ?>
                                    <div class="row">
                                        <?php 

                   
                                                 $connection = @new mysqli("localhost", "root", "", "clic_db2019");

                                                  if (mysqli_connect_errno()) {
                                                      printf("Connect failed: %s\n", mysqli_connect_error());
                                                      exit();
                                                  }
                                                
                                                
                                 $sql = "SELECT paypal FROM utilisateur where Nom ='".$_SESSION['Nom']."'  "; 

                                                  $result=mysqli_query($connection,$sql) or die("Error: ".mysqli_error()."<br />Query: ".$sql);

                                                  while ($row = mysqli_fetch_assoc($result)) {

                                                      $email_paypal = $row['paypal'];
                                                      
                                                    
                                                  }
                                                
                                                
                                                
                                                ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Entrez votre adresse email paypal(compte business)</label><br>
                                                <input type="email" name="email" class="selectpicker form-control" required value="<?php echo $email_paypal;?>">
                                                
                                            </div>
                                           
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <input type="submit" name="ajouter" value="Ajouter" class="btn btn-info"/>
                                        
                                    </div>
                              
                                    

                                    <div class="clearfix"></div>
                                  
                                </form>
               
            
              </div></div></div><br><br>
        
      </div>
      <!-- Footer -->
      <?php include('footer.php');?>
    </div>
      
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  
	<!-- datatables js -->
	<!-- datatables js -->
	<script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
    
	<!-- include custom index.js -->
	<script type="text/javascript" src="custom/js/index.js"></script>
    
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.0.0"></script>
    
</body>

</html>
