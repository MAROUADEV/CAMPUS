<?php

require_once 'dbconfig.php';

class USER
{ 

 private $conn;
 
 public function __construct()
 {
  $database = new Database();
  $db = $database->dbConnection();
  $this->conn = $db;
    }
 
 public function runQuery($sql)
 {
  $stmt = $this->conn->prepare($sql);
  return $stmt;
 }
 
 public function lasdID()
 {
  $stmt = $this->conn->lastInsertId();
  return $stmt;
 }
 
 public function register($Nom,$Prenom,$Email,$NomUtilisateur,$role,$MotDePasse,$Code)
 {
  try
  {       
   // $MotDePasse = ($MotDePasse);
   $stmt = $this->conn->prepare("INSERT INTO utilisateur(Nom,Prenom,Email,NomUtilisateur,role,MotDePasse,Code) 
                                                VALUES(:Nom, :Prenom, :Email, :NomUtilisateur, :role, :MotDePasse, :Code)");
   $stmt->bindparam(":Nom",$Nom);
   $stmt->bindparam(":Prenom",$Prenom);
   $stmt->bindparam(":Email",$Email);
   $stmt->bindparam(":NomUtilisateur",$NomUtilisateur);
   $stmt->bindparam(":role",$role);
   $stmt->bindparam(":MotDePasse",$MotDePasse);
   $stmt->bindparam(":Code",$Code);
   $stmt->execute(); 
   return $stmt;
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 public function login2($Email,$MotDePasse)
 {
  try
  {
   $stmt = $this->conn->prepare("SELECT * FROM utilisateur WHERE Email=:Email");
   $stmt->execute(array(":Email"=>$Email));
   $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
   
   if($stmt->rowCount() == 1)
   {
    if($userRow['Status']=="Y")
    {
     if($userRow['MotDePasse']==($MotDePasse))
     {
						$_SESSION['userSession'] = $userRow['IdUtilisateur'];
						$_SESSION['IdUtilisateur'] = $userRow['IdUtilisateur'];
						$_SESSION['Nom'] = $userRow['Nom'];
						$_SESSION['Prenom'] = $userRow['Prenom'];
                        $_SESSION['Date_naissance'] = $userRow['Date_naissance'];
						$_SESSION['Email'] = $userRow['Email'];
						$_SESSION['NomUtilisateur'] = $userRow['NomUtilisateur'];
                        $_SESSION['cartetd'] = $userRow['cartetd'];
                         $_SESSION['certif'] = $userRow['certif'];
                         $_SESSION['passeport'] = $userRow['passeport'];
                         $_SESSION['role'] = $userRow['role'];
						$_SESSION['MotDePasse'] = $userRow['MotDePasse'];
      return true;
     }
     else
     {
      header("Location: login.php?error");
      exit;
     }
    }
    else
    {
		$_SESSION['Email'] = $userRow['Email'];
						$_SESSION['MotDePasse'] = $userRow['MotDePasse'];
     header("Location: login.php?inactive");
     exit;
    } 
   }
   else
   {
    header("Location: login.php?error3");
    exit;
   }  
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 public function login1($NomUtilisateur,$MotDePasse)
 {
  try
  {
   $stmt = $this->conn->prepare("SELECT * FROM utilisateur WHERE NomUtilisateur=:NomUtilisateur");
   $stmt->execute(array(":NomUtilisateur"=>$NomUtilisateur));
   $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
   
   if($stmt->rowCount() == 1)
   {
    if($userRow['Status']=="Y")
    {
     if($userRow['MotDePasse']==($MotDePasse))
     {
						$_SESSION['userSession'] = $userRow['IdUtilisateur'];
						$_SESSION['IdUtilisateur'] = $userRow['IdUtilisateur'];
						$_SESSION['Nom'] = $userRow['Nom'];
						$_SESSION['Prenom'] = $userRow['Prenom'];
                        $_SESSION['Date_naissance'] = $userRow['Date_naissance'];
                            $_SESSION['lieu_naissance'] = $userRow['lieu_naissance'];
						$_SESSION['Email'] = $userRow['Email'];
						$_SESSION['NomUtilisateur'] = $userRow['NomUtilisateur'];
                        $_SESSION['cartetd'] = $userRow['cartetd'];
                         $_SESSION['certif'] = $userRow['certif'];
                         $_SESSION['passeport'] = $userRow['passeport'];
                         $_SESSION['role'] = $userRow['role'];
						$_SESSION['MotDePasse'] = $userRow['MotDePasse'];
                        $_SESSION['fonction'] = $userRow['fonction'];
                         $_SESSION['adresse'] = $userRow['adresse'];
                         $_SESSION['siret'] = $userRow['siret'];
                         $_SESSION['siren'] = $userRow['siren'];
                        $_SESSION['denomination_sociale'] = $userRow['denomination_sociale'];
      return true;
     }
     else
     {
      header("Location: login.php?error");
      exit;
     }
    }
    else
    {
		$_SESSION['Email'] = $userRow['Email'];
						$_SESSION['MotDePasse'] = $userRow['MotDePasse'];
     header("Location: login.php?inactive");
     exit;
    } 
   }
   else
   {
    header("Location: login.php?error2");
    exit;
   }  
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }

 
 public function is_logged_in()
 {
  if(isset($_SESSION['userSession']))
  {
   return true;
  }
 }
 
  public function is_Admin()
 {
  if(isset($_SESSION['userSession']))
  {
	  if($_SESSION['NomUtilisateur']=="DevHelp.Services")
  {
   return true;
  }
 }
 }
 
 public function redirect($url)
 {
  header("Location: $url");
 }
 
 public function logout()
 {
  session_destroy();
						$_SESSION['userSession'] = false;
						$_SESSION['IdUtilisateur'] = false;
						$_SESSION['Nom'] = false;
						$_SESSION['Prenom'] = false;
                        $_SESSION['Date_naissance'] = false;
						$_SESSION['Email'] = false;
						$_SESSION['NomUtilisateur'] =false;
                        $_SESSION['cartetd'] = false;
                         $_SESSION['certif'] = false;
                         $_SESSION['passeport'] = false;
                         $_SESSION['role'] = false;
						$_SESSION['MotDePasse'] = false;
                         $_SESSION['lieu_naissance'] = false;
                         $_SESSION['fonction'] = false;
                         $_SESSION['adresse'] = false;
                         $_SESSION['siret'] = false;
                         $_SESSION['siren'] = false;
                        $_SESSION['denomination_sociale'] = false;
 }
    
public function updateUser($IdUtilisateur,$Nom,$Prenom,$date,$NomUtilisateur,$MotDePasse)
 {
  try
  {
   $stmt = $this->conn->prepare("update utilisateur set Nom=:Nom,Prenom=:Prenom,Date_naissance=:Date_naissance,NomUtilisateur=:NomUtilisateur,MotDePasse=:MotDePasse where IdUtilisateur=:IdUtilisateur");
   $stmt->bindparam(":Nom",$Nom);
   $stmt->bindparam(":Prenom",$Prenom);
   $stmt->bindparam(":Date_naissance",$date);
   $stmt->bindparam(":NomUtilisateur",$NomUtilisateur);
   $stmt->bindparam(":MotDePasse",$MotDePasse);
   $stmt->bindparam(":IdUtilisateur",$IdUtilisateur);
   $stmt->execute(); 
   return $stmt;
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
    
public function updateUser1($IdUtilisateur,$Nom,$Prenom,$date,$lieu,$NomUtilisateur,$MotDePasse,$fonction,$adresse,$denomination,$siren,$siret)
 {
  try
  {
   $stmt = $this->conn->prepare("update utilisateur set Nom=:Nom,Prenom=:Prenom,Date_naissance=:Date_naissance,lieu_naissance=:lieu_naissance,NomUtilisateur=:NomUtilisateur,MotDePasse=:MotDePasse,fonction=:fonction,adresse=:adresse,denomination_sociale=:denomination_sociale,siren=:siren,siret=:siret where IdUtilisateur=:IdUtilisateur");
   $stmt->bindparam(":Nom",$Nom);
   $stmt->bindparam(":Prenom",$Prenom);
   $stmt->bindparam(":lieu_naissance",$lieu);
   $stmt->bindparam(":Date_naissance",$date);
   $stmt->bindparam(":NomUtilisateur",$NomUtilisateur);
   $stmt->bindparam(":MotDePasse",$MotDePasse);
   $stmt->bindparam(":fonction",$fonction);
   $stmt->bindparam(":adresse",$adresse);
   $stmt->bindparam(":denomination_sociale",$denomination);
   $stmt->bindparam(":siren",$siren);
   $stmt->bindparam(":siret",$siret);
   $stmt->bindparam(":IdUtilisateur",$IdUtilisateur);
   $stmt->execute(); 
   return $stmt;
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
    
 function send_mail($email,$message,$subject)
 {      

// Include and initialize phpmailer class
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'devmaroua@gmail.com';
$mail->Password = 'Sashelpsupport2017';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('devmaroua@gmail.com','Clicampus');
$mail->addReplyTo('devmaroua@gmail.com','Clicampus');

// Add a recipient
$mail->addAddress($email);
  $mail->Subject    = $subject;
  $mail->MsgHTML($message);
  $mail->send();
// Send email
// if(!$mail->send()){
    // echo 'Message could not be sent.';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
// }else{
    // echo 'Message has been sent';
// }

 } 
}
?>