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
        // A CHANGER
    }

    public function show(int $id): void
    {
        $activityModel = new ActivityModel();
        $activity = $activityModel->getActivityById($id);
        $user = new UserModel();

        $data = [
            'activité' => $activity
        ];

        if ($user === 'admin') {
            // mise a jour + sup activite
        }
        ;

        $this->renderView('activity/one', $data);
        // A CHANGER
    }

    public function update(int $id, array $data): void
    {
        $activityModel = new ActivityModel();
        $activity = $activityModel->getActivityById($id);
        $user = new UserModel();

        if ($user === 'admin') {
            $data1 = [
                'activités' => $activity
                // $data = UPDATE
            ];
        } else if ($user != 'admin') {
            $data1 = [
                $data = null,
            ];
        }
        ;

        $this->renderView('activity/one', $data1);
        // A CHANGER
    }

    public function delete(int $id): void
    {
        $activityModel = new ActivityModel();
        $activity = $activityModel->getActivityById($id);
        $user = new UserModel();

        if ($user === 'admin') {
            $data = [
                'title' => 'Liste d activités',
                'activités' => $activity
                // DELETE
            ];
        }
        ;

        $this->renderView('activity/one', $data);
        // A CHANGER
    }
}
// index() : affiche toutes les activités disponibles.
// Si l’utilisateur est administrateur, lui proposer l’ajout d’une nouvelle activité.
// show(int $id) : affiche les détails d’une activité et propose le formulaire de réservation.
// Si l’utilisateur est administrateur, lui proposer la mise à jour ou suppression de l’activité.
// update(int $id, array $data) : permet l’édition d’une activité. Cette page doit uniquement être visible et accessible par les administrateurs.
// delete(int $id) : permet de supprimer une activité. Cette page doit uniquement être visible et accessible par les administrateurs.
// En cas de suppression d’une activité, il faut automatiquement supprimer les réservations qui correspondent.
