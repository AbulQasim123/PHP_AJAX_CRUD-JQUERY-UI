<?php
	include 'connect.php';

			// Insert data process
	if (isset($_POST['action'])) 
	{
		if($_POST["action"] == "insert")
		{
			$query = "INSERT INTO table_sample(first_name, last_name) VALUES ('".$_POST["first_name"]."', '".$_POST["last_name"]."')";
			$statement = $connect->prepare($query);
			if ($statement->execute()) {
				echo '<p>Data Inserted...</p>';
			}else{
				echo "<p>Somethings went wrong.</p>";
			}
		}
				// Read data process
		if ($_POST['action'] == "read")
		{

			$query = "select * from table_sample where id = '".$_POST['view_id']."' ";
			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			$total_row = $statement->rowCount();
			
			$output = '<table class="table table-striped table-bordered table-sm ">';
			if ($total_row > 0)
			{
				foreach ($result as $row)
				{
					$output.= '<tr>
									<th>Id</th>
									<td>'.$row['id'].'</td>
								</tr>';
					$output.= 	'<tr>
									<th>First name</th>
									<td>'.$row['first_name'].'</td>
								</tr>';
					$output.= 	'<tr>
									<th>Last name</th>
									<td>'.$row['last_name'].'</td>
								</tr>';		
								
				}
			}
			$output.= '</table>';
			echo $output;
		}
				// Edit data process
		if ($_POST['action'] == 'fetch_single')
		{
			$query = "select * from table_sample where id = '".$_POST["edit_id"]."' ";  

			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			foreach ($result as $row) {
				$output['first_name'] = $row['first_name'];
				$output['last_name'] = $row['last_name'];
			}
			echo json_encode($output);
		}
				// Update data process
		if ($_POST['action'] == 'update')
		{
			$query = "UPDATE table_sample SET first_name = '".$_POST["first_name"]."', last_name = '".$_POST["last_name"]."' WHERE id = '".$_POST["hidden_id"]."' ";
			$statement = $connect->prepare($query);
			$statement->execute();
			echo "<p class='text-primary' style='font-size:20px;'>Data updated</p>";
		}
				// Delete data process
		if ($_POST['action'] == 'delete')
		{
			$query = "DELETE FROM table_sample WHERE id = '".$_POST['del_id']."' ";
			$statement = $connect->prepare($query);
			$statement->execute();
			echo "<p>Data Deleted</p>";
		}
	}

	
?>