<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
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
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	
	$strow=$stmt->fetch(PDO::FETCH_ASSOC);
	
if(isset($_POST['btn-save']))
{
 $title = strip_tags($_POST['title']);
 $author = strip_tags($_POST['author']);
 $short = strip_tags($_POST['short']);
 $full = strip_tags($_POST['full']);
 
 
 if($title=="")	{
		$error[] = "Scrieti prenumele!";	
	}
	else if($short=="")	{
		$error[] = "Scrieti numele!";	
	}
	else if($full=="")	{
		$error[] = "Scrieti numele!";	
	}
	else
	{
		try
		{
			$stmt = $auth_user->runQuery("SELECT title FROM news WHERE title=:title");
			$stmt->execute(array(':title'=>$title));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['title']==$title) {
				$error[] = "Acest titlu ...";
			}
			
			else
			{
				if($auth_user->addnews($title,$author,$short,$full)){	
					$auth_user->redirect('add.php?success');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}  
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
				<li><a href="#"><span class="glyphicon glyphicon-check"></span>&nbsp;<?php echo $lang[$default]['add_blog']; ?></a></li>
				<li><a href="/edit-profile.php"><span class="glyphicon glyphicon-edit"></span>&nbsp;<?php echo $lang[$default]['edit_profile']; ?></a></li>
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
    
    	
        
        
        
        
      
   
                    <div class="panel panel-default" style="padding-top:40px; padding-bottom:40px; border-radius:10px;">
                       
                            <div class="panel-body">  
 <center> <div id="alert_add" class="alert alert-info"><center><h5><?php echo $lang[$default]['add_title']; ?></h5></center></div> </center>							
    <form method="post">
    <table align="center">
	<?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                   <center>   <div id="alert_add" class="alert alert-danger">
                        <i class="glyphicon glyphicon-remove"></i> &nbsp; <?php echo $error; ?>
                     </div> </center>
                     <?php
				}
			}
			else if(isset($_GET['success']))
			{
				 ?>
                 <center> <div id="alert_add" class="alert alert-success">
                      <i class="glyphicon glyphicon-ok"></i> &nbsp; <?php echo $lang[$default]['add_success']; ?>
                 </div> </center>
				
                 <?php
			}
			?>
    <tr>
    <td align="center"><a href="/profil.php"><h4><?php echo $lang[$default]['add_back']; ?></h4></a></td>
    </tr>
    <tr>
    <td><input type="text" name="title" class="form-control" placeholder="<?php echo $lang[$default]['add_in_title']; ?>" value="<?php if(isset($error)){echo $title;}?>" required /><br /></td>
    </tr>
    <tr>
    <td><input type="hidden" name="author" class="form-control" value="<?php echo $strow['user_name']; ?>" required /><br /></td>
    </tr>
	<tr>
    <td><textarea rows="5" cols="45" name="short" placeholder=" <?php echo $lang[$default]['add_short']; ?>" maxlength="500" required><?php if(isset($error)){echo $short;}?></textarea><br /><br></td>
    </tr>
	<tr>
    <td><textarea rows="5" cols="45" name="full" placeholder=" <?php echo $lang[$default]['add_full']; ?>" maxlength="800" required><?php if(isset($error)){echo $full;}?></textarea><br /><br></td>
    </tr>
    <tr>
    <td><button type="submit" class="btn btn-info" name="btn-save"><strong><?php echo $lang[$default]['add_save']; ?></strong></button></td>
    </tr>
    </table>
    </form>
        
        </div> </div>
        
        
        
    
    </div>


<script src="/assets/jquery-1.12.4.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>



    
    </div>

</div>





</body>
</html>
