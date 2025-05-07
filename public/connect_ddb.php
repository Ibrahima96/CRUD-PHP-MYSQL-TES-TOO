<?php

$host = "127.0.0.1";
$dbname = "utilisateurs";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $e) {
    die("Erreur connexion : " . $e->getMessage());
}
