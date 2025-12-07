<?php
require_once './app/utils/Render.php';

class ReservationController
{
    use Render;

    public function index(): void
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            die("Not logged in");
        }

        $userId = $_SESSION['user_id'];

        $reservationModel = new ReservationModel();
        $reservations = $reservationModel->getReservationsByUserId($userId);

        if ($userId) {
            $data = [
                'user' => $userId,
                'reservations' => $reservations,
            ];
        }

        $this->renderView('reservation/all', $data);
    }
    
    public function create(int $activityId): void
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header('Location: /user/login');
            exit();
        }

        $userId = $_SESSION['user_id'];
        $reservationModel = new ReservationModel();
        
        $result = $reservationModel->createReservation($userId, $activityId);

        if ($result) {
            header('Location: /reservation/index');
            exit();
        } else {
            echo '<p style="color: red;">Erreur : Vous avez déjà une réservation pour cette activité.</p>';
        }
    }

    public function show(int $id): void
    {
        // $reservationModel = new ReservationModel();
        // $reservation = $reservationModel ->getReservationsByUserId();

        // if (isset($_POST['reserver'])) {
        //     header('Location: /reservation/one');
        // }

        // $this->renderView('reservation/one');

    }

    public function cancel(int $id): void
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header('Location: /user/login');
            exit();
        }

        $reservationModel = new ReservationModel();
        $result = $reservationModel->cancelReservation($id);

        if ($result) {
            header('Location: /reservation/index');
            exit();
        } else {
            echo '<p style="color: red;">Erreur : Impossible d\'annuler la réservation.</p>';
        }
    }
}
// index() : affiche les réservations de l’utilisateur connecté.
// create(int $activityId) : crée une nouvelle réservation associée à l’utilisateur connecté.
// show(int $id) : affiche les détails d’une réservation et propose le formulaire ou lien d’annulation.
// cancel(int $id) : annule une réservation.
// Cette action doit changer l’état dans la table reservations pour false.