<? 
	//include_once 'dbConnect.php';
	global $return;
	global $connect;
	global $user;
	global $pass;
	$serverName = "DESKTOP-V1L84JK\PERSONALDB";
	$connectionInfo = array("Database"=>"VolunteerDB");
	$conn = sqlsrv_connect($serverName,$connectionInfo);
	echo("Sucess");
	$sqlQuery = 'Select Name, Username from MemberProfile where Username="aliaslam7163"';
	
	$return = odbc_exec($connect,$sqlQuery);
	echo('Hello World');
	odbc_close($connect);


?>