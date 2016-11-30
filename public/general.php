<?php 

	$head = [

		'title' => 'Accueil'

	];

	require_once 'inc/header.php';
	require_once '../include/system/dbConnexion.php';
	require_once '../include/functions.php';

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>General info</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="#" method="POST">
		<label for="name">Votre nom</label><br><br>
		<input type="text" name="name">

		<br><br>

		<label for="avatar">Votre avatar</label>
		<img src="" alt="avatar">

		<br><br>

		<button type="submit" name="addModif">Enregistrer vos modifications</button>

	</form>
</body>
</html>