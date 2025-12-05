<?php
session_start();
$_SESSION['user'] = $users;
?>

<form action="" method="POST">
    <label for="nom">Changer le nom:</label>
    <input type="text" id="nom" name="nom">
    <br>

    <label for="place_dispobibles">???</label>
    <!-- a garder ??? jsp -->
    <input type="number" id="place_dispobibles" name="place_dispobibles">
    <br>
    <label for="description">Description:</label>
    <input type="text" id="description" name="description">
    <br>
    <label for="datetime_debut">Debut:</label>
    <input type="number" id="datetime_debut" name="datetime_debut">
    <br>
    <label for="duree">Debut:</label>
    <input type="number" id="duree" name="duree">
    <br>
    <input type="submit" value="update" name="update">
</form>