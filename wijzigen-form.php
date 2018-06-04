<?php
//stap 1b: bestand db_conn.php insluiten
include("includes/db_conn.php");


//STEP 2: queries uitvoeren

$query = "SELECT * FROM producten WHERE id=".$_GET["id"];
$resultlezen = mysqli_query($db, $query);


$rij = mysqli_fetch_array($resultlezen);

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="PoshKey is een biologisch drankje, bedoeld als vervanging van alcohol. Blijf klassevol en nuchter.">
    <meta name="keywords" content="PoshKey, poshkey, Poshkey, poshKey, drank, drink, alcohol-vrij, alcohol vrij, glazen fles, mango banaan, aardbei sinaasappel, appel kiwi, aardbei appelsien">
    <meta name="author" content="PoshKey Inc.">
    <title>PoshKey</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.gif" type="image/gif">   

    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/dist/main.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet">
</head>
<body>
    <nav class="nav fixed-top mx-auto">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-md-7 col-sm-7">
			     	<a href="index.php" title="terug naar de homepage"><img class="logoimg" src="images/logo.png" alt="logo"></a>
			    </div>
			    <div class="col-md-5 mrg-top col-sm-5">
			    	<a class="nav-link" href="#">nieuwsbrief</a>
			      <a class="nav-link" href="admin.php#prods">Producten</a>
					<a class="nav-link" href="cart.php">Koop nu</a>
					<a class="nav-link" href="contact.php">contact</a>
			    </div>
			</div>
		</div>	
	</nav>

	<main class="container">
		<section id="contact-form" style="margin-top: 150px; margin-bottom: 200px;">
            <h2 class="subtitle">Wijzig informatie</h2>

			<form action="wijzigen.php?id=<?php echo $_GET['id']; ?>" method="post">

					<label for="naam">Naam product:</label><br>
					<input type="text" name="naam" id="naam" autofocus required value="<?php echo $rij['naam'];?>">
					<br><br>
					<label for="beschrijving">Beschrijving product:</label><br>
					<textarea name="beschrijving" id="beschrijving" rows="8" cols="50"> <?php echo $rij['beschrijving'];?> </textarea>
					<br><br>
					<label for="prijs">Prijs product:</label><br>
					<input type="number" name="prijs" id="prijs" required value="<?php echo $rij['prijs'];?>">
					<br><br><br>
					

					<input class="btn btn-light btn-pink" type="submit" name="submit" id="submit" value="submit">
					
				</form>
<?php
// stap 4: De verbinding met de database sluiten  

if (!mysqli_close($db)) {
    echo "FOUT: De verbinding kon niet worden gesloten"; 
    exit;
}
?>


</main>
    <script src="js/dist/main.min.js"></script>
    <footer class="footer"><p>Nele Van Nevel - 7SWM<br>Viso Mariakerke</p></footer>
</body>
</html>