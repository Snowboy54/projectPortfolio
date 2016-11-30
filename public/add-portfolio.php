<?php

session_start();

require_once '../include/system/dbConnexion.php';
require_once '../include/functions.php';

$head = [
	'title' => 'Add image to portfolio'
]

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>$head['title']</title>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="script.js"></script>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.min.css">
</head>
<body>

	<?php 
		include('inc/header.php');
	?>

	<h1>Portfolio</h1>

	<!-- Formulaire d'ajout qui s'affiche lorsque l'on clique sur "Ajouter une image" -->
	<h2>Télécharger une image</h2>
	<form>
		 <div class="form-group">
    		<label for="title">Titre</label>
    		<input type="text" class="form-control" id="title" placeholder="Titre">
  		</div>
  		<div class="form-group">
    		<label for="caption">Légende</label>
    		<textarea id="caption" class="form-control" placeholder="Légende"></textarea>
  		</div>
		<div class="form-group">

		    <label for="#add-portfolio">Nouvelle image</label>
		    <input type="file" id="add-portfolio">
		    
		</div>
		<button type="submit" class="btn btn-default">Envoyer</button>
</form>
	
</body>
</html>