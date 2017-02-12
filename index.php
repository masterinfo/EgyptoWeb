<!DOCTYPE html>
<html lang="fr">
<head>
	<title>recuperation des lieu </title>		
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
	<?php 
			// $bdd = mysqli_connect("localhost","root","","egypte") or die ("erreur connection :" .mysqli_connect_error().mysqli_connect_errno()); 

			// if (mysqli_connect_errno()) {
			// 	printf("erreur connection :".mysqli_connect_error());
			// 	exit();
			// }
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			try {
				$bdd = mysqli_connect("localhost","root","","egypte");
				//mysqli_set_charset($bdd, "utf8");


			}

			catch (Exception $e){
				echo "dsdg".$e;
				echo "string";
				exit();
			}

			$query = "SELECT * FROM lieu";
			$reponse = mysqli_query($bdd,$query); 
		// while($ligne=mysqli_fetch_array($reponse)) {
		// 	echo $ligne[0].'<br>';
		// 	echo $ligne["NomLieu"].'<br>';
		// }

		// while($ligne=mysqli_fetch_object($reponse)) {
		// 	echo $ligne->NomLieu;
		// }
		$data=mysqli_fetch_all($reponse, MYSQLI_BOTH);

		foreach ($data as $donnees) {
			echo "<div class='cadre col-md-4'>";
			echo '<div class="photos" style="background:url(./photos/'.str_replace(" ", "",$donnees['NomLieu']).'.jpg);"> </div>';
			echo "<div class='encart-description'>";
			echo "<p class='title'>".$donnees['NomLieu']."</p>";
			echo "<p class='description'>".$donnees['description']."</p>";
			echo "<a class='button' href='formulaire.php?NomLieu=".$donnees['NomLieu']."'>Modifier</a>";
			echo "</div>";
			echo "</div>";

		}

		mysqli_close($bdd);

		// fetch_array retourne tableau indexe et assoc
		// fetch_assoc retourne un tableau assoc
		// fetch_row index


	?> 
	</div>

</body>
</html>



