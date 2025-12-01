<?php
if (count($activities) > 0) {
    foreach ($activities as $activity) {
        echo '<h3>' . $activity->getNom() . '</h3>';
        echo '<p>' . $activity->getDescription() . '</p>';
        echo '<p> Places disponible : ' . $activity->getPlacesDisponibles() . '</p>';
        // Doit changer place dispo => ajouter places en data base et apres faire place prise
        echo '<p> Heure début : ' . $activity->getDateTimeDebut() . ' h</p>';
        echo '<p> Durée : ' . $activity->getDuree() . 'h</p>';
        // affiche les détails d’une activité et propose le formulaire de réservation.
        ?>
        <input type="submit" value="Reserver" name="reserver">
        <?php

        if ($user && $user === 'admin') {
            ?>
            <form method="POST" action="/activity/update/<?php echo $id; ?>">
                <input type="submit" value="Update" name="update">
            </form>

            <form method="POST" action="/activity/delete/<?php echo $id; ?>">
                <input type="submit" value="Delete" name="delete">
            </form>
            <?php
        } else {
            echo 'does it works?';
        }
    }
} else {
    echo '<p>Activité introuvable</p>';
}

