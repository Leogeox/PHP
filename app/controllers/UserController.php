<?php
require_once './app/utils/Render.php';

class UserController
{
    use Render;
    public function findAll(): void
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        // Prépatation du tableau à envoyer au layout
        $data = [
            'title' => 'Liste des utilisateurs',
            'users' => $users
        ];

        // Rendu avec layout
        $this->renderView('user/all', $data);
    }

    public function findOneById(int $id): void
    {
        $userModel = new UserModel();
        $user = $userModel->findOneById($id);

        // Prépatation du tableau à envoyer au layout
        $data = [
            'title' => 'Un utilisateur',
            'user' => $user
        ];

        // Rendu avec layout
        $this->renderView('user/one', $data);
    }

    //      private array $user;
    //     public function logUser(string $email, string $mdp): array
    // {
    //     $this->user = [
    //         'email' => $email,
    //         'mdp' => $mdp
    //     ];
    //     return $this->user;
    // }

    //     public function createUser(array $data): bool
    // {
    //     if ($data != $this->user) {
    //         $this->user += $data;
    //     } else if ($data = $this->user) {
    //         return false;
    //     }
    //     return true;
    // }

    //     public function getAllUsers(): array
    // {
    //     return $this->user;
    // }????
}
