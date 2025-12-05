<?php
require_once './app/utils/Render.php';

class ReservationController
{
    use Render;

    public function index(int $userId): void
    {
        $reservationModel = new ReservationModel();
        $reservationModel = $reservationModel->getReservationsByUserId($userId);

        $data = [
            'user connecté' => $userId
        ];
        $this->renderView('user/all', $data);
        // A CHANGER
    }
    
    public function create(int $userId, int $activityId): void
    {
        $reservationModel = new ReservationModel();
        $reservationModel = $reservationModel->createReservation($userId, $activityId);

        $data = [
            'user connecté' => $userId,
            'actvite creer' => $activityId
        ];
        $this->renderView('user/all', $data);
        // A CHANGER
    }

    public function show(int $id): void
    {
        $reservationModel = new ReservationModel();
        // $reservationModel = $reservationModel->createReervation($userId, $activityId);

        // $data = [
        //     'user connecté' => $userId,
        //     'actvite creer' => $activityId
        // ];
        // $this->renderView('user/all', $data);
        // A CHANGER
    }

    public function cancel(int $id): void
    {
        $reservationModel = new ReservationModel();
        $reservationModel = $reservationModel->cancelReservation($id);

        $data = [
            null
        ];

        $this->renderView('user/all', $data);
        // A CHANGER
    }
}
// index() : affiche les réservations de l’utilisateur connecté.
// create(int $activityId) : crée une nouvelle réservation associée à l’utilisateur connecté.
// show(int $id) : affiche les détails d’une réservation et propose le formulaire ou lien d’annulation.
// cancel(int $id) : annule une réservation.
// Cette action doit changer l’état dans la table reservations pour false.