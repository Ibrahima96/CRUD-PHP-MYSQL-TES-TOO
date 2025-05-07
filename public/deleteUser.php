<?php

/**
 * Fichier de suppression d'un utilisateur
 *
 * Ce script permet de supprimer un utilisateur de la base de données en utilisant son ID
 */

// Inclusion du fichier de connexion à la base de données 
include_once __DIR__ . '/../connect_ddb.php';


// Récupération de l'ID utilisateur depuis l'URL
$user_id = $_GET['id'];

// Préparation de la requête de suppression
$stm = $pdo->prepare("DELETE FROM users WHERE user_id = :user_id");

// Exécution de la requête avec l'ID utilisateur
$stm->execute(['user_id' => $user_id]);

// Redirection vers la page d'affichage des utilisateurs
header('Location: index.php');