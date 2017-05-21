<?php

require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		global $conn;
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		global $conn;
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($uname,$name,$prename,$umail,$upass)
	{
		global $conn;
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $conn->prepare("INSERT INTO users(user_name,name,prename,user_email,user_pass) 
		                                               VALUES(:uname, :name,:prename,:umail, :upass)");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":name", $name);
			$stmt->bindparam(":prename", $prename);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	public function addnews($title,$author,$short,$full)
	{
		global $conn;
		try
		{
			
			$stmt = $conn->prepare("INSERT INTO news(title,author,short,full) 
		                                               VALUES(:title,:author, :short, :full)");
													   
			$stmt->bindparam(":title", $title);								  
			$stmt->bindparam(":author", $author);
			$stmt->bindparam(":short", $short);
			$stmt->bindparam(":full", $full);	
            			
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	public function editprofile($user_id,$name,$prename,$user_email,$user_dob,$user_profession,$user_address,$user_gender,$user_country)
	{
		global $conn;
		try
		{
			$stmt=$conn->prepare("UPDATE users SET name='$name',prename='$prename',user_profession='$user_profession',user_address='$user_address',user_email='$user_email',user_dob='$user_dob', user_gender='$user_gender',user_country='$user_country' WHERE user_id='".$user_id."'");
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	public function doLogin($uname,$umail,$upass)
	{
		global $conn;
		try
		{
			
			$stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_pass FROM users WHERE user_name=:uname OR user_email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['user_pass']))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>