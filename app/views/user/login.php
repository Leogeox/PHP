<!-- <?php
// if ($user) {
//     echo '<form>
//             <input>' . $user->setEmail() . '</input>
//             <input>' . $user->setMdp() . '</input>
//         </form>';
// } else {
//     echo '<p>Utilisateur introuvable</p>';
// }
?> -->
<head>
    <link rel="stylesheet" href="../../style/login.css">
</head>

<h2 class="h2-login">Se connecter</h2>

<form action="" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="mdp">Mot de passe:</label>
    <input type="password" id="mdp" name="mdp" required>
    <br>
    <input type="submit" value="Se connecter" name="login">
</form>