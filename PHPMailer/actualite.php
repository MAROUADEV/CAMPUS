<?php
session_start();
require_once 'class.user.php';
$reg_user = new USER();
$_SESSION['New'] = false;
if($reg_user->is_Admin()!="")
{
 $reg_user->redirect('nouveaucours.php');
}
/*if($reg_user->is_logged_in()=="")
{
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$_SESSION['New'] =$actual_link;
	$reg_user->redirect('connexion.php?cnx');
}*/
require_once("configure.php");

$id=$_GET["id"];
$sql2 = " SELECT * FROM articles where Id_article=:id";
	try {
		$stmt = $DB->prepare($sql2);
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		$results = $stmt->fetchAll();
	} catch (Exception $ex) {
		echo($ex->getMessage());
	}
?>				

			
<!DOCTYPE html>
<html lang="fr">
<head><meta http-equiv="refresh" content="1000;url=deconnexion.php" >
	<meta http-equiv="Content-Language" content="fr-FR">
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Développement Informatique,Developpement Informatique,Microsoft ,Installation de Windows,Internet,Windows,Internet et Windows,formation en tutoriels informatiques,apprendre l’informatique ,Gestion de projet,Conception de logiciel,ingénieurs ,science ,Génie logiciel,UML : le langage de modélisation graphique,Merise : Méthode d'analyse informatique,Cour complet uml,la conception et la réalisation de projets informatiques,Analyse objet UML/Merise,Access et mySQL, logiciel SPSS, les bases de données orientées objet,BDD,administration informatique,cours, rapports de stage gratuits,Administration,gratuitement,Architecture technique, logicielle, Sécurité des systèmes informatiques,vpn,documents,ordinateurs ,Réseaux informatiques,nouvelles technologies,meilleurs documents d'informatique,HTML et PHP,langages de programmation,tutorials,cours informatique tous niveaux, tous domaines : reseaux (ccna1...), systeme exploitation (windows,linux...),bases de donnees (sql,oracle), conception ( uml), programmation">
	<meta name="author"      content="DevHelp">
	<meta name="keywords" 	content="Excel,Le langage C++ cours et exercices,C, Php, HTML,div,exercice,JS,HTML,CSS,JavaScript,cours informatique,cours informatiques,info,infromatique,formation informatique gratuite,tutoriel informatique, cours programmation,cours de programmation,tutoriels informatique,reseaux,sgbd,sql,html,Ajax,Big data,c,JAVA,JEE,JAVA JEE,JAVA EE,SQL Server">

	
	<title>Actualités IT</title>

	<link rel="shortcut icon" href="http://d.hatena.ne.jp/images/or_favicon.ico">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	<link href="Datatable/css/dataTables.bootstrap.min.css"rel="stylesheet" type="text/css" />
	<script src="Datatable/js/jquery.js"></script>
    <script> 
    $(function(){
      $("#includedfooter").load("footer.php"); 
    });
    </script> 

	
	<style type="text/css">
	.pagination>.active>a, 
	.pagination>.active>span, 
	.pagination>.active>a:hover, 
	.pagination>.active>span:hover, 
	.pagination>.active>a:focus, 
	.pagination>.active>span:focus {
    z-index: 2;
    color: #fff;
    background-color: #FF8C00;
    border-color: #FF8C00;
    cursor: default;
}
	
	.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    line-height: 1.428571429;
    text-decoration: none;
    color: #FF8C00;
    background-color: #fff;
    border: 1px solid #ddd;
    margin-left: -1px;
}
	              .pagination {
    display: inline-block;
}
        
	.dataTables_paginate {
	position: absolute;
    top: 50%;  
    left: 50%; 
    transform: translate(-50%, -50%); 
	Top:2em ;
        width:400px;
}
	

</style>
    
</head>

<body>
	<!-- Fixed navbar   .form-control,.input-sm{
    width: 300px;
	}-->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php"><img src="assets/images/logo5.png" alt="DevHelp" style="height: 50px;"></a>
				</div>
			<div class="navbar-collapse Systéme">
				<ul class="nav navbar-nav pull-right">
					<li class=""><a href="index.php"><i class="fa fa-home" aria-hidden="true" style="font-size:22px;"></i></a></li>
					<li><a href="aproposdenous.php" style="font-size:15px;">À propos de nous</a></li>
					<li class="dropdown" class="active">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:15px;">Cours <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="cours.php?sujet=Base de données">Base de données</a></li>
							<li><a href="cours.php?sujet=Programmation">Programmation</a></li>
                            <li><a href="cours.php?sujet=Conception">Conception</a></li>
                            <li><a href="cours.php?sujet=Réseaux">Réseaux</a></li>
                            <li><a href="cours.php?sujet=Sécurité">Sécurité</a></li>
                            <li><a href="cours.php?sujet=Systéme exploitation">Systéme d'exploitation</a></li>
						</ul>
					</li>
                   <li><a href="tutoriels.php" style="font-size:15px;">Tutoriels</a></li>
                    <li><a href="logiciels.php" style="font-size:15px;">Logiciels</a></li>
                    <li><a href="actualites.php" style="font-size:15px;">Actualités IT</a></li>
						<!--ul class="dropdown-menu">
							<li><a href="tutoriels.php?sujet=Oracle">Oracle</a></li>
							<li><a href="tutoriels.php?sujet=SQL Server">SQL Server</a></li>
                            <li><a href="tutoriels.php?sujet=Big Data">Big Data</a></li>
                            <li><a href="tutoriels.php?sujet=Tuto programmation">Tuto programmation</a></li>
						</ul-->
					<li><a href="contact.php" style="font-size:15px;">Contact</a></li>
					<?php 
				    	if(!isset($_SESSION['Nom']))
						{
					?> 
							<li><a class="btn" href="connexion.php" style="font-size:15px;">Se connecter / S'inscrire</a></li>
					<?php 
				       	}
				    ?> 	
					<?php 
				    	if(isset($_SESSION['Nom']))
						{
					?> 
							<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size:15px;">Profil<b class="caret"></b></a>
							<ul class="dropdown-menu">
                            <li><a href="moncompte.php" style="font-size:15px;">Mon compte </a></li>
							<li><a href="deconnexion.php" style="font-size:15px;">Déconnexion <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
						</ul>
                        </li>
					<?php 
				       	}
				    ?> 
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">


		<ol class="breadcrumb">
			<li><a href="index.php">Accueil</a></li>
			<li class="active">Actualités</li>
		</ol>

		<div class="row">	
					
			<!-- Article main content -->
			<article class="col-md-12 maincontent">
				<header class="page-header">
					<h1 class="page-title "><?php echo $Sujet; ?></h1>					
				</header>				
				 
					<?php foreach ($results as $res) { ?>
					
					<h2> <?php echo $res['Titre'] ?> </h2>
					<br/>
					<?php echo $res['Contenu'] ?>
					
					<!--td style="background-color:#FFFFFF;" class="col-md-2">
					<br><br>
					<!--a target="_blank"  href="telechargement.php?Lien=<!--?php echo base64_encode($res['Lien']) ?>&Title=<!--?php echo ($res['Title']) ?>&Sujet=<!--?php echo ($res['Sujet']) ?>&Type=<!--?php echo ($res['Type']) ?>"
	                class="btn btn-action">  
	               <strong><span><i class="fa fa-download"></i> Télécharger</span></strong>            	
                	</a-->
					<!--/td-->
					<?php
					}
					?>
				</article>
			<!-- /Article -->
			
		</div>
	</div>	<!-- /container -->
	

	<div id="includedfooter"></div>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
	
	<script src="Datatable/js/jquery.js"></script>
	<script src="Datatable/js/bootstrap.min.js"></script>
	<script src="Datatable/js/jquery.dataTables.min.js"></script>
	<script src="Datatable/js/dataTables.bootstrap.min.js"></script>
	<script src="Datatable/js/dataTables.select.min.js"></script>
	<script src="Datatable/js/dataTables.editor.min.js"></script>
	<script>
	$(document).ready(function(){
		

		$('#example').dataTable( {
			
			"dom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
			"bLengthChange" : false,
			"ordering": false,
			"info":     false,
			"pageLength": 5,
			"searching": true,			
			"language": {
					processing:     "Traitement en cours...",
					search:         '<i class="fa fa-search" aria-hidden="true" style="float:right;margin-left:14px;margin-top:0.1em;font-size:22px;"></i>',
		            lengthMenu:     "Afficher _MENU_ &eacute;l&eacute;ments",
		            info:           "",
		            infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
		            infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
		            infoPostFix:    "",
		            loadingRecords: "Chargement en cours...",
		            zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
		            emptyTable:     "Aucune actualités",
			    "paginate": {
			    	first:      "Premier",
	                previous:   "Précédent",
	                next:       "Suivant",
	                last:       "Dernier"
			    }
			  }
	
			} );
	});


	</script>
		
</body>
</html>