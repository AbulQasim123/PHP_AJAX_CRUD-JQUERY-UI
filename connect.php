<?php
	$connect = new PDO("mysql:host = localhost; dbname=weblesson_crud_ajax", "root", "");
	if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        // code gone here
    }
?>