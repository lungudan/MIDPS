<?php
include 'lang.php' ;
require_once("session_index.php");
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
<title><?php echo $lang[$default]['title_page']; ?></title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="/js/jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="/css/style.css" type="text/css"  />
</head>
<body>
<div class="row">
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        
        <div id="navbar" class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-left">
            
            <div class="block-lang">
                            
                            <li><a href="?lang=ru" class="language-link" title="ru"><img src="img/png/ru.png"></a></li>
							<li><a href="?lang=ro" class="language-link" title="ro"><img src="img/png/ro.png"></a></li>
                            
                      </div>
				  
            
          </ul>
		  <?php if(session_status() == PHP_SESSION_ACTIVE){?>
		  <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $lang[$default]['hi']; ?> <?php echo $strow['user_email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $lang[$default]['profile']; ?></a></li>
				<li><a href="/add.php"><span class="glyphicon glyphicon-check"></span>&nbsp;Adaugare Membri</a></li>
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;<?php echo $lang[$default]['exit']; ?></a></li>
              </ul>
            </li>
          </ul>
		  <?php }?>
		  <?php if (session_status() !== PHP_SESSION_ACTIVE) {?>
		  <ul class="nav navbar-nav navbar-right">
		  
                <li><a href="/login.php"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $lang[$default]['intro']; ?></a></li>
              </ul>
			  
		  <?php }?>
        </div>
      </div>
    </nav>
</div>
	
<section class="silver-container">
<div class="container">
<div class="row">
<div class="default-container">
<h2 class="orange-title"><?php echo $lang[$default]['text_index_1']; ?></h2>
<div class="dark-blue-title"><?php echo $lang[$default]['text_index_2']; ?></div>
<div class="col-sm-6 col-md-6 col-lg-4">
<div class="row">
<div class="befefits-block">
<div class="image_align_sprite"></div>
<div class="simple-title"><?php echo $lang[$default]['text_index_3']; ?></div>
<div class="simple-text"><p><?php echo $lang[$default]['text_index_4']; ?></p></div></div></div></div>
<div class="col-sm-6 col-md-6 col-lg-4">
<div class="row">
<div class="befefits-block">
<div class="image_align_sprite"></div>
<div class="simple-title"><?php echo $lang[$default]['text_index_5']; ?></div>
<div class="simple-text"><p><?php echo $lang[$default]['text_index_6']; ?></p><p>&nbsp;</p></div></div></div></div>
<div class="col-sm-6 col-md-6 col-lg-4">
<div class="row">
<div class="befefits-block">
<div class="image_align_sprite"></div>
<div class="simple-title"><?php echo $lang[$default]['text_index_7']; ?></div>
<div class="simple-text"><p><?php echo $lang[$default]['text_index_8']; ?></p><p>&nbsp;</p></div></div></div></div>
<div class="col-sm-6 col-md-6 col-lg-4">
<div class="row">
<div class="befefits-block">
<div class="image_align_sprite"></div>
<div class="simple-title"><?php echo $lang[$default]['text_index_9']; ?></div>
<div class="simple-text"><p><?php echo $lang[$default]['text_index_10']; ?></p></div></div></div></div>
<div class="col-sm-6 col-md-6 col-lg-4">
<div class="row">
<div class="befefits-block">
<div class="image_align_sprite"></div>
<div class="simple-title"><?php echo $lang[$default]['text_index_11']; ?></div>
<div class="simple-text"><p><?php echo $lang[$default]['text_index_12']; ?></p><p>&nbsp;</p></div></div></div></div>
<div class="col-sm-6 col-md-6 col-lg-4">
<div class="row">
<div class="befefits-block">
<div class="image_align_sprite"></div>
<div class="simple-title"><?php echo $lang[$default]['text_index_13']; ?></div>
<div class="simple-text"><p><?php echo $lang[$default]['text_index_14']; ?></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>  
        
       
<script src="/assets/jquery-1.12.4.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>


</body>
</html>
