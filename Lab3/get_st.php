<?php
	require_once("session.php");
	
	require_once("class.user.php");	 
	
	include_once 'dbconfig.php';
	
	if (isset($_REQUEST['id'])) {
			
		$id = intval($_REQUEST['id']);
		$query = "SELECT * FROM members WHERE user_id=:id";
		$stmt = $conn->prepare($query);
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
			
		?>
			
		<div class="table-responsive">
		
		<table class="table table-striped table-bordered">
		    <tr>
			    <th>Prenume</th>
				<td><?php echo $first_name; ?></td>
			</tr>
			<tr>
				<th>Nume</th>
				<td><?php echo $last_name; ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?php echo $email; ?></td>
			</tr>
			<tr>
				<th>Specialitatea</th>
				<td><?php echo $position; ?></td>
			</tr>
			<tr>
				<th>Grupa</th>
				<td><?php echo $grupa; ?></td>
			</tr>
		</table>
		<a id="btn_delete" class="btn btn-danger" href="delete.php?id=<?php echo $row['user_id']; ?>" title="click for delete" onclick="return confirm('Singur doriti sa stergeti?')"><span class="glyphicon glyphicon-remove-circle"></span> Sterge</a>

		</div>
		<?php				
	}
	
		
	