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

<h2 class="h2-login">Se connecter</h2>

<form action="" method="GET">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="mdp">Mot de passe:</label>
    <input type="mdp" id="mdp" name="mdp" required>
    <br>
    <input type="submit" value="Se connecter" name="login">
</form>