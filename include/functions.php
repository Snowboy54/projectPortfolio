<?php

function addImageToPortfolio(){
	global $pdo;
	$sql = 'INSERT INTO portfolio(url, title, caption) VALUES(:url, :title, :caption);';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':url', $url, PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':caption', $caption, PDO::PARAM_STR);
    $stmt->execute();

}

function getImagesPortfolio(){
	global $pdo;
	$sql = 'SELECT * FROM portfolio';
	$stmt = $pdo->prepare($sql);
   	$stmt->bindParam(':url', $url, PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':caption', $caption, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
}