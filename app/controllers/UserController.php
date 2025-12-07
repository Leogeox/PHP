<?php
require_once './app/utils/Render.php';

class UserController
{
    use Render;

    public function index(): void
    {
        session_start();


        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            $data = [
                'error' => 'Vous n\'avez pas l\'autorisation pour accede a cette page'
            ];
            $this->renderView('user/all', $data);
            return;
        }

        $userModel = new UserModel();
        $users = $userModel->getAllUsers();
        if ($users) {
            $data = [
                'title' => 'Liste des utilisateurs',
                'users' => $users
            ];
        } else {
            $data = [
                'title' => 'Liste des utilisateurs',
                'users' => []
            ];
        }

        $this->renderView('user/all', $data);
    }

    public function register(): void
    {
        if (isset($_POST['register'])) {
            if (
                isset($_POST['firstname']) && !empty($_POST['firstname']) &&
                isset($_POST['lastname']) && !empty($_POST['lastname']) &&
                isset($_POST['email']) && !empty($_POST['email']) &&
                isset($_POST['password']) && !empty($_POST['password'])
            ) {
                $data = [
                    'firstname' => htmlspecialchars($_POST['firstname']),
                    'lastname' => htmlspecialchars($_POST['lastname']),
                    'email' => htmlspecialchars($_POST['email']),
                    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
                ];

                $userModel = new UserModel();
                $user = $userModel->createUser($data);

                if ($user) {
                    header('Location: /user/login');
                } else {
                    echo '<p>Erreur : L\'email existe déjà.</p>';
                }
            } else {
                echo '<p>Veuillez remplir tous les champs.</p>';
            }
        }

        $this->renderView('user/register');
        // A CHANGER
    }

    public function login(): void
    {
        session_start();
        
        if (isset($_POST['login'])) {
            if (
                isset($_POST['email']) && !empty($_POST['email']) &&
                isset($_POST['mdp']) && !empty($_POST['mdp'])
            ) {
                $data = [
                    'email' => htmlspecialchars($_POST['email']),
                    'mdp' => $_POST['mdp']
                ];

                $userModel = new UserModel();
                $user = $userModel->logUser($data);

                if ($user) {
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['user_role'] = $user->getRole();
                    $_SESSION['user_email'] = $user->getEmail();

                    header('Location: /');
                    exit();
                } else {
                    $error = 'Erreur : Email ou mot de passe incorrect.';
                    $this->renderView('user/login', ['error' => $error]);
                    return;
                }
            } else {
                $error = 'Veuillez remplir tous les champs.';
                $this->renderView('user/login', ['error' => $error]);
                return;
            }
        }

        $this->renderView('user/login');
    }

    public function logout(): void
    {
        session_start();
        session_destroy();
        header('Location: /');
        exit();
    }

    // index() : liste des utilisateurs inscrits. Cette page doit uniquement être visible et accessible par les administrateurs.
// register() : inscrit un nouvel utilisateur.
// login() : connecte un utilisateur.
// logout() : déconnecte l'utilisateur connecté.
}
