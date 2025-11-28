<?php
if (count($activities) > 0) {
    foreach ($activities as $activity) {
        echo '<h3>' . $activity->getNom() . '</h3>';
        echo '<p>' . $activity->getDescription() . '</p>';
        echo '<p> Places disponible : ' . $activity->getPlacesDisponibles() . '</p>';
        echo '<p> Heure début : ' . $activity->getDateTimeDebut() . ' h</p>';
        echo '<p> Durée : ' . $activity->getDuree() . 'h</p>';
        // affiche les détails d’une activité et propose le formulaire de réservation.
    }
} else {
    echo '<p>Activité introuvable</p>';
}