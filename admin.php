<?php
//stap 1b: bestand db_conn.php insluiten
include("login-check.php");
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
			     	<a href="admin.php" title="terug naar de homepage"><img class="logoimg" src="images/logo.png" alt="logo"></a>
			    </div>
			    <div class="col-md-5 mrg-top col-sm-5">
			    	<a class="nav-link" href="nieuwsbrief.php">nieuwsbrief</a>
			      	<a class="nav-link" href="admin.php#prods">Producten</a>
			      	<a class="nav-link" href="logout.php">Logout</a>
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
				<p class="txt">Hier bij PoshKey streven wij naar hoge kwaliteit voor een diplomatische prijs. Onze dranken worden geserveerd in glazen flessen omdat het beter is voor het milieu, de kurk is bovendien ook geproduceerd met gerecycleerde materialen.
				Momenteel hebben wij drie verschillende smaken op de markt maar we hopen dat we ons aanbod kunnen uitbreiden zodat iedereen zeker wat wils heeft.</p>
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

	<section class="products" id="prods">
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
						<a class=\"btn btn-light \" href=\"wijzigen-form.php?id={$rij['id']}\"><span><img src=\"images/wijzigen.png\"></span>  wijzigen</a>
						<a class=\"btn btn-light \" href=\"verwijderen.php?id={$rij['id']}\" onclick=\"return confirm('Ben je zeker dat je dit product wil verwijderen?')\"><span><img src=\"images/trash.png\"></span>  verwijderen</a> 
						
					</div>
				</div>
			</div>";
    }

}else {
	echo "<p>Er werden geen gegevens gevonden in de DB</p>";	
} // einde if (mysqli_num_rows($result) > 0)
?>		
	  				
	
			</div>
					
	  			<a class="btn btn-light " href="toevoegen-form.php"><span><img src="images/add.png"></span>  toevoegen</a>	
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