<?php
class Database
{
     
    private $host = "localhost";
    private $db_name = "clic_db2019";
    private $username = "root";
    private $password = "";
    public $conn;
    
     
    public function dbConnection()
 {
     
     $this->conn = null;   
    
        try
  {
            
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
   $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $this->conn->exec("SET CHARACTER SET utf8");
             $tz = (new DateTime('now', new DateTimeZone('Africa/Casablanca')))->format('P');
            $this->conn->exec("SET time_zone='$tz';");
        }
  catch(PDOException $exception)
  {
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}
?>