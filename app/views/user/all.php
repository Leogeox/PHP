<?php
echo "<h1>Liste des utilisateurs</h1>";

if (isset($error)) {
    echo '<p style="color: red;">' . htmlspecialchars($error) . '</p>';
} else {
    if (count($users) > 0) {
        foreach ($users as $user) {
            echo '<h2>' . htmlspecialchars($user->getEmail()) . '</h2>';
        }
    } else {
        echo '<p>Aucun utilisateurs</p>';
    }
}
?>