<?php

session_start();

require_once '../include/system/dbConnexion.php';
require_once '../include/functions.php';

$head = [
	'title' => 'Portfolio'
];


$images = getImagesPortfolio();

// if(isset($_POST['#add-image'])) {
// 	header('Location: add-portfolio.php');
//   	exit();
// }

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>$head['title']</title>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="assets/js/script.js"></script>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.min.css">
</head>
<body>

	<?php 
		include('inc/header.php');
	?>

	<h1>Portfolio</h1>

	<!-- Affichage des images du portfolio -->
	
	<?php foreach ($images as $image) : ?>
		<div>
			<div><img src="assets/uploads/<?=$image['url']; ?>" alt="<?=$image['title']; ?>"></div>
			<div><p><?=$image['title']; ?></p></div>
			<div><p><?=$image['caption']; ?></p></div>
		</div>
	<?php endforeach; ?>


	<button id="add-image" type="button" class="btn btn-primary">Ajouter une image</button>

</body>
</html>