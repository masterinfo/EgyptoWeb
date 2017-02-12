<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Bonjour</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
	<?php 

		$bdd = new PDO('mysql:host=localhost;dbname=egypte', 'root', '');
		$query="SELECT * from LIEU";
		$str = $bdd->query($query) or die("ATTENTION");
		$result = $str->fetchALl(PDO::FETCH_ASSOC);

		foreach ($result as $donnees) {
			echo "<div class='cadre col-md-4'>";
			echo '<div class="photos" style="background:url(./photos/'.str_replace(" ", "",$donnees['NomLieu']).'.jpg);"> </div>';
			echo "<div class='encart-description'>";
			echo "<p class='title'>".$donnees['NomLieu']."</p>";
			echo "<p class='description'>".$donnees['description']."</p>";
			echo "<a class='button' href='formulaire.php?NomLieu=".$donnees['NomLieu']."'>Modifier</a>";
			echo "</div>";
			echo "</div>";

		}

		$bdd=NULL;



	?> 
	</div>

</body>
</html>



