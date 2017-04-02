<?php
class Database
{   
    private $host = "";
    private $db_name = "";
    private $username = "";
    private $password = "";
    public $conn;
     
    public function dbConnection()
	{
        
	    $conn = null; 
        global $conn;		
        try
		{
            $conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $conn;
    }
}
?>
