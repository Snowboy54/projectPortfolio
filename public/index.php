<?php

	$head = [

		'title' => 'Accueil'

	];

	require_once 'inc/header.php';
?>

<!-- Contenu de la page -->

<div>
	Hello
</div>

<button id="add-image" ></button>
<div id="dialog-form" title="Add new Image">

        <form enctype="multipart/form-data" action="add-img.php" method="POST">
          <fieldset>

            <label for="image">Image</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
            <input type="file" name="url" id="url" class="text ui-widget-content ui-corner-all">

            <!-- Allow form submission with keyboard without duplicating the dialog button -->
            <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
          </fieldset>
        </form>
</div>

<?php require_once 'inc/footer.php' ?>
