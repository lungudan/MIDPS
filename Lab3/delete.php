<?php
require_once("session.php");
	
require_once("class.user.php");	 
	
include_once 'dbconfig.php';
	
	if (isset($_GET['id'])) 
 {
  
  
  $stmt_delete = $conn->prepare('DELETE FROM members WHERE user_id =:mid');
  $stmt_delete->bindParam(':mid',$_GET['id']);
  $stmt_delete->execute();
  
  header("Location: profil.php");
 }


?>