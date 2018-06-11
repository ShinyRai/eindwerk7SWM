<?php
if (empty($_GET["id"])){
	// als de url-parameter niet werd meegegeven ga terug naar index.php
	header("Location:index.php");
	exit;
}


//stap 1b: bestand db_conn.php insluiten
include("includes/db_conn.php");

// SQL-injectie voorkomen
	// 1) zet integers om met (int) $_POST['naamveld']
	$_GET['id'] = (int) $_GET['id'];
	$_POST['nieuwsbrief'] = (boolean) $_POST['nieuwsbrief'];

// stap 2: De query opstellen en uitvoeren

$query = "UPDATE users SET nieuwsbrief = 0 WHERE id = {$_GET['id']}";

if (!$result = mysqli_query($db,$query)) {
    echo "FOUT: Query kon niet uitgevoerd worden"; 
	exit;
}

// stap 3: niet nodig - we lezen niets uit de database

// stap 4: De verbinding met de database sluiten  

if (!mysqli_close($db)) {
    echo "FOUT: De verbinding kon niet worden gesloten"; 
    exit;
}


// stap 5: Terugkeren naar admin.php  
header("Location:index.php");
exit;