<?php
session_start();
require_once('class.user.php');
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

$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('profil.php');
}

if(isset($_POST['btn-signup']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$name = strip_tags($_POST['txt_name']);
	$prename = strip_tags($_POST['txt_prename']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);	
	
	if($uname=="")	{
		$error[] = $lang[$default]['error_reg_1'];
	}
	else if($umail=="")	{
		$error[] = $lang[$default]['error_reg_2'];	
	}
	else if($name=="")	{
		$error[] = $lang[$default]['error_reg_8'];	
	}
	else if($prename=="")	{
		$error[] = $lang[$default]['error_reg_9'];	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = $lang[$default]['error_reg_3'];
	}
	else if($upass=="")	{
		$error[] = $lang[$default]['error_reg_4'];
	}
	else if(strlen($upass) < 6){
		$error[] = $lang[$default]['error_reg_5'];	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['user_name']==$uname) {
				$error[] = $lang[$default]['error_reg_6'];
			}
			else if($row['user_email']==$umail) {
				$error[] = $lang[$default]['error_reg_7'];
			}
			else
			{
				if($user->register($uname,$name,$prename,$umail,$upass)){	
					$user->redirect('reg.php?success');
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
<title>Inregistrare</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
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
		   <ul class="nav navbar-nav navbar-right">
		  
                <li><a href="/login.php"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $lang[$default]['intro']; ?></a></li>
              </ul>
           
        </div>
      </div>
    </nav>
</div>
<div class="signin-form">

<div class="container">
    	
        <form method="post" class="form-signin">
            <h2 class="form-signin-heading"><?php echo $lang[$default]['intro_reg']; ?></h2><hr />
            <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['success']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; <?php echo $lang[$default]['success']; ?> / <a href='login.php'><?php echo $lang[$default]['enter']; ?></a> /
                 </div>
                 <?php
			}
			?>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_uname" placeholder="<?php echo $lang[$default]['input_usr']; ?>" value="<?php if(isset($error)){echo $uname;}?>" />
            </div>
			<div class="form-group">
            <input type="text" class="form-control" name="txt_name" placeholder="<?php echo $lang[$default]['input_name']; ?>" value="<?php if(isset($error)){echo $name;}?>" />
            </div>
			<div class="form-group">
            <input type="text" class="form-control" name="txt_prename" placeholder="<?php echo $lang[$default]['input_prename']; ?>" value="<?php if(isset($error)){echo $prename;}?>" />
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_umail" placeholder="<?php echo $lang[$default]['input_email']; ?>" value="<?php if(isset($error)){echo $umail;}?>" />
            </div>
            <div class="form-group">
            	<input type="password" class="form-control" name="txt_upass" placeholder="<?php echo $lang[$default]['input_pass']; ?>" />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;<?php echo $lang[$default]['intro_reg']; ?>
                </button>
            </div>
            <br />
            <label><?php echo $lang[$default]['acc_1']; ?> <a href="login.php"><?php echo $lang[$default]['intro']; ?></a></label>
        </form>
       </div>
</div>

</div>

</body>
</html>