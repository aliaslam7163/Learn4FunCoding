<?
	include_once 'dbConnect.php';
	global $result;
	global $connect;
	global $i;
	global $data = array();
	
	$UN = $_POST['username'];
	$pass = $_POST['pass'];
	
	/*header('Content-Type: application/json');
	if(!isset($_POST['functionName']))
	{
		$result['error'] = 'No Function Name!';
	}
	
	if(!isset($_POST['arguments'])) 
	{
		$result['error'] = 'No Function Arguments!';
	}
	
	if(!isset($_POST($result['error']))
	{
		switch($_POST['functionName'])
		{
			case 'login':
				if(!is_array($_POST['arguments']) || (count($_POST['arguments']) < 2))
				{
					$result['error'] = 'Error in Arguments!';
				}
				else
				{
					$result['result'] = login(($_POST['arugments'][0]), ($_POST['arguments'][1]));
				}
				break;
				
				default:
					$result['error'] = 'Function Not Found '.$_POST['functionName'].'!';
					break;
		}
	}
	
	public login($UN , $pass)
	{
		//function to call a sql server stored procedure
		//passing in the sql query and procedure parameters
		$myparams['Username'] = $UN;
		$myparams['Password'] = $pass;
		//set up the proc params array
		$procedure_params = array(
		array(&$myparams['Username'], SQLSRV_PARAM_OUT),
		array(&$myparams['password'], SQLSRV_PARAM_OUT));
		
		//EXECUTE SQL SERVER PROCEDURE -- following code create query for execution of sql server stored procedure
		
		$sql = "EXEC login_Institute @Username = ?, @password = ?";
		
		//php call to execute sql statement
		
		$stmt = sqlsrv_prepare($connect,$sql,$procedure_params);
		
	}*/
	
	$sqlstate = $dbh->prepare("Select from ")
	
	echo json_encode($result);	
?>