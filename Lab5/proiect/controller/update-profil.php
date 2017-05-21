<?php
    ini_set("display_errors",1);
    require_once("../session.php");
    require_once("../class.user.php");
	require_once '../dbconfig.php';
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$strow=$stmt->fetch(PDO::FETCH_ASSOC);
	
    if(isset($_POST)){
        require_once '../dbconfig.php';
        $Destination = '../userfiles/avatars';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'default.png';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum   = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        $sql5="UPDATE users SET avatar='$NewImageName' WHERE user_id = '".$user_id."'";
        $sql6="INSERT INTO users (avatar) VALUES ('$NewImageName') WHERE user_id = '".$user_id."'";
        $result = $conn->prepare("SELECT * FROM users WHERE user_id = '".$user_id."'");
		$result->execute();
        if( $num_rows = $result->fetchColumn() > 0) {
            if(!empty($_FILES['ImageFile']['name'])){
                $result = $conn->prepare($sql5)or die(mysqli_error($conn));
				$result->execute();
                header("location:../edit-profile.php?user_name=".$strow['user_name']."");
            }
        } 
        else {
            $result = $conn->prepare($sql6)or die(mysqli_error($conn));
			$result->execute();
            header("location:../edit-profile.php?user_name=".$strow['user_name']."");
        }  
        $name=$_POST['name'];
        $prename=$_POST['prename'];
        $user_email=$_POST['user_email'];
        //$user_pass=$_POST['user_pass'];
		$user_dob=$_POST['user_dob'];
        $user_profession=$_POST['user_profession'];
        $user_address=$_POST['user_address'];
        $user_gender=$_POST['user_gender'];
        $user_country=$_POST['user_country'];
		
        
		
        
           if($auth_user->editprofile($user_id,$name,$prename,$user_email,$user_dob,$user_profession,$user_address,$user_gender,$user_country)){	
					header("location:../edit-profile.php?user_name=".$strow['user_name']."&request=profile-update&status=success");
				}
	
    }    
?>