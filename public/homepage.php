<?php

	// Titre de la page
	$head = ['title' => "Accueil"];

	require_once 'inc/header.php';

	$slider = getImgs();

?><!-- DEBUT DU CONTENU DE LA PAGE -->

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->

  <ol class="carousel-indicators">

  <?php foreach ($slider as $key => $value): ?>
    <?php if ($key == 0): ?>
    	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <?php else : ?>
    <li data-target="#carousel-example-generic" data-slide-to="<?= $key ?>"></li>
   <?php endif ?>
  <?php endforeach ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  <?php foreach ($slider as $key => $img): ?>
  	<?php if ($key == 0): ?>
  		<div class="item active">
      <img src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">
      <div class="carousel-caption">
        <?= $img['alt'] ?>
      </div>
    </div>
  	<?php else : ?>
		<div class="item">
      <img src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">
      <div class="carousel-caption">
        <?= $img['alt'] ?>
      </div>
    </div>
  	<?php endif; ?>
  <?php endforeach ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="container">

	<!-- Contenu de la page d'accueil -->
	<div><?= showHomepageContent() ?></div>

</div>

<!-- Map -->



<!-- FIN DU CONTENU DE LA PAGE -->

<?php require_once 'inc/footer.php' ?>