<?php
class UserModel extends Bdd
{

    public function __construct()
    {
        parent::__construct();
    }

    public function createUser(array $data): bool
    {
        $users = $this->co->prepare('SELECT * FROM Users WHERE email = :email LIMIT 1');
        $users->execute([
            'email' => $data['email']
        ]);

        if ($users->rowCount() === 0) {
            $insert = $this->co->prepare('INSERT INTO Users (prenom, nom, email, mdp) VALUES (:firstname, :lastname, :email, :mdp)');
            $insert->execute([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'mdp' => $data['password']
            ]);
            return true;
        } else {
            return false;
        }
    }

    public function logUser(array $data): ?User
    {
        // Récupère l'utilisateur par email, puis vérifie le mot de passe
        $users = $this->co->prepare('SELECT * FROM Users WHERE email = :email LIMIT 1');
        $users->setFetchMode(PDO::FETCH_CLASS, 'User');
        $users->execute([
            'email' => $data['email']
        ]);

        $user = $users->fetch();

        if ($user && $user->getMdp() !== null && password_verify($data['mdp'], $user->getMdp())) {
            session_start();
            $_SESSION['user'] = $users;
            print_r($_SESSION['user']);
            return $user;
        }

        return null;
    }

    public function getAllUsers(): array
    {
        $users = $this->co->prepare('SELECT * FROM Users');
        $users->execute();

        return $users->fetchAll(PDO::FETCH_CLASS, 'User');
    }

}