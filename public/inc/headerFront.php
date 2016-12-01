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
<<<<<<< HEAD:public/inc/header.php
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="assets/js/script.js"></script>

	<!-- Styles -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
=======
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea' });</script>
  	<script src="script.js"></script>

	<!-- Styles -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
>>>>>>> chubbykirin:public/inc/headerFront.php
	<link rel="stylesheet" href="assets/css/style.min.css">


</head>
<body>

	<div class="row">
		<div class="col-sm-3">
			<header id="main-header">
				<nav class="navbar navbar-inverse" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
<<<<<<< HEAD:public/inc/header.php
						<a class="navbar-brand" href="index.php">Brand</a>
=======
						<div class="header-avatar" style="background-image: url(http://lorempicsum.com/up/255/200/5)"></div>
						<a class="navbar-brand" href="#">Jonathan Doe</a>
>>>>>>> chubbykirin:public/inc/headerFront.php
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
<<<<<<< HEAD:public/inc/header.php
							<li class="active"><a href="portfolio.php">Portfolio</a></li>
							<li><a href="slider.php">Slider</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#">Link</a></li>
=======
							<li><a href="#">Portfolio</a></li>
							<li><a href="#">Contact</a></li>
>>>>>>> chubbykirin:public/inc/headerFront.php
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>
			</header>
		</div>
		<div class="col-sm-9">