<?php
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
                  <a class="nav-link" href="index.php#prods">Producten</a>
                    <a class="nav-link" href="cart.php">Koop nu</a>
                    <a class="nav-link" href="contact.php">contact</a>
                    <a href="cart.php"><img class="winkelkar" src="images/shopping_cart.svg" alt="shopping cart"></a>
                </div>
            </div>
        </div>  
    </nav>
<main class="container">

<?php 

    //$query = "SELECT * FROM producten WHERE prijs";
    //$resultlezen = mysqli_query($db, $query);


    //$rij = mysqli_fetch_array($resultlezen);


    $prijs_basis = 4.20;
    $prijs = number_format($prijs_basis, 2);
    

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
            <p class="aantal col-1"><input min="0" class="nr-min productAmount" type="number" name="aantalAardbeiSinaas" id="aantalAardbeiSinaas" data-price="<?php echo $prijs ?>" value= 0></p>
            <p class="prijs col-2"><?php echo $prijs ?> EUR / st.</p>
        </div>
        <div class="row">
            <p class="smaak col-3">MANGO x BANAAN</p>
            <p class="aantal col-1"><input min="0" class="nr-min productAmount" type="number" name="aantalMangoBanaan" id="aantalMangoBanaan" data-price="<?php echo $prijs ?>" value= 0></p>
            <p class="prijs col-2"><?php echo $prijs ?> EUR / st.</p>
        </div>
        <div class="row">
            <p class="smaak col-3">APPEL x KIWI</p>
            <p class="aantal col-1"><input min="0" class="nr-min productAmount" type="number" name="aantalAppelKiwi" id="aantalAppelKiwi" data-price="<?php echo $prijs ?>" value= 0></p>
            <p class="prijs col-2"><?php echo $prijs ?> EUR / st.</p>
        </div>
        <div class="row">
            <p class="smaak col-3"></p>
            <p class="aantal label col-1">TOTAAL</p>
            <p class="totaal col-2">€ 0</p>
        </div>
    
    </form>

    <form class="row" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="col-6 ">
            <h2 class="subtitle">check-out</h2>
            <p class="label">persoonlijke gegevens</p>
            
                <input type="text" name="voornaam" id="voornaam" placeholder=" VOORNAAM"> <input type="text" name="achternaam" id="achternaam" placeholder=" ACHTERNAAM"> <br>
                <input type="email" name="email" id="email" placeholder=" EMAIL">
                <p>Je wordt automatisch ingeschreven voor onze nieuwsbrief</p>

                <p class="label">betaalmethode</p>
                <input type="radio" name="betaalmethode" value="paypal" checked><img class="payment" src="images/pay_paypal.png" alt="PayPal">
                <input type="radio" name="betaalmethode" value="american_express"><img class="payment" src="images/pay_americanexpress.png" alt="AmeriCanExpress"><br>
                <input type="radio" name="betaalmethode" value="visa"><img class="payment" src="images/pay_visa.png" alt="Visa">
                <input type="radio" name="betaalmethode" value="mastercard"><img class="payment" src="images/pay_mastercard.png" alt="Mastercard">
            

        </div>
        <div class="col-6 ">
            <div class="col-12"> <br><br><br></div>
    
                <p class="label">leveringsadres</p>
                <input type="text" name="adres" id="adres" placeholder=" STRAATNAAM"> <input type="text" name="nrbus" id="nrbus" placeholder=" NR/BUS"><br>
                <input type="number" name="postcode" id="postcode" placeholder=" POSTCODE"> <input type="text" name="gemeente" id="gemeente" placeholder=" GEMEENTE"><br>

                <input class="btn btn-light btn-pink" type="submit" value="betalen">
            
        </div>
        
    </form>


    <?php

        //validatie, als deze zijn ingevuld doe dan..
        if (isset($_POST['voornaam']) && isset($_POST['achternaam']) && isset($_POST['email']) && $_POST['voornaam'] != "" && $_POST['achternaam'] != "" && $_POST['email'] != "" ){

            $_POST['voornaam'] = mysqli_real_escape_string($db, $_POST['voornaam']);
            $_POST['achternaam'] = mysqli_real_escape_string($db, $_POST['achternaam']);
            $_POST['email'] = mysqli_real_escape_string($db, $_POST['email']);

            $sql = "INSERT INTO users (voornaam, achternaam, email)
            VALUES ('{$_POST['voornaam']}',
                    '{$_POST['achternaam']}',
                    '{$_POST['email']}')";

            if ($resulttoevoegen = mysqli_query($db,$sql)) {
            echo "De Query ".$sql." is met succes uitgevoerd<br>";

            }else{
            echo "FOUT: Query kon niet uitgevoerd worden"; 
                exit;
            }

        }

    ?>
	
	
</main>
<script src="js/dist/main.min.js"></script>
<footer class="footer"><p>Nele Van Nevel - 7SWM<br>Viso Mariakerke</p></footer>
</body>
</html>

