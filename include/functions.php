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