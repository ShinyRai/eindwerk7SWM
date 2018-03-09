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
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<nav>
		<ul>
			<li><a href="" title ="" alt=""></a></li>
			<li><a href="" title ="" alt=""></a></li>
			<li><a href="" title ="" alt=""></a></li>
			<li><a href="" title ="" alt=""></a></li>
		</ul>
	</nav>
	<main class="container">
		<section class="contact">

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
	<footer></footer>
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

