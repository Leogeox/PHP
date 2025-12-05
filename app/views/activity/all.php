<?php
if (count($activities) > 0) {
    foreach ($activities as $activity) {
        echo '<a href="/activity/show/' . $activity->getId() . '">'
            . htmlspecialchars($activity->getNom()) . '</a><br>';
    }
    print_r($_SESSION['user']);
} else {
    echo '<p>Aucune activité</p>';
}
