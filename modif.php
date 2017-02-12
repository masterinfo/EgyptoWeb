<?php
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	try{
		$sql = mysqli_connect('localhost','root','','egypte');
		$query = 'SELECT * FROM lieu WHERE NomLieu = "'.$_GET['name'].'"';
		$queryExec = mysqli_query($sql,$query);
		$data = mysqli_fetch_all($queryExec,MYSQLI_ASSOC);
	}catch(Exception $e){
		echo 'erreur de chargement de la page';
		exit();
	}
	if(isset($_POST['submit-form'])){
		$nom = $_POST['name'];
		$desc = $_POST['description'];
		$query = 'UPDATE lieu SET NomLieu = "'.$nom.'", description = "'.$desc.'" WHERE NomLieu = "'.$_GET['name'].'"';
		//echo $query;
		mysqli_query($sql,$query);
		rename('photos/'.str_replace(' ','',$_GET['name']).'.jpg','photos/'.str_replace(' ','',$nom).'.jpg');
		if(isset($_FILES) && isset($_FILES['image']['name'])){
			move_uploaded_file(str_replace(' ','',$_FILES['image']['tmp_name']),'photos/'.str_replace(' ','',$nom).'.jpg');
		}
		/*echo '<pre>';
			print_r($_FILES);
		echo '</pre>';*/
		/*$image = $_FILES;
		*/
	}
	$ok = false;
	if(isset($_GET['name']) && trim($_GET['name']) != ''){
		$query = 'SELECT * FROM lieu WHERE NomLieu = "'.$_GET['name'].'"';
		$queryExec = mysqli_query($sql,$query);
		$data = mysqli_fetch_all($queryExec,MYSQLI_ASSOC);
		if(count($data) > 0){
			$ok = true;
		}
		/*echo '<pre>';
			print_r($data);
		echo '</pre>';*/
	}
?>
<html>
	<head>
		<link rel='stylesheet' href='css/css.css'/>
	</head>
	<body>
		<form method='POST' action='modif.php?name=<?php echo $_GET['name'];?>' enctype="multipart/form-data">
			<?php
				if($ok){
					foreach($data as $row){
						?>
						<div class='each_desc'>
							<div class='nom'><input type='text' value='<?php echo $row['NomLieu']; ?>' name='name'/></div>
							<table width=100%>
								<tr width=100%>
									<td class='desc_all' width=100% valign=top>
										<div class='desc'><textarea name='description' style='width:100%;height:200px;'><?php echo $row['description']; ?></textarea></div>
									</td>
									<td class='image'><img width=200px height=200px src='./photos/<?php echo str_replace(' ','',$row['NomLieu'].'.jpg');?>'/><br/><input type='file' name='image' id='image'/></td>
								</tr>
							</table>
						</div>
						<?php
					}
				}else{	
					if(isset($nom)){
						header('location:modif.php?name='.$nom);
					}else{
						header('location:index.php');
					}
				}
			?>
			<input type='submit' value='Enregistrer' name='submit-form' onclick="/*alert(document.getElementById('image').value)*/"/>
		</form>
	</body>
</html>