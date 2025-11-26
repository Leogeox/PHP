<?php

class ReservationModel extends Bdd
{

    public function __construct()
    {
        parent::__construct();
    }

    public function findAll(): array
    {
        $reservations = $this->co->prepare('SELECT * FROM Reservations');
        $reservations->execute();

        return $reservations->fetchAll(PDO::FETCH_CLASS, 'Reservations');
    }

    public function findOneById(int $id): Reservation|false
    {
        $reservations = $this->co->prepare('SELECT * FROM Reservations WHERE id = :id LIMIT 1');
        $reservations->setFetchMode(PDO::FETCH_CLASS, 'Reservations');
        $reservations->execute([
            'id' => $id
        ]);

        return $reservations->fetch();
    }
}
// {
//     public function createReservation(int $userId, int $activityId): bool
//     {

//     }

//     public function getReservationsByUserId(int $userId): array
//     {

//     }

//     public function cancelReservation(int $reservationId): bool
//     {

//     }
// }