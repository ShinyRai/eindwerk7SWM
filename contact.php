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

	<main class="container">
		<section id="contact-form" style="margin-top: 150px; margin-bottom: 200px;">

			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<label for="voorn">Voornaam<span class="red">*</span></label>
        		<input type="text" name="voorn" id="voorn" required autofocus>
        		<br>
        		<label for="achtern">Achternaam<span class="red">*</span></label>
        		<input type="text" name="achtern" id="achtern" required>
     			<br>
		        <label for="email">Email<span class="red">*</span></label>
		        <input type="email" name="email" id="email" required>
		  		<br>
		        <label for="bericht">Vraag<span class="red">*</span></label>
		        <textarea name="bericht" id="bericht"></textarea>
		    	<br><br>
		        <input type="submit" value="verzenden">
			</form>
			
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

<?php
// validatie
if(isset($_POST['voorn'])&&isset($_POST['achtern'])&&isset($_POST['email'])&&isset($_POST['bericht'])){
  
    $_POST['voorn'] = htmlspecialchars($_POST['voorn']);
    $_POST['achtern'] = htmlspecialchars($_POST['achtern']);
    $_POST['email'] = htmlspecialchars($_POST['email']);
    $_POST['bericht'] = htmlspecialchars($_POST['bericht']);
  
    $to = $_POST["email"];
    $subject = "contact via site";

    $message = "
    <html>
    <head>
    <title>Contact via site</title>
    </head>
    <body>
    <p>This email contains HTML Tags!</p>
    <table>
    <tr>
    <th>Voornaam</th>
    <th>Achternaam</th>
    <th>E-mail</th>
    <th>Bericht</th>
    </tr>
    <tr>
    <td>".$_POST["voorn"]."</td>
    <td>".$_POST["achtern"]."</td>
    <td>".$_POST["email"]."</td>
    <td>".$_POST["bericht"]."</td>
    </tr>
    </table>
    </body>
    </html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <dekesels@visocloud.org>' . "\r\n";
    $headers .= 'Cc: test@visocloud.org' . "\r\n";

    if(mail($to,$subject,$message,$headers)){
        echo "<p>Bericht verstuurd</p>";
      } else {
        echo "<p>Fout bij het versturen van e-mail</p>";
      }
  
}
 
?>

