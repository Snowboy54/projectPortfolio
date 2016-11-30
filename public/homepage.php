<?php

	// Titre de la page
	$head = ['title' => "Accueil"];

	require_once 'inc/header.php';

?><!-- DEBUT DU CONTENU DE LA PAGE -->

<!-- Slider -->



<div class="container">

	<!-- Contenu de la page d'accueil -->
	<div><?= showHomepageContent() ?></div>

</div>

<!-- Map -->



<!-- FIN DU CONTENU DE LA PAGE -->

<?php require_once 'inc/footer.php' ?>