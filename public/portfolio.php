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

include('inc/header.php');
?>


	<h1>Portfolio</h1>

	<!-- Affichage des images du portfolio -->
	
	<?php foreach ($images as $image) : ?>
		<div>
			<div><img src="<?=$image['url']; ?>" alt="<?=$image['title']; ?>"></div>
			<div><h2><?=$image['title']; ?></h2></div>
			<div><p><?=$image['caption']; ?></p></div>
		</div>
	<?php endforeach; ?>


	<button id="add-image-portfolio" type="button" class="btn btn-primary">Ajouter une image</button>

</body>
</html>