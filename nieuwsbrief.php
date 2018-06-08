<?php
//stap 1b: bestand db_conn.php insluiten
include("login-check.php");
include("includes/db_conn.php");


//STEP 2: queries uitvoeren

$query = "SELECT * FROM users WHERE id";
$resultlezen = mysqli_query($db, $query);


$rij = mysqli_fetch_array($resultlezen);


//EMAIL SCRIPT >:'0  
    $to = $rij['email'];
    $subject = "Nieuwsbrief PoshKey";

    $message = "
    <html>
        <head>
        <title>Nieuwsbrief PoshKey</title>
        </head>
        <body>
            <h1>Nieuwsbrief " date(F) " </h1>
            <p><b>".$_POST["achtern"]. " ". $_POST["voorn"]."</b> contacteerde ons via de website met de volgende email. <br> 
            ".$_POST["email"]. "</p>
            <p>Het bericht luidt als volgt..<br>".$_POST["bericht"]."</p>        
        </body>
        <a href='http://vanneveln.happyvisocoders.be/GIP/nieuwsbrief-logout.php'>Meld me af van de nieuwsbrief</a>
    </html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: info@poshkey.be'  "\r\n";
    $headers .= 'Cc: vanneveln@visocloud.org' . "\r\n";

    if(mail($to,$subject,$message,$headers)){
        echo "<p>Bericht verstuurd</p>";
      } else {
        echo "<p>Fout bij het versturen van e-mail</p>";
      }
  
}
 
?>