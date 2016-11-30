<?php


	function addImg($name,$url) {
		global $pdo;

		$sql = $pdo->prepare('

			INSERT INTO slider
			VALUES (NULL, :url, :name);

		');

		$sql->bindParam(':url',$url);
		$sql->bindParam(':name',$name);

		return $sql->execute();
	}

	function getImgs() {
		global $pdo;

		$sql = $pdo->query('

			SELECT *
			FROM slider

		');

		return $sql->fetchAll();
	}

	function deleteImg($id) {
		global $pdo;

		$sql = $pdo->prepare('

			DELETE FROM slider
			WHERE slider.id = :id

		');

		$sql->bindParam(':id',$id,PDO::PARAM_INT);

		return $sql-> execute();
	}

	function addImageToPortfolio($url,$title,$caption){
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
		$stmt = $pdo->query($sql);
	    return $stmt->fetchAll();
	}

