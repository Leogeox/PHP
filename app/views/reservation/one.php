<?php
if ($reservation) {
    echo '<h1>' . $reservation->getId() . '</h1>';
    echo '<p>' . $reservation->getDateReservation() . '</p>';
    echo '<p>' . $reservation->getEtat() . '</p>';
    //  propose le formulaire ou lien d’annulation.
} else {
    echo '<p>Reservation introuvable</p>';
}