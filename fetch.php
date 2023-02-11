<?php
	include 'connect.php';
	$query = "select * from table_sample";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '<table class="table table-striped table-bordered table-sm my-2">
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>View</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>';
	if ($total_row > 0) {
		foreach ($result as $row) {
			$output .= '<tr>
				<td width="40%">'.$row['first_name'].'</td>
				<td width="40%">'.$row['last_name'].'</td>
				<td width="10%"><button type="button" name="view" class="btn btn-info btn-sm view" 				id="'.$row["id"].'">View</button></td>
				<td width="10%"><button type="button" name="edit" class="btn btn-primary btn-sm edit" id="'.$row["id"].'">Edit</button></td>
				<td width="10%"><button type="button" name="delete" class="btn btn-danger btn-sm delete" id="'.$row["id"].'">Delete</button></td>
			</tr>';
		}		
	}else{
		$output .= '<tr><td colspan="5" align="center" style="text-align:center; color: blue; font-size: 20px;">Data not found</td></tr>';
	}
	$output .= '</table>';
	echo $output;

?>