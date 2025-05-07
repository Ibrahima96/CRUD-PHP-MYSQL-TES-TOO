<?php
include_once 'connect_ddb.php';


if (isset($_POST['send'])){
    if (!empty($_POST['username']) && !empty($_POST['email'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $stm = $pdo->prepare("INSERT INTO users (username, email) VALUES (:username, :email)");
        $stm->execute(['username' => $username, 'email' => $email]);
        header('Location: index.php');
        exit;
    }
    else{
        echo "Veuillez remplir tous les champs";
    }
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADDUSER</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<form action="" method="post">
    <h1>Ajouter Un utilisateur</h1>
    <input type="text" name="username" placeholder="username">
    <input type="email" name="email" placeholder="email" pattern="^[a-z0-9]+\.[a-z0-9]+@noogle\.sn$"
    title="Format attendu : prenom.nom@noogle.sn (lettres et chiffres autorisés)" required>
    <input type="submit" value="Ajouter" name="send">
    <a href="index.php" class="link back">Annuler</a>
</form>
</body>
</html>