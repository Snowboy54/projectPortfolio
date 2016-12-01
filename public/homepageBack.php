<?php

	// Page's title
	$head = ['title' => "Admin - Contenu de la page d'accueil"];

	require_once 'inc/headerBack.php';


	// Homepage's content to submit
    if(isset($_POST['submitContent'])) {
        
        $errors = false;
        
        // If field empty
        if(empty($_POST['homepageContent'])) {

        	// Fill the field
            echo '<p>Veuillez remplir le champ.</p>';
            $errors = true;
        }
        
        // If field filled
        if(!$errors) {

        	// Send the text to the database
        	setHomepageContent($_POST['homepageContent']);
            $contentSend = true;
        }
    }

?><!-- PAGE'S CONTENT START -->

<div class="container">

	<h3>Contenu de la page d'accueil</h3>
	
	<!-- Typing homepage content -->
	<form action="#" method="post">

		<textarea name="homepageContent" rows="15"></textarea>
		
		<input class="btn btn-primary btn-lg" name="submitContent" type="submit" value="Mettre à jour">

        <!-- Confirmation text -->
        <div><?php 
        if(isset($_POST['submitContent'])) {
            if($contentSend = true) {
                echo "<p>Le contenu de la page d'accueil a été modifié.</p>";
            }
        }
        ?></div>

	</form>

</div>

<!-- PAGE'S CONTENT END -->

<?php require_once 'inc/footerBack.php' ?>