<?php
echo "<h1>Mes réservations</h1>";
if (count($reservations) > 0) {
    foreach ($reservations as $r) {
        echo '<div class="card">';
        echo '<h3>Réservation #' . htmlspecialchars($r->getId()) . '</h3>';
        echo '<p>Date de réservation : ' . htmlspecialchars($r->getDateReservation()) . '</p>';
        echo '<p>État : ' . ($r->getEtat() ? 'Confirmée' : 'Annulée') . '</p>';
        
        if ($r->getEtat()) {
            ?>
            <form method="POST" action="/reservation/cancel/<?php echo $r->getId(); ?>">
                <input type="submit" value="Annuler" name="cancel">
            </form>
            <?php
        }
        echo '</div>';
    }
} else {
    echo '<p>Aucune réservation</p>';
}
?>