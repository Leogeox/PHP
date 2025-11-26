<?php
class UserModel extends Bdd
{

    public function __construct()
    {
        parent::__construct();
    }

    public function findAll(): array
    {
        $users = $this->co->prepare('SELECT * FROM Users');
        $users->execute();

        return $users->fetchAll(PDO::FETCH_CLASS, 'Users');
    }

    public function findOneById(int $id): User|false
    {
        $users = $this->co->prepare('SELECT * FROM Users WHERE id = :id LIMIT 1');
        $users->setFetchMode(PDO::FETCH_CLASS, 'Users');
        $users->execute([
            'id' => $id
        ]);

        return $users->fetch();
    }

    //      private array $user;
    //     public function logUser(string $email, string $mdp): array
//     {
//         $this->user = [
//             'email' => $email,
//             'mdp' => $mdp
//         ];
//         return $this->user;
//     }

    //     public function createUser(array $data): bool
//     {
//         if ($data != $this->user) {
//             $this->user += $data;
//         } else if ($data = $this->user) {
//             return false;
//         }
//         return true;
//     }

    //     public function getAllUsers(): array
//     {
//         return $this->user;
//     }????
}
