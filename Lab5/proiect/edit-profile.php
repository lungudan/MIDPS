<?php
require_once("session.php");
require_once("class.user.php");

include 'lang.php';

error_reporting(E_ERROR);


$list = ['ro','ru'];
if(in_array($_GET['lang'],$list)){      
   if(isset($_GET['lang'])){
    $_SESSION['language'] = $_GET['lang'];
} 
$default = $_SESSION['language'];   
} else {   
    if(!isset($_SESSION['language'])){
    $_SESSION['language'] = 'ro';
} 
$default = $_SESSION['language'];	    
}
	
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$strow=$stmt->fetch(PDO::FETCH_ASSOC);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="/js/jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="/css/style.css" type="text/css"  />
<title><?php echo $lang[$default]['hi']; ?> - <?php print($strow['name']); ?> <?php print($strow['prename']); ?></title>
</head>

<body>


<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
           
          </ul>
		   <ul class="nav navbar-nav navbar-left">
            
            <div class="block-lang">
                           
                            <li><a href="?lang=ru" class="language-link" title="ru"><img src="img/png/ru.png"></a></li>
                            <li><a href="?lang=ro" class="language-link" title="ro"><img src="img/png/ro.png"></a></li>
                      </div>
				  
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $lang[$default]['hi']; ?> <?php print($strow['name']); ?> <?php print($strow['prename']); ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/profil.php"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $lang[$default]['profile']; ?></a></li>
				<li><a href="/add.php"><span class="glyphicon glyphicon-check"></span>&nbsp;<?php echo $lang[$default]['add_blog']; ?></a></li>
				<li><a href="#"><span class="glyphicon glyphicon-edit"></span>&nbsp;<?php echo $lang[$default]['edit_profile']; ?></a></li>
				<li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;<?php echo $lang[$default]['exit']; ?></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

	<div class="clearfix"></div>
	
    <div class="container-fluid" style="margin-top:180px;">
	
    <div class="container">
	   <div class="no-gutter row"> 
           <div class="col-md-12">
               <div class="panel panel-default" id="sidebar">
                   <div class="panel-body">                
<?php  
    include_once 'dbconfig.php';        
    $query = "SELECT * FROM users where user_id='$user_id'";
    $stmt = $conn->prepare( $query );
    $stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
?>             
<?php include 'controller/edit-profil-form.php' ?>
	<?php   } ?>
                   </div>
               </div>
           </div>
        </div>
    </div>
    </div>
    	
        
        
        
        
      


<script src="/assets/jquery-1.12.4.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>








</body>
</html>