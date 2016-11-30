<?php

	$head = [

		'title' => 'Slider'

	];

	require_once 'inc/header.php';

	if (isset($_GET['addImage']) && $_GET['addImage'] == true) {
		$addImage = true;
	}

	if (isset($_POST['submit'])) {

		$errors = [];

		if (isset($_POST['imgName']) && strlen($_POST['imgName']) > 3 && strlen($_POST['imgName']) < 50) {
			$name = $_POST['imgName'];
		} else {
			$errors['name'] = 'Entrez un titre valide';
		}

		// Vérifier si le téléchargement du fichier n'a pas été interrompu
	    if ($_FILES['my-file']['error'] != UPLOAD_ERR_OK) {
	        // A ne pas faire en-dehors du DOM, bien sur.. En réalité on utilisera une variable intermédiaire
	        $errors['file'] = 'Erreur lors du téléchargement.';
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
	            $errors['file'] = 'Le fichier n\'est pas une image';
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
	                $errors['file'] = 'Erreur lors de l\'enregistrement';
	            } else {
	            	$url = $fullPath;
	            }
	        }
	    }

	    if (empty($errors)) {
	    	addImg($name,$url);
	    } else {
	    	print_r($errors);
	    }
	}

	if (isset($_GET['delete'])) {
		$id = (int)$_GET['delete'];
		deleteImg($id);
	}

	$imgs = getImgs();
?>

<!-- Contenu de la page -->

<h1>Images du slider</h1>

<div class="row">

	<?php foreach ($imgs as $key => $img): ?>
		<div class="col-sm-3">
			<div class="alert alert-danger delete"><a href="slider.php?delete=<?= $img['id'] ?>">Supprimer</a></div>
			<div class="sliderImage" style="background-image: url(<?= $img['url'] ?>)" >
			</div>
		</div>
	<?php endforeach ?>


	<div class="col-sm-3 addImage">
		<div class="sliderImage">
			<a id="add-image" href="#"><i class="glyphicon glyphicon-plus"></i></a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-8">
		<div id="dialog-form" title="Add new Image">
			<form enctype="multipart/form-data" action="#" method="POST">
				<div class="form-group">
					<label for="imgName">Titre</label>
					<input type="text" class="form-control" name="imgName" id="imgName">
				</div>

				<div class="form-group">
					<label for="my-file">Sélectionner le fichier :</label>
					<input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
            		<input name="my-file" type="file" />
				</div>

				<input type="submit" name="submit" class="btn btn-default"></input>
			</form>
		</div>
	</div>
</div>

<?php require_once 'inc/footer.php' ?>
