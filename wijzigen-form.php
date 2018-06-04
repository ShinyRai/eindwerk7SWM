<!DOCTYPE html>
<html>
<head>
	<title>wijzigen</title>
</head>
<body>

</body>
</html>

	<form action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id']; ?>" method="post">

			<label for="naam">Naam product:</label>
			<input type="text" name="naam" id="naam" autofocus required value="<?php echo $rij['naam'];?>">
			<br>
			<label for="beschrijving">Beschrijving product:</label>
			<textarea name="beschrijving" id="beschrijving"> <?php echo $rij['beschrijving'];?> </textarea>
			<br>
			<label for="prijs">Prijs product:</label>
			<input type="number" name="prijs" id="prijs" required value="<?php echo $rij['prijs'];?>">
			<br><br>
			

			<input type="submit" name="submit" id="submit" value="submit">
			
		</form>

	</body>
	</html>