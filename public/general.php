<?php 


	session_start();

	require_once 'inc/header.php';


	$fullPath = '';
if (isset($_POST['send-file'])) {

		    // Vérifier si le téléchargement du fichier n'a pas été interrompu
		    if ($_FILES['my-file']['error'] != UPLOAD_ERR_OK) {
		        // A ne pas faire en-dehors du DOM, bien sur.. En réalité on utilisera une variable intermédiaire
		        echo 'Erreur lors du téléchargement.';
		    } else {
		        // Objet FileInfo
		        $finfo = new finfo(FILEINFO_MIME_TYPE);

		        // Récupération du Mime
		        $mimeType = $finfo->file($_FILES['my-file']['tmp_name']);

		        $extFoundInArray = array_search(
		            $mimeType, array(
		                'jpg' => 'image/jpeg',
		                'png' => 'image/png',
		                'gif' => 'image/gif',
		            )
		        );
		        if ($extFoundInArray === false) {
		            echo 'Le fichier n\'est pas une image';
		        } else {
		            // Renommer nom du fichier
		            $shaFile = sha1_file($_FILES['my-file']['tmp_name']);
		            $nbFiles = 0;
		            $fileName = ''; // Le nom du fichier, sans le dossier
		            
		            do {
		                $fileName = $shaFile . $nbFiles . '.' . $extFoundInArray;
		                $fullPath = 'assets/uploads/' . $fileName;
		                $nbFiles++;
		            } while(file_exists($fullPath));

		            $moved = move_uploaded_file($_FILES['my-file']['tmp_name'], $fullPath);
		            if (!$moved) {
		                $errors ['avatar'] = 'Erreur lors de l\'enregistrement';
		            }
		        }
		    }
		}


	if(isset($_POST['addModif'])){

		$_SESSION['flash']['danger']= 'Un problème est survenu';
		$_SESSION['flash']['success'] = 'Vos modifications ont étés éffectués';

		$errors= [];

		if(isset($_POST['name'])){
			$_POST['name'] = trim($_POST['name']);
			$name = htmlspecialchars($_POST['name']);
		}else {
			$errors ['name'] = 'Veuillez rentrez votre nom';
		}

		if(isset($_POST['url'])){
			$avatar = $_POST['url'];
		}else {
			$errors ['url'] = 'Veuillez choisir un avatar';
		}

		

		if(empty($errors)){
			createAdmin($pdo,$name, $avatar);
			echo 'vos modifications ont étés enregistrés';
		}else {
			print_r($errors);
		}
	}


?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>General info</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<form enctype="multipart/form-data" action="#" method="POST">
		<label for="name">Votre nom</label><br><br>
		<input type="text" name="name" value="<?= isset($_POST['name'])? $_POST['name'] : '' ?>">


		<br><br>

		<label for="avatar">Votre avatar</label>

		<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
            Sélectionner le fichier : <input name="my-file" type="file" /><br>
        <input type="submit" name="send-file" value="Envoyer le fichier" />

		<img name="avatar" src="<?=$fullPath?>" alt="avatar">

		<br><br>
		<input type="hidden" name="url" value="<?= $fullPath ?>">

		<button type="submit" name="addModif">Enregistrer vos modifications</button>

	</form>
</body>
</html>