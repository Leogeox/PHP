<!DOCTYPE html>
<?php
session_start();
$_SESSION['user'] = $users;
print_r($_SESSION['user']);
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Mon titre par défaut' ?></title>
    <link rel="stylesheet" href="/main.css">
    <!-- <link rel="stylesheet" href="/assets/style.css"> -->
</head>

<body>
    <header>
        <!-- <nav>
            <a href="/user/findAll">Liste des utilisateurs</a>
        </nav> -->
    </header>

    <main>
        <?= $content ?? '<p>Aucun contenu à afficher</p>' ?>
    </main>

    <footer>
        <p>Tous droits réservés</p>
    </footer>
</body>

</html>