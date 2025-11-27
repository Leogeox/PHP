<?php
echo "<h1>Liste des reservation</h1>";
if (count($reservation) > 0) {
    foreach ($r as $reservation) {
        echo '<h1>' . $reservation->getId() . '</h1>';
        echo '<p>' . $reservation->getDateReservation() . '</p>';
        echo '<p>' . $reservation->getEtat() . '</p>';
    }
} else {
    echo '<p>Aucune reservation</p>';
}
