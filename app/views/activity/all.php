<?php
echo "<h1>Liste des activitées</h1>";
if (count($activity) > 0) {
    foreach ($activity as $a) {
        echo '<h1>' . $a->getNom() . '</h1>';
        echo '<p>' . $a->getPlacesDisponibles() . '</p>';
        echo '<p>' . $a->getDateTimeDebut() . '</p>';
    }
} else {
    echo '<p>Aucune activitées</p>';
}