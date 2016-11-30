<?php

// Affiche le texte pour la page d'accueil
function showHomepageContent() {

    global $pdo;

    $sql = 'SELECT value FROM `options` WHERE name = "homepageContent"';
    $result = $pdo->query($sql);
    $row = $result->fetch();
    return $row['value'];
}

// Prélève le texte pour la page d'accueil
function setHomepageContent($homepageContent) {

    global $pdo;

    $sqlUpdate = 'UPDATE options SET value = :value WHERE name = "homepageContent"';
    $stmt = $pdo->prepare($sqlUpdate);

    $stmt->bindValue(':value', $homepageContent);
    return $stmt->execute();
}