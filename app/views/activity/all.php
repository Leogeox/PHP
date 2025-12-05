<?php
if (count($activities) > 0) {
    foreach ($activities as $activity) {
        echo '<a href="/activity/show/' . $activity->getId() . '">'
            . htmlspecialchars($activity->getNom()) . '</a><br>';
    }
} else {
    echo '<p>Aucune activité</p>';
}
