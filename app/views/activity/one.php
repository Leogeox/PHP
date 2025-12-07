<?php
if ($activity) {
    echo '<h3>' . htmlspecialchars($activity->getNom()) . '</h3>';
    echo '<p>' . htmlspecialchars($activity->getDescription()) . '</p>';
    echo '<p>Places disponibles : ' . htmlspecialchars($activity->getPlacesDisponibles()) . '</p>';
    echo '<p>Heure début : ' . htmlspecialchars($activity->getDateTimeDebut()) . '</p>';
    echo '<p>Durée : ' . htmlspecialchars($activity->getDuree()) . 'h</p>';
    
    if ($isLoggedIn) {
        ?>
        <form method="POST" action="/reservation/create/<?php echo $id; ?>">
            <input type="submit" value="Réserver" name="reserver">
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
} else {
    echo '<p>Activité introuvable</p>';
}
?>