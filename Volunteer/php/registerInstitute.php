<?php
	header("Access-Control-Allow-Origin:*");
	require 'C:\xampp\htdocs\Volunteer\php\password.php';
	/* Login Variables for Mysql*/
	 $serverName = 'localhost';
	 $username = "root";
	 $password = "";
	 $existance=0;
	
	//TEST VARIABLES 
	$instituteName = 'STEM';
	$instituteID = 3;
	$instituteUN = 'Boogey';
	$institutePass = 'password';
	$instituteAddr = 'ADD';
	$instituteAff = 'AFF';
	$dateTime = '07/13/1990 12:34:54';
	$eventName = 'Walk for Aida';
	$eventDate = '07/13/1990 12:34:54';
	$eventAddr = 'Sammamish High cool';
	$totalMember = 10;
	$phpMethod = 5;
	
	/*
	//Register Variables for Insitution
	if(isset($_POST['instituteName']))
		$instituteName = $_POST['instituteName'];
	else
		$instituteName = '';
	if(isset($_POST['instituteUN']))
		$instituteUN = $_POST['instituteUN'];
	else
		$instituteUN = '';
	if(isset($_POST['institutePass']))
		$institutePass = $_POST['institutePass'];
	else
		$institutePass = '';
	if(isset($_POST['instituteAddr']))
		$instituteAddr = $_POST['instituteAddr'];
	else
		$instituteAddr = '';
	if(isset($_POST['instituteAff']))
		$instituteAff = $_POST['instituteAff'];
	else
		$instituteAff = '';
	if(isset($_POST['dateTime']))
		$dateTime = $_POST['dateTime'];
	else
		$dateTime = '';
	if(isset($_POST['phpMethod']))
		$phpMethod = $_POST['phpMethod'];
	else
		$phpMethod = 1;
	*/
	switch($phpMethod)
	{
		case 1:
			$existance = checkExists($instituteName,$instituteUN,$instituteAddr);
			if(count($existance) > 0)
				echo 'Account Already Exists';
			else
			{
				registerInstitute($instituteName,$instituteUN,$institutePass,$instituteAddr,$instituteAff,$dateTime);
				echo 'Account Registered';
			}				
			break;
		case 5:
			createEvent($instituteID,$instituteUN,$eventName,$eventAddr,$eventDate,$totalMember,$dateTime);
			break;
		case 6:
			verifyPass($instituteName,$instituteUN,$institutePass);
			break;
		default:
		echo ('hello world');
	}
 function checkExists($instituteName,$instituteUN,$instituteAddr)
 {
	global $username;// refers to global username variable in the script
	global $password;// refers to global username variable in the script
	/*Create Connection to localhost mysql account */
	$conn = new PDO("mysql:dbname=mysql;host=127.0.0.1",$username,$password);	
	/*Script to check if data already exists*/
						  $stmt = $conn->prepare('select * from institutionRegistry WHERE institution = "'.$instituteName.'" 
							AND Username = "'.$instituteUN.'" AND address = "'.$instituteAddr.'"
						  ');
	/* Execute the Query Above */
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	//echo $rowNum;
	return $result[0]; 
 }
 function registerInstitute($instituteName,$instituteUN,$institutePass,$instituteAddr,$instituteAff,$dateTime)
 {
	$password_class = new Password();
	$options = array('cost'=>10			
				);
	$institutePass = $password_class::password_hash($institutePass,PASSWORD_DEFAULT,$options);
	global $username;// refers to global username variable in the script
	global $password;// refers to global username variable in the script
	/*Create Connection to localhost mysql account */
	$conn = new PDO("mysql:dbname=mysql;host=127.0.0.1",$username,$password);	
	/*Script to check if data already exists OR Create new Institution */
	$stmt = $conn->prepare('Insert INTO institutionRegistry(Institution,Username,PassHash,Address,Affiliation,DateCreated)
							Select * from (Select "'.$instituteName.'","'.$instituteUN.'","'.$institutePass.'","'.$instituteAddr.'","'.$instituteAff.'","'.$dateTime.'") as tmp
							WHERE NOT EXISTS( Select institution,username,address from institutionRegistry 
							where institution = "'.$instituteName.'" and Username = "'.$instituteUN.'" and address = "'.$instituteAddr.'")
							LIMIT 1;
						  ');	
	/* Execute the Query Above */
	$stmt->execute();
	
	/*Grab all the results back from the query   Select * from institutions where Username = "'.$instituteUN.'" and address = "'.$instituteAddr.'"	*/
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 }
 
 function verifyPass($instituteUN,$institutePass)
 {
	$password_class = new Password();
	$options = array('cost'=>10			
				);
	$hashed = $password_class::password_hash($institutePass,PASSWORD_DEFAULT,$options);
	global $username;// refers to global username variable in the script
	global $password;// refers to global username variable in the script
	/*Create Connection to localhost mysql account */
	$conn = new PDO("mysql:dbname=mysql;host=127.0.0.1",$username,$password);	
	/*Script to check if data already exists OR Create new Institution */
	$stmt = $conn->prepare('select Username,PassHash,institute_id from institutionregistry
							where Username = "'.$instituteUN.'"
						  ');	
	/* Execute the Query Above */
	$stmt->execute();
	
	/*Grab all the results back from the query   Select * from institutions where Username = "'.$instituteUN.'" and address = "'.$instituteAddr.'"	*/
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	//print_r($result[0]['PassHash']);	
	
	if(password_verify($institutePass,$result[0]['PassHash']))
		echo 'Good Job';
	else
		echo 'Login Failed';
 }
 
 function createEvent($instituteID,$instituteUN,$eventName,$eventAddr,$eventDate,$totalMember,$dateTime){
	 
	 global $username;
	 global $password;
	 $totalSigned = 0;
	 $totalRemain = $totalMember;
	 $conn = new PDO("mysql:dbname=mysql;host=127.0.0.1",$username,$password);
	 /*$stmt = $conn->prepare('Insert into eventregistry(institution_id,Username,eventName,eventAddr,eventDate,totalMembers,totalSigned,totalRemain,DateCreated)
								Values(2,"'.$instituteUN.'","'.$eventName.'",
							"'.$eventAddr.'", "'.$eventDate.'","'.$totalMember.'",1,2, "'.$dateTime.'")
							');*/
	/*$stmt = $conn->prepare('Insert INTO eventregistry(institution_id,Username,eventName,eventAddr,eventDate,totalMembers,totalSigned,totalRemain,DateCreated)
							Select * from (Select "'.$instituteID.'","'.$instituteUN.'","'.$eventName.'","'.$eventAddr.'","'.$eventDate.'","'.$totalMember.'",
											"'.$totalSigned.'","'.$totalRemain.'","'.$dateTime.'") as tmp
							WHERE NOT EXISTS( Select institution_id,username,eventName,eventAddr from eventregistry 
							where institution_id = "'.$instituteID.'" and Username = "'.$instituteUN.'" and eventName = "'.$eventName.'" 
								  and eventAddr = "'.$eventAddr.'")
						  ');*/						
	 $stmt->execute();
	 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	 print_r($result);
						
 }
 
 

?>