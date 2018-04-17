<?php
//Connexion base de données
$dsn = 'mysql:dbname=clash;host=127.0.0.1';
$user = 'root';
$password = '';

$connection = new PDO($dsn, $user, $password);
$statement = $connection->prepare("
    SELECT *
    FROM match
");
$statement->execute();
$shows2 = $statement->fetchAll();