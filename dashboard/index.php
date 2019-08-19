<?php 
    session_start();
    
        
    require_once('../class.user1.php');
    require_once('../configure.php');



$reg_user = new USER();


if($reg_user->is_logged_in()=="" )
{

 $reg_user->redirect('connexion.php');
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
        
        <!-- Heading -->
        
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
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                        <?php 
                            $con=mysqli_connect("localhost","root","","clic_db2019");
                            $nom = $_SESSION['Nom'];
                                $sql2 = "SELECT * FROM reservations WHERE proprietaire ='$nom'";
                            // Check connection
                            if (mysqli_connect_errno())
                              {
                              echo "Failed to connect to MySQL: " . mysqli_connect_error();
                              }
                            if ($result=mysqli_query($con,$sql2))
                              {
                              // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($result);
                              // Free result set
                              mysqli_free_result($result);
                              }

                            mysqli_close($con);
                        ?>
                      <h5 class="card-title text-uppercase text-muted mb-0">Nombre de réservations</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $rowcount;?> </span>
                        
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                      <span class="h2 font-weight-bold mb-0">2,356</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                      <span class="h2 font-weight-bold mb-0">924</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
          
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h2 class="text-white mb-0">Total par mois</h2>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="graphCanvas"></canvas>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      
      <!-- Footer -->
      <?php include('footer.php');?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
 
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.0.0"></script>
    
    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {

            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].month);
                        marks.push(data[i].total);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Total par mois',
                            
                                data: marks,
                                borderColor: "#80b6f4",
                                pointBorderColor: "#80b6f4",
                                pointBackgroundColor: "#80b6f4",
                                pointHoverBackgroundColor: "#80b6f4",
                                pointHoverBorderColor: "#80b6f4",
                                pointBorderWidth: 4,
                                pointHoverRadius: 10,
                                pointHoverBorderWidth: 1,
                                pointRadius: 3,
                                fill: false,
                                borderWidth: 4,
                                
                            },
                            {
            steppedLine: 'after',
            label: 'steppedLine: "after"',
            backgroundColor: 'rgba(75, 192, 192, 0.35)',
            borderColor: '#5e72e4',
            fill: false,
          pointBorderColor: "#5e72e4",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#5e72e4",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
        }
                        ]
                        
                    };

                    var graphTarget = $("#graphCanvas");
                    
                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata,
    options: {
        legend: {
            position: "top"
        },
        
        responsive:true,
        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "#fff",
                    beginAtZero: true,
                    padding: 20,
                    maxTicksLimit:5,//it's 200
                    
                },
                
                gridLines: {
                    drawTicks: false,
                    display: false,
                    color: "red" 
                }
}],
            xAxes: [{
                 offset: true,
                ticks: {
                    fontColor: "#fff",
                    beginAtZero: true,
                    padding: 20
                },
                gridLines: {
                   drawTicks: false,
                    display: false,
                    color: "red" 
},type: 'category',
                
            
            }]
        }
        
       
    
    }
    
                    });
                });
            }
        }
        </script>
</body>

</html>