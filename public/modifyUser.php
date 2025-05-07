<?php
/**
 * Script de modification d'un utilisateur
 *
 * Ce script permet de :
 * - Récupérer les informations d'un utilisateur via son ID
 * - Mettre à jour son nom d'utilisateur et email dans la base de données
 */

// Inclusion du fichier de connexion à la base de données
include_once __DIR__ . '/../connect_ddb.php';


// Récupération des informations de l'utilisateur
$stm = $pdo->prepare("SELECT * FROM users WHERE user_id = :user_id");
$stm->execute(['user_id' => $_GET['id']]);
$user = $stm->fetch(PDO::FETCH_ASSOC);

// Traitement du formulaire de modification
if (isset($_POST['send'])) {
    // Vérification que les champs requis sont remplis
    if (isset($_POST['username']) && isset($_POST['email'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];

        // Mise à jour des données dans la base
        $stm = $pdo->prepare("UPDATE users SET username = :username, email = :email WHERE user_id = :user_id");
        $stm->execute(['username' => $username, 'email' => $email, 'user_id' => $_GET['id']]);

        // Redirection vers la page d'affichage des utilisateurs
        header('Location: index.php');
        exit;
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h1>Modifier Un utilisateur</h1>
<form action="" method="post">
    <input type="text" name="username" placeholder="username" value="<?php echo $user['username'] ?>">
    <input type="email" name="email" placeholder="email" value="<?php echo $user['email'] ?>">
    <input type="submit" value="Modifier" name="send">
    <a href="index.php" class="link back">Annuler</a>
</form>
</body>
</html>