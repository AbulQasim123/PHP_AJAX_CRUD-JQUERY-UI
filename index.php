<?php
	include 'connect.php';
	include 'script.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="jquery\jquery.js"></script>
	<script type="text/javascript" src="bootstrap-4.0.0-dist\js\bootstrap.js"></script>
	<script type="text/javascript" src="jquery-ui-1.13.1\jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist\css\bootstrap.css">
	<link rel="stylesheet" type="text/css" href="jquery-ui-1.13.1\jquery-ui.css">
	<title>Ajax Crud Application</title>
	<style type="text/css">
		.ui-dialog-titlebar{
			background: skyblue;
		}
		#user_dialog{
			background: #eee;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="text-center" style="font-size: 25px;">Ajax Crud Application</h1>
		<hr style="border-color: black; width:400px;">
		<div align="right" style="margin-bottom: 5px;">
			<button type="button" name="add" id="add" class="btn btn-primary btn-sm">Add</button>
		</div>
		<div class="table-responsive" id="user_data" ></div>
	</div>
	<div id="user_dialog" title="Add Data"> 
		<form method="post" id="user_form"> 
			<div class="form-group">
				<label for="first_name">First name</label>
				<input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name">
				<span id="error_first_name" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label for="last_name">Last name</label>
				<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name">
				<span id="error_last_name" class="text-danger"></span>
			</div>
			<div class="form-group">
				<input type="hidden" name="action" id="action" value="insert">
				<input type="hidden" name="hidden_id" id="hidden_id">
				<input type="submit" name="form_action" id="form_action" value="Insert" class="btn btn-info btn-sm">
			</div>
		</form>
	</div>
	<div id="action_alert" title="Action"></div>
	<div id="delete_confirmation" title="Confirmation">
		<p>Are you sure you want to delete this ?</p>
	</div>
</body>
</html>