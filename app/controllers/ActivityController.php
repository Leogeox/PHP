<?php

// index() : affiche toutes les activités disponibles.
// Si l’utilisateur est administrateur, lui proposer l’ajout d’une nouvelle activité.
// show(int $id) : affiche les détails d’une activité et propose le formulaire de réservation.
// Si l’utilisateur est administrateur, lui proposer la mise à jour ou suppression de l’activité.
// update(int $id, array $data) : permet l’édition d’une activité. Cette page doit uniquement être visible et accessible par les administrateurs.
// delete(int $id) : permet de supprimer une activité. Cette page doit uniquement être visible et accessible par les administrateurs.
// En cas de suppression d’une activité, il faut automatiquement supprimer les réservations qui correspondent.