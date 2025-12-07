<?php
if (count($activities) > 0) {
    foreach ($activities as $activity) {
        echo '<h3>' . $activity->getNom() . '</h3>';
        echo '<p>' . $activity->getDescription() . '</p>';
        echo '<p> Places disponible : ' . $activity->getPlacesDisponibles() . '</p>';
        echo '<p> Heure début : ' . $activity->getDateTimeDebut() . ' h</p>';
        echo '<p> Durée : ' . $activity->getDuree() . 'h</p>';
        ?>

        <?php
        if ($isLoggedIn) {
            ?>
            <form method="POST" action="/reservation/create/<?php echo $id; ?>">
                <input type="submit" value="Réserver" name="reserver">
                <?php
                if ($reservation) {
                    ?>
                    <input type="submit" value="Annuler" name="annuler">
                    <?php
                }
                ?>
            </form>
            <?php
        }

        if ($isAdmin) {
            ?>
            <form method="POST" action="/activity/update/<?php echo $id; ?>">
                <input type="submit" value="Modifier" name="update">
            </form>

            <form method="POST" action="/activity/delete/<?php echo $id; ?>">
                <input type="submit" value="Supprimer" name="delete">
            </form>
            <?php
        }
    }
} else {
    echo 'Activité introuvable';
}
?>