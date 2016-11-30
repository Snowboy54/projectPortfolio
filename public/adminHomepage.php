<?php

	// Titre de la page
	$head = ['title' => "Admin - Contenu de la page d'accueil"];

	require_once 'inc/header.php';


	// Soumettre le contenu pour la Homepage
    if(isset($_POST['submitContent'])) {
        
        $errors = false;
        
        // Si le champ est vide
        if(empty($_POST['homepageContent'])) {

        	// Remplir le champ
            echo '<p>Veuillez remplir le champ.</p>';
            $errors = true;
        }
        
        // Si le champ est rempli
        if(!$errors) {

        	// Envoi des infos à la base de données
        	setHomepageContent($_POST['homepageContent']);
            echo "<p>Le contenu de la page d'accueil a été modifié</p>";
        }
    }

?><!-- DEBUT DU CONTENU DE LA PAGE -->

<div class="container">

	<h3>Contenu de la page d'accueil</h3>
	
	<!-- Insertion du contenu pour la Homepage -->
	<form action="#" method="post">

		<div><textarea name="homepageContent" cols="30" rows="10"></textarea></div>
		
		<div><input name="submitContent" type="submit" value="Mettre à jour"></div>

	</form>
</div>

<!-- FIN DU CONTENU DE LA PAGE -->

<?php require_once 'inc/footer.php' ?>