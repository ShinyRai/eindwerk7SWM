<?php
if (empty($_POST["dvd_id"])){
	// als de url-parameter niet werd meegegeven ga terug naar admin.php
	header("Location:admin.php");
	exit;
}

if (empty($_POST["naam"]) && empty($_POST["acteurs"]) && empty($_POST["regisseur"]) ){
	// als de url-parameter niet werd meegegeven ga terug naar admin.php
	echo "Niet alle verplichte velden werden ingevuld.";
	exit;
}

//stap 1b: bestand db_conn.php insluiten
include("includes/db_conn.php");

// SQL-injectie voorkomen
	// 1) zet integers om met (int) $_POST['naamveld']
	$_POST['dvd_id'] = (int) $_POST['dvd_id'];
	$_POST['waardering'] = (int) $_POST['waardering'];
	
	// 2) met mysqli_real_escape_string($conn, $_POST['naamveld']
	$_POST['naam'] = mysqli_real_escape_string($conn, $_POST['naam']);
	$_POST['acteurs'] = mysqli_real_escape_string($conn, $_POST['acteurs']);
	$_POST['regisseur'] = mysqli_real_escape_string($conn, $_POST['regisseur']);
	$_POST['categorie'] = mysqli_real_escape_string($conn, $_POST['categorie']);
	$_POST['prijs'] = mysqli_real_escape_string($conn, $_POST['prijs']);
	$_POST['jaartal'] = mysqli_real_escape_string($conn, $_POST['jaartal']);
	$_POST['duur'] = mysqli_real_escape_string($conn, $_POST['duur']);
	$_POST['inhoud'] = mysqli_real_escape_string($conn, $_POST['inhoud']);
	$_POST['foto'] = mysqli_real_escape_string($conn, $_POST['foto']);


// stap 2: De query opstellen en uitvoeren

$query = "UPDATE dvd SET naam = '{$_POST['naam']}', acteurs = '{$_POST['acteurs']}', regisseur = '{$_POST['regisseur']}', categorie = '{$_POST['categorie']}', prijs = '{$_POST['prijs']}', jaartal = '{$_POST['jaartal']}', duur = '{$_POST['duur']}', inhoud = '{$_POST['inhoud']}', waardering = {$_POST['waardering']}, foto = '{$_POST['foto']}' WHERE dvd_id = {$_POST['dvd_id']}";

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