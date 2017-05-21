<?php
include 'lang.php' ;
session_start();
error_reporting(E_ERROR);

if(!isset($_SESSION['language'])){
    $_SESSION['language'] = 'ro';
}

if(isset($_GET['lang'])){
    $_SESSION['language'] = $_GET['lang'];
}

$default = $_SESSION['language'];
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('profil.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('profil.php');
	}
	else
	{
		$error = $lang[$default]['error_1'];
	}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $lang[$default]['intro']; ?></title>
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
		  
                <li><a href="/reg.php"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $lang[$default]['intro_reg']; ?></a></li>
              </ul>
           
        </div>
      </div>
    </nav>
</div>
<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h3 class="form-signin-heading"><?php echo $lang[$default]['enter']; ?></h3><hr />
        
        <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                </div>
                <?php
			}
		?>
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" name="txt_uname_email" placeholder="<?php echo $lang[$default]['input_usr']; ?>" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="<?php echo $lang[$default]['input_pass']; ?>" />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn">
                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; <?php echo $lang[$default]['intro']; ?>
            </button>
        </div>  
      	<br />
            <label><?php echo $lang[$default]['no_acc_1']; ?> <a href="reg.php"><?php echo $lang[$default]['no_acc_2']; ?></a></label>
      </form>

    </div>
    
</div>

</body>
</html>