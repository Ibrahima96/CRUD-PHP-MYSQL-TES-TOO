:<?php
/**
 * Fichier de gestion de l'affichage des utilisateurs
 *
 * Ce fichier se connecte à la base de données et récupère tous les utilisateurs
 */

// Inclusion du fichier de connexion à la base de données
include_once __DIR__ . '/../connect_ddb.php';


// Préparation de la requête pour sélectionner tous les utilisateurs
$stm = $pdo->prepare("SELECT * FROM users");

// Exécution de la requête préparée
$stm->execute();

// Récupération des résultats dans un tableau associatif
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);

$message = "<p class='message'>Pas de données disponibles</p>";
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<main>
    <div class="link_container">
        <a href="addUser.php" class="link">Ajouter un utilisateur</a>
    </div>

    <table>
        <thead>
        <tr>
            <th>nom</th>
            <th>email</th>
            <th>modifier</th>
            <th>supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Si le tableau $rows n'est pas vide, on affiche les utilisateurs
        if (!empty($rows)): ?>
            <?php
            // Pour chaque ligne du tableau $rows
            foreach ($rows as $row): ?>
                <tr>
                    <!-- Affiche le nom d'utilisateur, protégé contre les failles XSS -->
                    <td><?= htmlspecialchars($row['username'] ?? $message) ?></td>

                    <!-- Affiche l'email, protégé contre les failles XSS -->
                    <td><?= htmlspecialchars($row['email'] ?? $message) ?></td>

                    <!-- Lien pour modifier l'utilisateur avec son ID -->
                    <td>
                        <a href="modifyUser.php?id=<?= htmlspecialchars($row['user_id']) ?>">

                            <img src="../images/write.png" alt="Modifier">
                        </a>
                    </td>

                    <!-- Lien pour supprimer l'utilisateur avec son ID -->
                    <td>
                        <a href="deleteUser.php?id=<?= htmlspecialchars($row['user_id']) ?>">

                            <img src="../images/remove.png" alt="Supprimer">
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        
         <!-- Si le tableau est vide, on affiche un message -->
        <?php else: ?>
            <tr>
                <td colspan="4"><?= $message ?></td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</main>

</body>
</html>