<?php
//stap 1b: bestand db_conn.php insluiten
include("includes/db_conn.php");
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
			     	<a href="index.html" title="terug naar de homepage"><img class="logoimg" src="images/logo.png" alt="logo"></a>
			    </div>
			    <div class="col-md-5 mrg-top col-sm-5">
			      <a class="nav-link" href="producten.php">Producten</a>
					<a class="nav-link" href="cart.php">Koop nu</a>
					<a class="nav-link" href="contact.php">contact</a>
					<a href="cart.php"><img class="winkelkar" src="images/shopping_cart.svg" alt="shopping cart"></a>
			    </div>
			</div>
		</div>	
	</nav>

	<section class="intro">
		<img class="img-fluid" src="images/sfeerbeeld.png" alt="sfeerbeeld poshkey">
		<div class="header_quote">
			<h1 class="quote">"discover<br> the magic within"</h1>
			<button type="button" class="btn btn-light" data-toggle="modal" data-target=".video"><span><img src="images/play_button.svg"></span> ONTDEK NU</button>
		</div>

<!-- Modal -->
		<div class="modal fade video" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
      <iframe height="600px" src="https://www.youtube.com/embed/f7MXckP5j6M?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      
    </div>
  </div>
</div>

	</section>

	<main class="container">
		<section class="aboutus row">
			<div class="col txt_block">
				<h2 class="subtitle">over ons</h2>
				<p class="txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<button type="button" class="btn btn-pink"><a href="contact.php">CONTACTEER ONS</a></button>
			</div>

			<div class="col img_block">
				<img class="fles_hover" src="images/flesgreen.png">
				<img class="rel roze" src="images/logoroze.png" alt="aardbei x sinaasappel">
				<img class="rel geel" src="images/logogeel.png" alt="mango x banaan">
				<img class="rel groen" src="images/logogroen.png" alt="appel x kiwi">
			</div>
			
		</section>

<?php
	$query = "SELECT * FROM producten";

	if (!$result = mysqli_query($db,$query)) {
    	echo "FOUT: Query kon niet uitgevoerd worden"; 
		exit; 
	}
?>

	<section class="products">
		<div class="row ">
				
<?php 
// stap 3: De resultaten naar het scherm schrijven

if (mysqli_num_rows($result) > 0) {
    while ($rij = mysqli_fetch_array($result)) {
        echo "<div class=\"col d-flex align-items-stretch\">
				<div class=\"card\">
					<img class=\"card-img-top\" src=\"images/{$rij['afb']}\" alt=\"{$rij['naam']}\">
					<div class=\"card-body\">
						<p class=\"card-text\">
						<h3>{$rij['naam']}</h3>{$rij['beschrijving']}</p>
						<a class=\"btn btn-light \" href=\"wijzigen.php?id={$rij['id']}\"><span><img src=\"images/wijzigen.png\"></span>  wijzigen</a>
					</div>
				</div>
			</div>";
    }

}else {
	echo "<p>Er werden geen gegevens gevonden in de DB</p>";	
} // einde if (mysqli_num_rows($result) > 0)
?>		
	  					
	  					
	
			</div>
			<div class="row">
				<div class="col-12 d-flex justify-content-center">
					<a href="cart.php" class="btn btn-pink">KOOP NU</a>
				</div>
			</div>

		</section>
		
		
	</main>
	<script src="js/dist/main.min.js"></script>
	<footer class="footer"><p>Nele Van Nevel - 7SWM<br>Viso Mariakerke</p></footer>
</body>
</html>

<?php
// stap 4: De verbinding met de database sluiten  

if (!mysqli_close($db)) {
    echo "FOUT: De verbinding kon niet worden gesloten"; 
    exit;
}
?>