<?php
	require_once("session.php");
	
	require_once("class.user.php");	 
	
	include_once 'dbconfig.php';
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
	if (isset($_REQUEST['id'])) {
			
		$id = intval($_REQUEST['id']);
		$query = "SELECT * FROM news WHERE news_id=:id";
		$stmt = $conn->prepare($query);
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
			
		?>
			
		<div class="table-responsive">
		
		<table class="table table-striped table-bordered">
		    <tr>
			    <th><?php echo $lang[$default]['news_cont_title']; ?></th>
				<td><?php echo $title; ?></td>
			</tr>
			<tr>
				<th><?php echo $lang[$default]['news_cont_aut']; ?></th>
				<td><a href="/user.php?name=<?php echo $author; ?>"><?php echo $author; ?></a></td>
			</tr>
			
			<tr>
				<th></th>
				<td><?php echo $full; ?></td>
			</tr>
			<tr>
				<th><?php echo $lang[$default]['news_cont_date']; ?></th>
				<td><?php echo $date; ?></td>
			</tr>
		</table><?php if($strow['level'] == 2){?>
		<a id="btn_delete" class="btn btn-danger" href="delete.php?id=<?php echo $row['news_id']; ?>" title="<?php echo $lang[$default]['news_cont_title']; ?>" onclick="return confirm('<?php echo $lang[$default]['news_cont_alert']; ?>')"><span class="glyphicon glyphicon-remove-circle"></span> <?php echo $lang[$default]['news_cont_delete']; ?></a>
        <?php }?>
		</div>
		<?php				
	}
	
		
	