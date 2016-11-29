<?php

$config = parse_ini_file('config.ini');

// Tableau d'options supplémentaires pour la connexion
$db_options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // On force l'encodage en utf8
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // On récupère tous les résultats en tableau associatif
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING // On affiche des warnings pour les erreurs, à commenter en prod (valeur par défaut PDO::ERRMODE_SILENT)
);

$strConnection = 'mysql:host='.$config['HOST'].';dbname='.$config['DB'];

// On crée la connexion à la base de données
$pdo = new PDO($strConnection, $config['USER'], $config['PASS'], $db_options);

try {
	$pdo = new PDO($strConnection, $config['USER'], $config['PASS'], $db_options);
} catch (Exception $e) {
	error_log('['.$e->getCode().'] '.$e->getMessage(), 3, 'logs/mysql-errors.log');
}