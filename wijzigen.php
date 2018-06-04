<?php
if (empty($_GET["id"])){
	// als de url-parameter niet werd meegegeven ga terug naar admin.php
	header("Location:admin.php");
	exit;
}

if (empty($_POST["naam"]) && empty($_POST["beschrijving"]) && empty($_POST["prijs"]) ){
	// als de url-parameter niet werd meegegeven ga terug naar admin.php
	echo "Niet alle verplichte velden werden ingevuld.";
	exit;
}

//stap 1b: bestand db_conn.php insluiten
include("includes/db_conn.php");

// SQL-injectie voorkomen
	// 1) zet integers om met (int) $_POST['naamveld']
	$_GET['id'] = (int) $_GET['id'];
	$_POST['prijs'] = (double) $_POST['prijs'];
	
	// 2) met mysqli_real_escape_string($conn, $_POST['naamveld']
	$_POST['naam'] = mysqli_real_escape_string($db, $_POST['naam']);
	$_POST['beschrijving'] = mysqli_real_escape_string($db, $_POST['beschrijving']);
	$_POST['prijs'] = mysqli_real_escape_string($db, $_POST['prijs']);


// stap 2: De query opstellen en uitvoeren

$query = "UPDATE producten SET naam = '{$_POST['naam']}', beschrijving = '{$_POST['beschrijving']}', prijs = {$_POST['prijs']} WHERE id = {$_GET['id']}";

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
header("Location:admin.php");
exit;