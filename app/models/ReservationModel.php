<?php

class ReservationModel extends Bdd
{

    public function __construct()
    {
        parent::__construct();
    }

    public function createReservation(int $userId, int $activityId): bool
    {
        $reservations = $this->co->prepare('SELECT * FROM Reservations WHERE user_id = :user_id AND activite_id = :activite_id LIMIT 1');
        $reservations->execute([
            'user_id' => $userId,
            'activite_id' => $activityId
        ]);

        if ($reservations->rowCount() === 0) {
            $insert = $this->co->prepare('INSERT INTO Reservations (user_id, activite_id, date_reservation, etat) VALUES (:user_id, :activite_id, NOW(), true)');
            $insert->execute([
                'user_id' => $userId,
                'activite_id' => $activityId
            ]);
            return true;
        } else {
            return false;
        }
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

    public function cancelReservation(int $reservationId): bool
    public function cancelReservation(int $reservationId): bool
    {
        $update = $this->co->prepare('UPDATE Reservations SET etat = false WHERE id = :id');
            'id' => $reservationId
        ]);

        return $result && $update->rowCount() > 0;
    }
}