<?php
	$serverName = "localhost";
	$username = "root";
	$password = "xbox2006";
	
	/*try
	{
		$conn = new PDO("mysql:dbName=MemberProfile;host=$serverName",$username,$password);
		//set the PDO error mode exception
		
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo "Connected Successfully";
	}
	catch(PDOException $err)
	{
		echo "Connection Failed: " . $err->getMessage();
	}*/
	$conn = new PDO("mysql:dbName=memberprofile;host=localhost",$username,$password);
	if ($db->getAttribute(PDO::ATTR_DRIVER_NAME)=='mysql'){
		$stmt = $db->prepare('select * from MemberProfile',
			array(PDO::MYSQL_ATT_USE_BUFFERED_QUERY => true));
	}
	else{
		die ("my app died");
	}
	?>