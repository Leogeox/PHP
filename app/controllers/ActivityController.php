<?php
require_once './app/utils/Render.php';

class ActivityController
{
    use Render;

    public function index(): void
    {
        $activityModel = new ActivityModel();
        $activity = $activityModel->getAllActivities();

        $data = [
            'title' => 'Liste d activités',
            'activities' => $activity
        ];

        $this->renderView('activity/all', $data);
    }

    public function show(int $id): void
    {
        session_start();

        $activityModel = new ActivityModel();
        $activity = $activityModel->getActivityById($id);

        $isAdmin = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
        $isLoggedIn = isset($_SESSION['user_id']);

        $data = [
            'activities' => $activity,
            'id' => $id,
            'isAdmin' => $isAdmin,
            'isLoggedIn' => $isLoggedIn,
        ];

        $this->renderView('activity/one', $data);
    }

    public function update(int $id, array $data): void
    {
        $activityModel = new ActivityModel();
        $activity = $activityModel->getActivityById($id);

        $data = [
            'activities' => $activity,
        ];

        if (isset($_POST['update'])) {
            if (
                isset($_POST['nom']) &&
                //    isset($_POST['place_dispobibles']) &&
                isset($_POST['description']) &&
                isset($_POST['datetime_debut']) &&
                isset($_POST['duree'])
            ) {
                $data = [
                    'nom' => htmlspecialchars($_POST['nom']),
                    // 'place_dispobibles' => $_POST['place_dispobibles']
                    'description' => htmlspecialchars($_POST['description']),
                    'datetime_debut' => ($_POST['datetime_debut']),
                    'duree' => ($_POST['duree'])
                ];
            }
        }

        $this->renderView('activity/update', $data);
    }

    public function delete(int $id): void
    {
        $activityModel = new ActivityModel();
        $activity = $activityModel->getActivityById($id);

        if (isset($_DELETE['delete'])) {
            $data = [
                'activities' => $activity,
            ];
        }

        $this->renderView('activity/delete', $data);
    }
}
// index() : affiche toutes les activités disponibles.
// Si l’utilisateur est administrateur, lui proposer l’ajout d’une nouvelle activité.
// show(int $id) : affiche les détails d’une activité et propose le formulaire de réservation.
// Si l’utilisateur est administrateur, lui proposer la mise à jour ou suppression de l’activité.
// update(int $id, array $data) : permet l’édition d’une activité. Cette page doit uniquement être visible et accessible par les administrateurs.
// delete(int $id) : permet de supprimer une activité. Cette page doit uniquement être visible et accessible par les administrateurs.
// En cas de suppression d’une activité, il faut automatiquement supprimer les réservations qui correspondent.
