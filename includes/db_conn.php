<?php
	//initialisatie

	define("DB_SERVER", "localhost");
	define("DB_USER", "vanneveln");
	define("DB_PASS", "yA5b6CLN");
	define("DB_NAME", "vanneveln");


	//STEP 1: connecteren met database  ! = not
	if(!$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)){
		echo "er kan geen verbinding worden gemaakt met de DB";
		exit;
	}

?>