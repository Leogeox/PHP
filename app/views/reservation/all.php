<?php
session_start();
$_SESSION['user'] = $users;
echo "<h1>Liste des reservation</h1>";
if (count($reservation) > 0) {
    foreach ($reservation as $r) {
        echo '<h1>' . $r->getId() . '</h1>';
        echo '<p>' . $r->getDateReservation() . '</p>';
    }
} else {
    echo '<p>Aucune reservation</p>';
}
