<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Mon titre par défaut' ?></title>
    <link rel="stylesheet" href="/main.css">
    <!-- <link rel="stylesheet" href="/assets/style.css"> -->
    <style>
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #f0f0f0;
            border-bottom: 1px solid #ddd;
        }
        nav {
            display: flex;
            gap: 1rem;
        }
        nav a {
            padding: 0.5rem 1rem;
            text-decoration: none;
            color: #333;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        nav a:hover {
            background-color: #e0e0e0;
        }
        .logout-btn {
            background-color: #dc3545;
            color: white;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        .user-info {
            font-size: 0.9rem;
            color: #666;
        }
    </style>
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
                <span class="user-info">Connecté en tant que: <?= htmlspecialchars($_SESSION['user_email']) ?></span>
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