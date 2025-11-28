<?php
require_once './app/utils/Render.php';

class UserController
{
    use Render;

    public function index(): void
    {
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();
        if ($users) {
            $data = [
                'title' => 'Liste des utilisateurs',
                'users' => $users
            ];
        }
        else {
            $data = [
                'title' => 'Liste des utilisateurs',
                'users' => []
            ];
        }

        $this->renderView('user/all', $data);
    }

    public function register(): void
    {
        if(isset($_POST['register'])) {
            if(isset($_POST['firstname']) && !empty($_POST['firstname']) &&
               isset($_POST['lastname']) && !empty($_POST['lastname']) &&
               isset($_POST['email']) && !empty($_POST['email']) &&
               isset($_POST['password']) && !empty($_POST['password'])) {
                $data = [
                    'firstname' => htmlspecialchars($_POST['firstname']),
                    'lastname' => htmlspecialchars($_POST['lastname']),
                    'email' => htmlspecialchars($_POST['email']),
                    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
                ];

                $userModel = new UserModel();
                $user = $userModel->createUser($data);

                if($user) {
                    header('Location: /user/login');
                } else {
                    echo '<p>Erreur : L\'email existe déjà.</p>';
                }
            }
            else {
                echo '<p>Veuillez remplir tous les champs.</p>';
            }
        }

        $this->renderView('user/register');
        // A CHANGER
    }

    public function login(): void
    {
        // $userModel = new UserModel();
        // $user = $userModel->logUser($email, $mdp);

        // $data = [
        //     'title' => 'Votre utilisateur',
        //     'user' => $user
        // ];

        $this->renderView('user/login');
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
