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

    $sql2 = "SELECT * FROM typechambres";
	try {
		$stmt = $DB->prepare($sql2);
		$stmt->execute();
		$resultsCH = $stmt->fetchAll();
	} catch (Exception $ex) {
	}
$sql3 = "SELECT * FROM typelits";
	try {
		$stmt = $DB->prepare($sql3);
		$stmt->execute();
		$resultsLI = $stmt->fetchAll();
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
    <!--link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css"-->
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
       window.load=$( document ).ready(function() {
	
	 $.ajax({
                type:'POST',
                url:'../pays/ajaxPays.php',
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
                url:'../pays/ajaxVilles.php',
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
                url:'../pays/ajaxPays.php',
                success:function(html){
                    $('#editcountry').html(html);
                
                                      }
                   }); 
				   
				    });  
					
					
				   $( document ).ready(function() {
					   
					   $('#editcountry').on('change',function(){//change function on country to display all state 
        var libelle_pays = $(this).val();
        if(libelle_pays){
            $.ajax({
                type:'POST',
                url:'../pays/ajaxVilles.php',
                data:'libelle_pays='+libelle_pays,
                success:function(html){
                    $('#editcity').html(html);
                                      }
                   }); 
                      }else{
                           $('#editcity').html('<option value="">Choisissez le pays </option>');
                           }
    });
	
	});
	 
				   </script>
    <script>
       window.load=$( document ).ready(function() {
	
	 $.ajax({
                type:'POST',
                url:'../biens/ajaxCategories.php',
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
                url:'../biens/ajaxSub.php',
                data:'libelle='+libelle,
                success:function(html){
                    $('#logement').html(html);
                                      }
                   }); 
                      }else{
                           $('#logement').html('<option value="" disabled>Choisissez un logement </option>');
                           }
    });
	
	});
	 
				   </script>
    
    <script>
       window.load=$( document ).ready(function() {
	
	 $.ajax({
                type:'POST',
                url:'../biens/ajaxCategories.php',
                success:function(html){
                    $('#editcategories').html(html);
                
                                      }
                   }); 
				   
				    });  
					
					
				   $( document ).ready(function() {
					   
					   $('#editcategories').on('change',function(){//change function on country to display all state 
        var libelle = $(this).val();
        if(libelle){
            $.ajax({
                type:'POST',
                url:'../biens/ajaxSub.php',
                data:'libelle='+libelle,
                success:function(html){
                    $('#editlogement').html(html);
                                      }
                   }); 
                      }else{
                           $('#editlogement').html('<option value="" disabled>Choisissez un logement </option>');
                           }
    });
	
	});
	 
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
        

         body, html{     
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;  
}
    
    </style>
    <script>
    $(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".statusMsg").alert('close');
    }, 500);
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

                <i class="fas fa-money-bill-alt text-orange"></i>Paiement             
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
            <div class="card-header bg-transparent">
              <div class="row">
                      <div class="col-md-12">
                            

                            <button class="btn btn-success pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
                                	Ajouter
                            </button>
                            <br /> 
                            
                            <br /> <br />
                            <div class="alert alert-info" role="alert">
                                <div class="row vertical-align">
                                  <div class="col-xs-1 text-center">
                                    <i class="fa fa-info fa-2x"></i> 
                                  </div>&nbsp;&nbsp;&nbsp;
                                  <div class="col-xs-11">
                                    <strong>Information:</strong> Si vous voulez modifier les photos de votre bien cliquez <a href="mise-a-jour-photos.php" style="font-weight:bold;font-size:20px;color:#5e72e4">ici</a>
                                  </div>
                                </div>
                          </div>
                            <div class="removeMessages"></div><br /> <br />

                            <table class="table" style="width:100%" id="manageMemberTable">					
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Libelle</th>
                                        <th scope="col">prix nuit</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Options</th>
                                    </tr>
                                </thead>
                            </table>
                      </div></div></div>

                
			

	<!-- add modal -->
	            <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Ajouter un bien</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            
                          </div>

                          <form class="form-horizontal"  method="POST" id="createMemberForm">

                          <div class="modal-body">
                           <p class="statusMsg"></p>
                              
                              <div class="form-group"> <!--/here teh addclass has-error will appear -->
                                <label for="libelle" class="col-sm-6 control-label">Libelle</label>
                                <div class="col-sm-10"> 
                                  <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Libelle" required>
                                <!-- here the text will apper  -->
                                </div>
                              </div>
                              
                              <div class="form-group"> <!--/here teh addclass has-error will appear -->
                                <label for="categories" class="col-sm-6 control-label">Propriété</label>
                                  <div class="col-sm-10">
                                    <select name="categories" id="categories"   
                                     data-live-search="true" class="chosen selectpicker form-control" required>
                                        <option value="">Choisissez un type de propriété</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group"> <!--/here teh addclass has-error will appear -->
                                <label for="logement" class="col-sm-6 control-label">Logement</label>
                                  <div class="col-sm-10">
                                    <select name="logement" id="logement"   
                                     data-live-search="true" class="chosen selectpicker form-control" required>
                                        <option value="">Choisissez un type de logement</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="localisation" class="col-sm-6 control-label">localisation</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="localisation" name="localisation" placeholder="localisation" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="pays" class="col-sm-6 control-label">Pays</label>
                                  <div class="col-sm-10">
                                    <select name="country" id="country"   
                                     data-live-search="true" class="chosen selectpicker form-control" required>
                                        <option value="" style="text-transform:capitalize;">Choisissez un pays</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="pays" class="col-sm-6 control-label">Villes</label>
                                  <div class="col-sm-10">
                                    <select class="selectpicker form-control" name="city" id="city" standard title="Choisissez une ville" autofocus="autofocus" >
                                        <option value="" name="optcity" id="optcity" style="text-transform:capitalize;">Choisissez une ville</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group"> <!--/here teh addclass has-error will appear -->
                                <label for="image1" class="col-sm-6 control-label">Image</label>
                                <div class="col-sm-10"> 
                                  <input type="file" class="form-control" id="img" name="img"  required>
                                <!-- here the text will apper  -->
                                </div>
                              </div>
                              <div class="form-group"> <!--/here teh addclass has-error will appear -->
                                <label for="image1" class="col-sm-6 control-label">Image1</label>
                                <div class="col-sm-10"> 
                                  <input type="file" class="form-control" id="img1" name="img1"  required>
                                <!-- here the text will apper  -->
                                </div>
                              </div>
                              <div class="form-group"> <!--/here teh addclass has-error will appear -->
                                <label for="image1" class="col-sm-6 control-label">Image2</label>
                                <div class="col-sm-10"> 
                                  <input type="file" class="form-control" id="img2" name="img2"  required>
                                <!-- here the text will apper  -->
                                </div>
                              </div>
                              <div class="form-group"> <!--/here teh addclass has-error will appear -->
                                <label for="image1" class="col-sm-6 control-label">Image3</label>
                                <div class="col-sm-10"> 
                                  <input type="file" class="form-control" id="img3" name="img3"  required>
                                <!-- here the text will apper  -->
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="capacite" class="col-sm-6 control-label">Capacité d'accueil</label>
                                <div class="col-sm-10">
                                  <input type="number" min="1" max="1000" class="form-control" id="capacite" name="capacite" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="description" class="col-sm-6 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description" placeholder="description" required></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="typeCh" class="col-sm-6 control-label">Type de chambre</label>
                                  <div class="col-sm-10">
                                    
                                      <select name="typeCh" id="typeCh"   
                                     data-live-search="true" class="chosen selectpicker form-control" required>
                                          <option selected="true" disabled="disabled">Choisissez une chambre</option>
                                        <?php foreach ($resultsCH as $ch){?>
                                           
                                            <option value="<?php echo $ch['libelle_ch'] ;?>" style="text-transform:capitalize;"><?php echo $ch['libelle_ch'] ;?></option>
                                        <?php }?>
                                        </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="nbr_chambres" class="col-sm-6 control-label">Nombre de chambres</label>
                                <div class="col-sm-10">
                                  <input type="number" min="1" max="100" class="form-control" id="nbr_chambres" name="nbr_chambres" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="typeLi" class="col-sm-6 control-label">Type de lits</label>
                                  <div class="col-sm-10">
                                    <select name="typeLi" id="typeLi"   
                                     data-live-search="true" class="chosen selectpicker form-control" required>
                                          <option selected="true" disabled="disabled">Choisissez un lit</option>
                                        <?php foreach ($resultsLI as $li){?>
                                           
                                            <option value="<?php echo $li['libelle_li'] ;?>" style="text-transform:capitalize;"><?php echo $li['libelle_li'] ;?></option>
                                        <?php }?>
                                        </select>
                                  </div>
                              </div>                              
                              
                             <div class="form-group">
                                <label for="nbr_lits" class="col-sm-6 control-label">Nombre de lits</label>
                                <div class="col-sm-10">
                                  <input type="number" min="1" max="100" class="form-control" id="nbr_lits" name="nbr_lits"  required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="nbr_salles" class="col-sm-6 control-label">Nombre de salles de bain</label>
                                <div class="col-sm-10">
                                  <input type="number" min="1" max="10" class="form-control" id="nbr_salles" name="nbr_salles"  required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="prix_nuit" class="col-sm-6 control-label">Prix par nuit</label>
                                <div class="col-sm-10">
                                  <input type="number" min="10" max="10000" class="form-control" id="prix_nuit" name="prix_nuit"  required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="equipement" class="col-sm-6 control-label">Equipement</label>
                                <div class="col-sm-10">
                                    <textarea min="1" max="10" class="form-control" id="equipement" name="equipement"  required></textarea>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary submitBtn">Enregistrer</button>
                          </div>
                          </form> 
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
	<!-- /add modal -->

                <!-- remove modal -->
                <div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
              <div class="modal-dialog" role="document">
              <div class="modal-content">
              <div class="modal-header">
              <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Confirmation de suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              
              </div>
              <div class="modal-body">
              <p>Voulez-vous vraiment supprimer ?</p>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="button" class="btn btn-primary" id="removeBtn">Supprimer</button>
              </div>
              </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- /remove modal -->

                <!-- edit modal -->
                <div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Modifier un bien</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        
                      </div>

                    <form class="form-horizontal" action="php_action/update.php" method="POST" id="updateMemberForm">	      

                      <div class="modal-body">
                        <div class="edit-messages"></div>



                          <div class="form-group"> <!--/here teh addclass has-error will appear -->
                            <label for="editlibelle" class="col-sm-6 control-label">libelle</label>
                            <div class="col-sm-10"> 
                              <input type="text" class="form-control" id="editlibelle" name="editlibelle" placeholder="Raison sociale" required>
                            <!-- here the text will apper  -->
                            </div>
                          </div>
                          <div class="form-group"> <!--/here teh addclass has-error will appear -->
                                <label for="editcategories" class="col-sm-6 control-label">Propriété</label>
                                  <div class="col-sm-10">
                                    <select name="editcategories" id="editcategories"   
                                     data-live-search="true" class="chosen selectpicker form-control" required>
                                        <option value="" disabled>Choisissez un type de propriété</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group"> <!--/here teh addclass has-error will appear -->
                                <label for="editlogement" class="col-sm-6 control-label">Logement</label>
                                  <div class="col-sm-10">
                                    <select name="editlogement" id="editlogement"   
                                     data-live-search="true" class="chosen selectpicker form-control" required>
                                        <option value="" disabled>Choisissez un type de logement</option>
                                    </select>
                                  </div>
                              </div>
                          <div class="form-group">
                            <label for="editlocalisation" class="col-sm-10 control-label">localisation</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="editlocalisation" name="editlocalisation" placeholder="Adresse" required>
                            </div>
                          </div>
                          <div class="form-group">
                                <label for="pays" class="col-sm-6 control-label">Pays</label>
                                  <div class="col-sm-10">
                                    <select name="editcountry" id="editcountry"   
                                     data-live-search="true" class="chosen selectpicker form-control" required >
                                        <option value="" disabled>Choisissez un pays</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="city" class="col-sm-6 control-label">Villes</label>
                                  <div class="col-sm-10">
                                    <select class="selectpicker form-control" name="editcity" id="editcity" standard title="Choisissez une ville" autofocus="autofocus" >
                                        <option value="" name="optcity" id="optcity" disabled>Choisissez une ville</option>
                                    </select>
                                  </div>
                              </div>
                          <div class="form-group">
                                <label for="editcapacite" class="col-sm-6 control-label">Capacité d'accueil</label>
                                <div class="col-sm-10">
                                  <input type="number" min="1" max="1000" class="form-control" id="editcapacite" name="editcapacite" required>
                                </div>
                              </div>
                          <div class="form-group"> <!--/here teh addclass has-error will appear -->
                            <label for="editdescription" class="col-sm-5 control-label">Description</label>
                            <div class="col-sm-10"> 
                                <textarea class="form-control" id="editdescription" name="editdescription" required></textarea>
                            <!-- here the text will apper  -->
                            </div>
                          </div> 
                          <div class="form-group">
                                <label for="editypeCh" class="col-sm-6 control-label">Type de chambre</label>
                                  <div class="col-sm-10">
                                    
                                      <select name="editypeCh" id="editypeCh"   
                                     data-live-search="true" class="chosen selectpicker form-control" required>
                                          <option selected="true" disabled="disabled">Choisissez une chambre</option>
                                        <?php foreach ($resultsCH as $ch){?>
                                           
                                            <option value="<?php echo $ch['libelle_ch'] ;?>" style="text-transform:capitalize;"><?php echo $ch['libelle_ch'] ;?></option>
                                        <?php }?>
                                        </select>
                                  </div>
                              </div>
                          <div class="form-group">
                            <label for="editnbr_chambres" class="col-sm-6 control-label">Nombre de chambres</label>
                            <div class="col-sm-10">
                              <input type="number" min="1" max="10" class="form-control" id="editnbr_chambres" name="editnbr_chambres"  required>
                            </div>
                          </div>
                          <div class="form-group">
                                <label for="editypeLi" class="col-sm-6 control-label">Type de lits</label>
                                  <div class="col-sm-10">
                                    <select name="editypeLi" id="editypeLi"   
                                     data-live-search="true" class="chosen selectpicker form-control" required>
                                          <option selected="true" disabled="disabled">Choisissez un lit</option>
                                        <?php foreach ($resultsLI as $li){?>
                                           
                                            <option value="<?php echo $li['libelle_li'] ;?>" style="text-transform:capitalize;"><?php echo $li['libelle_li'] ;?></option>
                                        <?php }?>
                                        </select>
                                  </div>
                              </div> 
                          <div class="form-group">
                            <label for="editnbr_lits" class="col-sm-6 control-label">Nombre de lits</label>
                            <div class="col-sm-10">
                              <input type="number" min="1" max="10" class="form-control" id="editnbr_lits" name="editnbr_lits"  required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="editnbr_salles" class="col-sm-6 control-label">Nombre de salles de bain</label>
                            <div class="col-sm-10">
                              <input type="number" min="1" max="10" class="form-control" id="editnbr_salles" name="editnbr_salles"  required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="editprix_nuit" class="col-sm-6 control-label">Prix par nuit</label>
                            <div class="col-sm-10">
                              <input type="number" min="10" max="1000" class="form-control" id="editprix_nuit" name="editprix_nuit"  required>
                            </div>
                          </div>
                          <div class="form-group"> <!--/here teh addclass has-error will appear -->
                            <label for="editequipement" class="col-sm-6 control-label">Equipement</label>
                            <div class="col-sm-10"> 
                                <textarea class="form-control" id="editequipement" name="editequipement" required></textarea>
                            <!-- here the text will apper  -->
                            </div>
                          </div>
                          
                      </div>

                      <div class="modal-footer editMemberModal">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                      </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- /edit modal -->

            
          </div>
        </div>
        
      </div>
      
      <!-- Footer -->
      <?php include('footer.php');?>
    </div>
      
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  
	<!-- datatables js -->
	<!-- datatables js -->
	<!-- data table -->
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>

    
	<!-- include custom index.js -->
	<script type="text/javascript" src="custom/js/index.js"></script>
    
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.0.0"></script>

  <script>
$(document).ready(function(e){
    $("#createMemberForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'php_action/create.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#createMemberForm').css("opacity",".5");
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == 'ok'){
                    $('#createMemberForm')[0].reset();
                    $('.statusMsg').html('<div class="alert alert-success" role="alert">Opération réussie ...</div>');
                }else{
                    $('.statusMsg').html("<div class='alert alert-danger' role='alert'>Erreur lors de la d'\ajout, veuillez réessayer ...</div>");
                }
                $('#createMemberForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
    
    //file type validation
    $("#img").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            $("#img").val('');
            return false;
        }
    });
    //file type validation
    $("#img1").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            $("#img1").val('');
            return false;
        }
    });
    //file type validation
    $("#img2").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            $("#img2").val('');
            return false;
        }
    });
    //file type validation
    $("#img3").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            $("#img3").val('');
            return false;
        }
    });
});
</script>


</body>

</html>
