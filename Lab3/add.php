<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	
if(isset($_POST['btn-save']))
{
 
 $first = strip_tags($_POST['first_name']);
 $last = strip_tags($_POST['last_name']);
 $email = strip_tags($_POST['email']);
 $position = strip_tags($_POST['position']);
 $grupa = strip_tags($_POST['grupa']);
 
if($position == "Tehnologii Informationale") 
{
$grupa = "TI-$grupa";

}else if($position == "Informatica Aplicata")
{
$grupa = "IA-$grupa";	

}else if($position == "Management Informational")
{
$grupa = "MN-$grupa";

}else if($position == "Calculatoare") 
{
$grupa = "C-$grupa";
		
}else
{
$grupa = "$grupa";	
}	

 
 if($first=="")	{
		$error[] = "Scrieti prenumele!";	
	}
	else if($last=="")	{
		$error[] = "Scrieti numele!";	
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Scrieti un email valid!';
	}
	else if($position=="")	{
		$error[] = "Alegeti specialitatea!";
	}
	else if($grupa==""){
		$error[] = "Scireti grupa!";	
	}
	else
	{
		try
		{
			$stmt = $auth_user->runQuery("SELECT email FROM members WHERE email=:uemail");
			$stmt->execute(array(':uemail'=>$email));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['email']==$email) {
				$error[] = "Acest email este deja in baza de date!";
			}
			
			else
			{
				if($auth_user->add($first,$last,$email,$position,$grupa)){	
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
<title>Buna - <?php print($userRow['user_email']); ?></title>
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
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Salut <?php echo $userRow['user_email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/profil.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Profil</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-check"></span>&nbsp;Adaugare Membri</a></li>
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Iesire</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

	<div class="clearfix"></div>
	
    <div class="container-fluid" style="margin-top:180px;">
	
    <div class="container">
    
    	
        
        
 <script>
  function maxLengthCheck(object) {
    if (object.value.length > object.max.length)
      object.value = object.value.slice(0, object.max.length)
  }
  
</script>       
        
       <center> <div id="alert_add" class="alert alert-info"><center><h5>Adaugare in baza de date a unui nou student</h5></center></div> </center>
        
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
                      <i class="glyphicon glyphicon-ok"></i> &nbsp; Adaugare cu success
                 </div> </center>
				
                 <?php
			}
			?>
    <tr>
    <td align="center"><a href="/profil.php"><h4>Inapoi</h4></a></td>
    </tr>
    <tr>
    <td><input type="text" name="first_name" class="form-control" placeholder="Prenume"  value="<?php if(isset($error)){echo $first;}?>" required /><br /></td>
    </tr>
    <tr>
    <td><input type="text" name="last_name" class="form-control" placeholder="Nume" value="<?php if(isset($error)){echo $last;}?>" required /><br /></td>
    </tr>
	<tr>
    <td><input type="text" name="email" class="form-control" placeholder="Email" value="<?php if(isset($error)){echo $email;}?>" required /><br /></td>
    </tr>
	<tr>
    <td> <select class="form-control" name="position" data-placeholder="Specialitatea" tabindex="5">
              <option value="<?php if(isset($error)){echo $position;}?>" selected>--Specialitatea--</option>
			  <option value="Tehnologii Informationale">Tehnologii Informationale</option>
			  <option value="Informatica Aplicata">Informatica Aplicata</option>
			  <option value="Management Informational">Management Informational</option>
			  <option value="Calculatoare">Calculatoare</option>
			  </select><br /></td>
    </tr>
    <tr>
    <td><input type="number" name="grupa" class="form-control" placeholder="Nr. Grupei" value="<?php if(isset($error)){echo $grupa;}?>" oninput="maxLengthCheck(this)"  min = "1" max = "999" required /><br /></td>
    </tr>
    <tr>
    <td><button type="submit" class="btn btn-info" name="btn-save"><strong>Salveaza</strong></button></td>
    </tr>
    </table>
    </form>
        
        
        
        
        
    
    </div>


<script src="/assets/jquery-1.12.4.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>



    
    </div>

</div>





</body>
</html>
