<?php 
session_start();


	if(isset($_POST['username']) && isset($_POST['password'])){
		$usern = $_POST['username'];
		$ww = $_POST['password'];

		if($usern =="admin" && $ww == "viso"){
			$_SESSION['username'] = $_POST['username'];
			header('Location: admin.php');
			
		}elseif ($usern == "" || $ww == ""){
			echo "vul alle gevraagde informatie in";
		}else{
			echo "verkeerde login";
		}
	}
?>

<?php
//stap 1b: bestand db_conn.php insluiten
include("includes/db_conn.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>login - PoshKey</title>

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
			      <a class="nav-link" href="index.php#prods">Producten</a>
					<a class="nav-link" href="cart.php">Koop nu</a>
					<a class="nav-link" href="contact.php">contact</a>
					<a href="cart.php"><img class="winkelkar" src="images/shopping_cart.svg" alt="shopping cart"></a>
			    </div>
			</div>
		</div>	
	</nav>
<main>

	<section class="login-form">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="username">Gebruikersnaam</label><br>
			<input type="text" name="username" id="username">
			<br>
			<label for="username">Wachtwoord</label><br>
			<input type="password" name="password" id="password">
			<br><br>
			<input type="submit" value="inloggen">
		</form>
		
	</section>


	



</main>
	<script src="js/dist/main.min.js"></script>
	<footer class="footer"><p>Nele Van Nevel - 7SWM<br>Viso Mariakerke</p></footer>
</body>
</html>