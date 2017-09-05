<?php

	/* Login Variables for Mysql*/
	$serverName = 'localhost';
	$username = "root";
	$password = "";
	
	/*Register Variables for Insitution*/
	$instituteName = $_POST['instituteName'];
	$instituteUN = $_POST['instituteUN'];
	$instituteAddr = $_POST['instituteAddr'];

	/*Create Connection to localhost mysql account */
	$conn = new PDO("mysql:dbname=mysql;host=127.0.0.1",$username,$password);
	
	/*Script to check if data already exists OR Create new Institution */
	$stmt = $conn->prepare('
							Select * from institutions where Username = "'.$instituteUN.'" and address = "'.$instituteAddr.'"		
						  ');	
	/* Execute the Query Above */
	$stmt->execute();
	
	/*Grab all the results back from the query   	*/
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	print_r($result);
?>