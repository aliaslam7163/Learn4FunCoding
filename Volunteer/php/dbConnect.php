<?
	$serverName = "DESKTOP-V1L84JK\PERSONALDB";
	$userName = "sa";//placeholder
	$myPass = "xbox2006";//placholder
	$myDB="VolunteerDB";//DB for Volunteer Website
	$connect = odbc_connect("DRIVER={ODBC Driver 11 for SQL SERVER};Server=$serverName;Database=$myDB",$userName,$myPass);//SQL Connection
?>