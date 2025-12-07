<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Mon titre par défaut' ?></title>
    <link rel="stylesheet" href="/app/style/style.css">
</head>

<body>
    <header>
        <nav>
            <a href="/">Accueil</a>
            <a href="/activity/index">Activités</a>
        </nav>
        <nav>
            <?php
            session_start();
            if (isset($_SESSION['user_id'])):
            ?>
                <span class="user-info">Connecté: <?= htmlspecialchars($_SESSION['user_email']) ?></span>
                <a href="/user/logout" class="logout-btn">Se déconnecter</a>
            <?php else: ?>
                <a href="/user/login">Se connecter</a>
                <a href="/user/register">S'inscrire</a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <?= $content ?? '<p>Aucun contenu à afficher</p>' ?>
    </main>

    <footer>
        <p>Tous droits réservés</p>
    </footer>
</body>

</html>