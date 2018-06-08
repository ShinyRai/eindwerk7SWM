<?php

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

?>