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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
    <nav class="nav fixed-top mx-auto">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-7 col-sm-7">
                    <a href="index.php" title="terug naar de homepage"><img class="logoimg" src="images/logo.png" alt="logo"></a>
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
<main class="container">

<?php 
    $prijs_basis = 4.20;
    $prijs = number_format($prijs_basis, 2);
    

    $prijs_totaal = $aantal * $prijs_basis;
?>
    


	<form class="cart" method="GET">
        <h2 class="subtitle">winkelmandje</h2>
        <div class="row labels">
            <h3 class="label col-3">smaak</h3>
            <h3 class="label col-1">aantal</h3>
            <h3 class="label col-2">prijs</h3>
        </div>
        <div class="row">
            <p class="smaak col-3">AARDBEI x SINAASAPPEL</p>
            <p class="aantal col-1"><input min="0" class="nr-min" type="number" name="aantal1" id="aantal1" value= 0></p>
            <p class="prijs col-2"><?php echo $prijs ?> EUR / st.</p>
        </div>
        <div class="row">
            <p class="smaak col-3">MANGO x BANAAN</p>
            <p class="aantal col-1"><input min="0" class="nr-min" type="number" name="aantal2" id="aantal2" value= 0></p>
            <p class="prijs col-2"><?php echo $prijs ?> EUR / st.</p>
        </div>
        <div class="row">
            <p class="smaak col-3">APPEL x KIWI</p>
            <p class="aantal col-1"><input min="0" class="nr-min" type="number" name="aantal3" id="aantal3" value= 0></p>
            <p class="prijs col-2"><?php echo $prijs ?> EUR / st.</p>
        </div>
        <div class="row">
            <p class="smaak col-3"></p>
            <p class="aantal label col-1">TOTAAL</p>
            <p class="totaal col-2"><?php echo $prijs_totaal ?></p>
        </div>
    
    </form>

    <div class="row">
        <div class="col-6 ">
         <h2 class="subtitle">check-out</h2>
            <p class="label">persoonlijke gegevens</p>

            <input type="text" name="naam" id="naam" placeholder=" NAAM">

        </div>
        <div class="col-6 ">
            testo
        </div>
        
    </div>

<script>
        console.log( $("#aantal1").val() );

    </script>
	
	
</main>
<script src="js/dist/main.min.js"></script>
<footer class="footer mx-auto"><p>Nele Van Nevel - 7SWM<br>Viso Mariakerke</p></footer>
</body>
</html>















<?php
// validatie
if(isset($_POST['voorn'])&&isset($_POST['achtern'])&&isset($_POST['email'])&&isset($_POST['bericht'])){
  
    $_POST['voorn'] = htmlspecialchars($_POST['voorn']);
    $_POST['achtern'] = htmlspecialchars($_POST['achtern']);
    $_POST['email'] = htmlspecialchars($_POST['email']);
    $_POST['bericht'] = htmlspecialchars($_POST['bericht']);
  
    $to = "vanneveln@visocloud.org";
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

