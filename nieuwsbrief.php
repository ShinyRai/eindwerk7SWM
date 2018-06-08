<?php
//stap 1b: bestand db_conn.php insluiten
include("login-check.php");
include("includes/db_conn.php");


//STEP 2: queries uitvoeren

$query = "SELECT * FROM users"; // !!!
if (!$result = mysqli_query($db,$query)) {
        echo "FOUT: Query kon niet uitgevoerd worden"; 
        exit; 
    }
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

           <main class="container">
            <section id="contact-form" style="margin-top: 150px; margin-bottom: 200px;">
            <h2 class="subtitle">Nieuwsbrief verzenden</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <p>Druk op de knop om een nieuwsbrief te verzenden naar de volgende geregistreerde e-mailadressen.</p>
                <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($rij = mysqli_fetch_array($result)) {
                            if( "{$rij['nieuwsbrief']}" == 1)
                                echo "{$rij['email']} <br>";
                            }

                        }else {
                            echo "<p>Er zijn nog geen geregistreerde e-mailadressen</p>";    
                        } // einde if (mysqli_num_rows($result) > 0)
                ?>  



                <input class="btn btn-light btn-pink" type="submit" value="verzenden">
            </form>
            
        </section>

</main>
    <script src="js/dist/main.min.js"></script>
    <footer class="footer"><p>Nele Van Nevel - 7SWM<br>Viso Mariakerke</p></footer>
</body>
</html>

<?php

$maand = date('F');



//EMAIL SCRIPT >:'0  
    $to = 'vanneveln@visocloud.org';
    $subject = "Nieuwsbrief PoshKey";

    $message = "
    <html>
        <head>
        <title>Nieuwsbrief PoshKey</title>
        </head>
        <body>
            <h1>Nieuwsbrief " . $maand . " </h1>
            <p>Beste <b>".$rij['achternaam']. " ". $rij['voornaam']."</b> dit is onze nieuwsbrief voor deze maand.<br> </p>
            <p>De aanbiedign voor deze maand is 10% korting bij aankoop van 20 euro aan PoshKey producten!</p>        
        </body>
        <a href='http://vanneveln.happyvisocoders.be/GIP/nieuwsbrief-logout.php?id=".$rij['id']."'>Meld me af van de nieuwsbrief</a>
    </html>
    ";// !!!! hoe verwijzen naar juiste id van juiste gebruiker???

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: info@poshkey.be' . "\r\n";
    $headers .= 'Cc: vanneveln@visocloud.org' . "\r\n";

    if(mail($to,$subject,$message,$headers)){
        echo "<p>:) ?</p>";
      } else {
        echo "<p>:((</p>";
      }
  

 
?>