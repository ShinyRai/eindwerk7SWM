
<?php

include("includes/db_conn.php");

	//validatie, als deze zijn ingevuld doe dan..
	if (isset($_POST['naam']) && isset($_POST['beschrijving']) && isset($_POST['prijs']) ){

		$_POST['naam'] = mysqli_real_escape_string($db, $_POST['naam']);
		$_POST['beschrijving'] = mysqli_real_escape_string($db, $_POST['beschrijving']);
		$_POST['prijs'] = mysqli_real_escape_string($db, $_POST['prijs']);

		$sql = "INSERT INTO producten (naam, beschrijving, prijs)
		VALUES ('{$_POST['naam']}',
				'{$_POST['beschrijving']}',
				'{$_POST['prijs']}')";

		if ($resulttoevoegen = mysqli_query($db,$sql)) {
		echo "De Query ".$sql." is met succes uitgevoerd<br>";
		header('Location: admin.php');

		}else{
		echo "FOUT: Query kon niet uitgevoerd worden"; 
			exit;
		}



	}

?>

