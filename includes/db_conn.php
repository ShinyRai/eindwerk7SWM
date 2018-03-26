<?php
	//initialisatie

	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "poshkey");


	//STEP 1: connecteren met database  ! = not
	if(!$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)){
		echo "er kan geen verbinding worden gemaakt met de DB";
		exit;
	}

?>