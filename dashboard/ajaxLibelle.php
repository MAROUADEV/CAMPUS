 <?php
session_start();

require_once("../connect.php"); 
    
    require_once('../class.user1.php');
    require_once('../configure.php');



$reg_user = new USER();


if($reg_user->is_logged_in()=="")
{
	// header("refresh:5;accueil.php");
 $reg_user->redirect('connexion.php');
}
if(isset($_POST['uploadfilesub'])) {
                                        $libelle = $_POST['libelle'];
                                        $filename = $_FILES['image']['name'];

                                        $filetmpname = $_FILES['image']['tmp_name'];
                                        
                                        $filename1 = $_FILES['image1']['name'];

                                        $filetmpname1 = $_FILES['image1']['tmp_name'];
                                        
                                        $filename2 = $_FILES['image2']['name'];

                                        $filetmpname2 = $_FILES['image2']['tmp_name'];

                                        $folder = 'uploads/';

                                        move_uploaded_file($filetmpname, $folder.$filename);

                                        
                                        $sql = "update `biens` set photo='$filename',photo2='$filename1',photo3='$filename2' where libelle='$libelle'";
                                        
                                        $qry = mysqli_query($conn,  $sql);

                                        if( $qry) { 
                                            
                                            echo "ok";
                                        }

                            }
?>
