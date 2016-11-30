<?php

function createAdmin($pdo,$name, $avatar){
	$sql= 'INSERT INTO admin(adminName, adminAvatar) VALUES (:name, :avatar)';
	$stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':avatar', $avatar);
    $stmt->execute();
}

function updateAdmin($pdo,$name,$avatar, $id){
	$sql= 'UPDATE admin SET adminName = :adminName, adminAvatar = :adminAvatar WHERE id = :id';
	$stmt = $pdo->prepare($sql);
    $stmt->bindParam(':adminName', $name);
    $stmt->bindParam(':adminAvatar', $avatar);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

/*function updateAvatar($pdo,$avatar, $id){
	$sql= 'UPDATE admin SET adminAvatar = :adminAvatar WHERE id = :id';
	$stmt = $pdo->prepare($sql);
    $stmt->bindParam(':adminAvatar', $adminAvatar);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}*/