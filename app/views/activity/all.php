<?php
echo "<h1>Liste des activitées</h1>";
if (count($activities) > 0) {
    foreach ($activities as $activity) {
        echo '<a href="/activity/show">' . $activity->getNom() . '</a><br>';

    }
} else {
    echo '<p>Aucun utilisateur</p>';
}