<?php

require_once '../include/system/dbConnexion.php';
require_once '../include/functions.php';

?><!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?= $head['title'] ?></title>

	<!-- jQuery et script -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea' });</script>
  	<script src="script.js"></script>

	<!-- Styles -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.min.css">


</head>
<body>

	<div class="row">
		<div class="col-sm-3">
			<header id="main-header">
				<nav class="navbar navbar-inverse" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<div class="navbar-brand header-back">
							<i class="fa fa-cog fa-2x" aria-hidden="true"></i>
							<a href="#">Administration</a>
						</div>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li><a href="#">Général</a></li>
							<li><a href="#">Slider</a></li>
							<li><a href="#">Contenu de la Homepage</a></li>
							<li><a href="#">Portfolio</a></li>
						</ul>
							
					</div><!-- /.navbar-collapse -->
				</nav>
			</header>
		</div>
		<div class="col-sm-9">