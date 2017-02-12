<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Formulaire de modification</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
<?php 
$lieu = $_GET['NomLieu'];
	try {
		$bdd = mysqli_connect("localhost","root","","egypte");


	}

	catch (Exception $e){
		echo "dsdg".$e;
		echo "string";
		exit();
	}

	if(isset($_POST['modification'])) {
		$name = $_GET['NomLieu'];

		if(!empty($_POST)){
			$valid='true';
			extract($_POST);
			if(empty($description) && trim($description)!=''){
				$valid='false';
				$errorPrenom ='ATTENTION ! Vous avez oublié votre Prénom';
			}

			if(empty($lieu) && trim($lieu)!=''){
				$valid='false';
				$errorName ='ATTENTION ! Vous avez oublié votre Nom';
			}
			
			rename('photos/'.$name.'.jpg', 'photos/'.str_replace(' ', '', $lieu).'.jpg');

			if(isset($_FILES['photos'])) {

				$dossier = 'photos/';
				$name_fichier = basename($_FILES['photos']['name']); // extrait le dernier bout de la ligne de chemin imaginons dossiertmp/mondieu/cv.pdf il en extrait juste le cv.pdf
				echo $name_fichier.'<br>';
				$cheminfichier = $dossier.str_replace(' ', '', $lieu).'.jpg'; // on assemble ensuite le chemin de notre dossier et le nom de la basename et avec la fonction str_remplace on remplace les caractères du basename
				echo $cheminfichier.'<br>';
				if(move_uploaded_file($_FILES['photos']['tmp_name'], $cheminfichier)) { // on transfert le fichier de son emplacement temporaire a son emplacement final
					echo 'tout est bon';
				}
			}

			if($valid == 'true') {
							$bdd = mysqli_connect("localhost","root","","egypte"); 

				$requete = 'UPDATE lieu SET description = "'.$description.'", situation = "'.$lieu.'",NomLieu="'.$lieu.'" WHERE NomLieu = "'.$name.'"';
				echo $requete;
				$reponse = mysqli_query($bdd,$requete);
				header("location:formulaire.php?NomLieu=$lieu");
			}
		}
	}

	$query = "SELECT * FROM lieu WHERE '$lieu'=NomLieu";
	$reponse = mysqli_query($bdd,$query); 
	$data=mysqli_fetch_all($reponse, MYSQLI_BOTH);

		foreach ($data as $donnees) {


?>








	<h1>Formulaire de Modification <br><span><?php echo $_GET['NomLieu'] ?></span></h1>

	<header style="background:url(./photos/<?php echo str_replace(' ', '', $_GET['NomLieu'].'.jpg') ?>) fixed top no-repeat"></header>
	<form action="#" method="POST" enctype="multipart/form-data">
		

		<p>Nom du Lieu <input class="modif" name="lieu" type="text" value="<?php echo $donnees['NomLieu'] ?>"></p>
		<p>Description Lieu <textarea class="modif" name="description" type="text"><?php echo $donnees['description'] ?></textarea></p>
		<p><input class="search" type="file" id="photos" name="photos"></p>
		<input type="submit" class="valid" name="modification">

	</form>
</body>
</html>

<?php 
}

mysqli_close($bdd); 
?>