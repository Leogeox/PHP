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

    public function logUser(string $email, string $mdp): array
    {
        $users = $this->co->prepare('SELECT * FROM Users WHERE email = :email, mdp = :mdp LIMIT 1');
        $users->setFetchMode(PDO::FETCH_CLASS, 'Users');
        $users->execute([
            'email' => $email,
            'mdp' => $mdp
        ]);

        return $users->fetch();
    }

    public function getAllUsers(): array
    {
        $users = $this->co->prepare('SELECT * FROM Users');
        $users->execute();

        return $users->fetchAll(PDO::FETCH_CLASS, 'User');
    }
}

