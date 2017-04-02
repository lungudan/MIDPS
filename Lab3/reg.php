<?php
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('profil.php');
}

if(isset($_POST['btn-signup']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);	
	
	if($uname=="")	{
		$error[] = "scrieti un username !";	
	}
	else if($umail=="")	{
		$error[] = "scrieti un email  !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Scrieti un email valid !';
	}
	else if($upass=="")	{
		$error[] = "scrieti un password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Parola trebuie sa contina nu mai putin de 6 caractere";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['user_name']==$uname) {
				$error[] = "acest username este deja ocupat !";
			}
			else if($row['user_email']==$umail) {
				$error[] = "acest email este deja ocupat !";
			}
			else
			{
				if($user->register($uname,$umail,$upass)){	
					$user->redirect('reg.php?joined');
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
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>

<div class="signin-form">

<div class="container">
    	
        <form method="post" class="form-signin">
            <h2 class="form-signin-heading">Inregistrare</h2><hr />
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
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Inregistrare cu success <a href='index.php'>logare</a>
                 </div>
                 <?php
			}
			?>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_uname" placeholder="Username" value="<?php if(isset($error)){echo $uname;}?>" />
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_umail" placeholder="E-Mail" value="<?php if(isset($error)){echo $umail;}?>" />
            </div>
            <div class="form-group">
            	<input type="password" class="form-control" name="txt_upass" placeholder="Password" />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;Inregistrare
                </button>
            </div>
            <br />
            <label>Ai deja un cont?! <a href="index.php">Logheazate</a></label>
        </form>
       </div>
</div>

</div>

</body>
</html>