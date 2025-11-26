<?php
class UserModel extends Bdd
{

    public function __construct()
    {
        parent::__construct();
    }

    public function createUser(array $data): User|false
    {
        $users = $this->co->prepare('SELECT * FROM Users WHERE id = :id LIMIT 1');
        $users->setFetchMode(PDO::FETCH_CLASS, 'Users');

        if ($data != $users) {
            $users += $data;
        } else if ($data = $users) {
            return false;
        }
        return $users->fetch();
    }

    public function logUser(string $email, string $mdp): array
    {
        $users = $this->co->prepare('SELECT * FROM Users WHERE id = :id LIMIT 1');
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

        return $users->fetchAll(PDO::FETCH_CLASS, 'Users');
    }
}

