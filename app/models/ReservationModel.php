<?php

class ReservationModel extends Bdd
{

    public function __construct()
    {
        parent::__construct();
    }

    public function createReservation(int $userId, int $activityId): true
    {
        $reservations = $this->co->prepare('SELECT * FROM Reservations WHERE user_id = :user_id, activite_id = :activite_id LIMIT 1');
        $reservations->setFetchMode(PDO::FETCH_CLASS, 'Reservations');
        $reservations->execute([
            'user_id' => $userId,
            'activite_id' => $activityId
        ]);

        return $reservations->fetch();
    }

    public function getReservationsByUserId(int $userId): array
    {
        $reservations = $this->co->prepare('SELECT * FROM Reservations WHERE user_id = :user_id');
        $reservations->setFetchMode(PDO::FETCH_CLASS, 'Reservations');
        $reservations->execute([
            'user_id' => $userId
        ]);

        return $reservations->fetchAll(PDO::FETCH_CLASS, 'Reservations');
    }

    public function cancelReservation(int $reservationId): false
    {
        $reservations = $this->co->prepare('SELECT * FROM Reservations WHERE id = :id LIMIT 1');
        $reservations->setFetchMode(PDO::FETCH_CLASS, 'Reservations');
        $reservations->execute([
            'id' => $reservationId
        ]);

        return $reservations->fetch();
    }
}