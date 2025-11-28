<?php
if ($user) {
    echo '<form>
            <input>' . $user->setEmail() . '</input>
            <input>' . $user->setMdp() . '</input>
        </form>';
} else {
    echo '<p>Utilisateur introuvable</p>';
}
