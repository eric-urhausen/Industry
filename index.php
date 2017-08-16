<?php 
	// This is necessary when index.php is not in the root folder, but in some subfolder...
	// We compare $requestURL and $scriptName to remove the inappropriate values
	$requestURI = explode('/', $_SERVER['REQUEST_URI']);
	$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
	 $con=mysql_connect($host, $username,$password);
        mysql_select_db($db,$con);
	for ($i= 0; $i < sizeof($scriptName); $i++)
	{
	    if ($requestURI[$i] == $scriptName[$i])
	    {
	        unset($requestURI[$i]);
	    }
	}
	$command = array_values($requestURI);
	
	
	if($command[0]){
		require_once("profile.php");
		profile($command[0]);
	}
	else{
		require_once("create.php");
	}
?>

