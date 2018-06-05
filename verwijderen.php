<?php

include("login-check.php");

include("includes/db_conn.php");

if (!isset ($_GET["id"])) {
	//als url parameter niet werd meegegeven ga trug naar admin
	header('Location: admin.php');
	exit;
}


$sql = "DELETE from producten WHERE id=" .$_GET['id']." LIMIT 1";

if ($result = mysqli_query($db,$sql)) {
echo "De Query ".$sql." is met succes uitgevoerd<br>";
header('Location: admin.php');
	exit;
}else{
echo "FOUT: Query kon niet uitgevoerd worden"; 
	exit;
}




//STEP 4: verbinding met database sluiten
	if (!mysqli_close($db)) {
    echo "FOUT: De verbinding kon niet worden gesloten"; 
    exit;
}

?>