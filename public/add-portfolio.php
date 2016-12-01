<?php

session_start();

require_once '../include/system/dbConnexion.php';
require_once '../include/functions.php';

$head = [
	'title' => 'Add image to portfolio'
];

if(isset($_POST['send-file'])){

    $errors = [];
    // Vérification sur le champ Title
    if(isset($_POST['title'])) {
        $title = trim($_POST['title']);
        if(strlen($title) < 3 || strlen($title) > 20) {
            $errors['title'] = 'Le titre doit être compris entre 3 et 20 caractères';
        } else {
            $confirmTitle = $title;
        }
    }

    // Vérification sur le champ Légende
    if(isset($_POST['caption'])) {
        $caption = trim($_POST['caption']);
        if(strlen($caption) < 10 || strlen($caption) > 100) {
            $errors['caption'] = 'La légende doit être comprise entre 10 et 100 caractères';
        } else {
            $confirmCaption = $caption;
        }
    }

    // Vérifier si le téléchargement du fichier n'a pas été interrompu
    if ($_FILES['my-file']['error'] != UPLOAD_ERR_OK) {
        // A ne pas faire en-dehors du DOM, bien sur.. En réalité on utilisera une variable intermédiaire
        $errors['my-file'] = 'Merci de choisir un fichier';
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
            $errors['my-file'] =  'Le fichier n\'est pas une image';
        } else {
            // Renommer nom du fichier
            $shaFile = sha1_file($_FILES['my-file']['tmp_name']);
            $nbFiles = 0;
            $fileName = ''; // Le nom du fichier, sans le dossier
            do {
                $fileName = $shaFile . $nbFiles . '.' . $extFoundInArray;
                $fullPath = './assets/uploads/' . $fileName;
                $nbFiles++;
            } while(file_exists($fullPath));


            if(count($errors) == 0) {
                addImagetoPortfolio($fullPath, $_POST['title'], $_POST['caption']);
                $moved = move_uploaded_file($_FILES['my-file']['tmp_name'], $fullPath);
                if (!$moved) {
                    $errors['my-file'] = 'Erreur lors de l\'enregistrement';

                }

            } else {
            	print_r($errors);
            }
        }
    } // Fin si fichier présent
}

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>$head['title']</title>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="script.js"></script>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/style.min.css">
</head>
<body>

	<?php 
		include('inc/header.php');
	?>

	<h1>Portfolio</h1>

	<!-- Formulaire d'ajout qui s'affiche lorsque l'on clique sur "Ajouter une image" -->
	<h2>Télécharger une image</h2>
	<form enctype="multipart/form-data" action="#" method="POST">
		 <div class="form-group">
    		<label for="title">Titre</label>
    		<input name="title" type="text" class="form-control" placeholder="Titre">
  		</div>
  		<div class="form-group">
    		<label for="caption">Légende</label>
    		<textarea name="caption" class="form-control" placeholder="Légende"></textarea>
  		</div>
		<div class="form-group">

		    <label for="my-file">Nouvelle image</label>
		    <input type="file" name="my-file">
		    
		</div>
		<button name="send-file" type="submit" class="btn btn-default ">Envoyer</button>
	</form>
	
</body>
</html>