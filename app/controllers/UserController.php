<?php
require_once './app/utils/Render.php';

class UserController
{
    use Render;

    public function createUser(array $data): void
    {
        $userModel = new UserModel();
        $user = $userModel->createUser($data);

        $data = [
            'title' => 'Creer votre utilisateur',
            'user' => $user
        ];

        $this->renderView('user/one', $data);
    }

    public function logUser(string $email, string $mdp): void
    {
        $userModel = new UserModel();
        $user = $userModel->logUser($email, $mdp);

        $data = [
            'title' => 'Votre utilisateur',
            'user' => $user
        ];

        // Rendu avec layout
        $this->renderView('user/one', $data);
    }

    public function getAllUsers(): void
    {
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();

        $data = [
            'title' => 'Liste des utilisateurs',
            'users' => $users
        ];

        $this->renderView('user/all', $data);
    }
}
