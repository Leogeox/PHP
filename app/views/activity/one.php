<?php
if ($activity) {
    echo '<h1>' . $activity->getNom() . '</h1>';
    echo '<p>' . $activity->getPlacesDisponibles() . '</p>';
    echo '<p>' . $activity->getDescription() . '</p>';
    echo '<p>' . $activity->getDateTimeDebut() . '</p>';
    echo '<p>' . $activity->getDuree() . '</p>';
    // affiche les détails d’une activité et propose le formulaire de réservation.
} else {
    echo '<p>Activité introuvable</p>';
}