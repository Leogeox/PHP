<?php
require_once './app/utils/Render.php';

class UserController
{
    use Render;

    public function index(): void
    {
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();
        if ($users === 'admin') {
            $data = [
                'title' => 'Liste des utilisateurs',
                'users' => $users
            ];
        } else if ($users != 'admin') {
            $data = null;
        }

        $this->renderView('user/all', $data);
        // A CHANGER
    }

    public function register(array $data): void
    {
        $userModel = new UserModel();
        $user = $userModel->createUser($data);

        $data1 = [
            'title' => 'Creer votre utilisateur',
            'user' => $user
        ];

        $this->renderView('user/one', $data1);
        // A CHANGER
    }

    public function login(string $email, string $mdp): void
    {
        $userModel = new UserModel();
        $user = $userModel->logUser($email, $mdp);

        $data = [
            'title' => 'Votre utilisateur',
            'user' => $user
        ];

        $this->renderView('user/register', $data);
        // A CHANGER
    }

    public function logout(string $email, string $mdp): void
    {
        $userModel = new UserModel();
        $user = $userModel->logUser($email, $mdp);

        $data = [
            'title' => 'Vous etes deconnecter'
        ];

        $this->renderView('user/one', $data);
        // A CHANGER
    }

    // index() : liste des utilisateurs inscrits. Cette page doit uniquement être visible et accessible par les administrateurs.
// register() : inscrit un nouvel utilisateur.
// login() : connecte un utilisateur.
// logout() : déconnecte l’utilisateur connecté.
}
