<?php

// class User
// {
//     private array $user;
//     // private array $allUser;

//     public function __construct()
//     {
//         $this->user = [];
//     }

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
//     }
// }

class User
{
    private int $id;
    private string $nom;
    private string $prenom;

    private string $email;
    private string $mdp;
    private string $role;


    public function getId(): int
    {
        return $this->id;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }
    public function getNom(): string
    {
        return $this->nom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setMdp(string $mdp): self
    {
        $this->pwd = $mdp;
        return $this;
    }
    public function getMdp(): string
    {
        return $this->mdp;
    }
}
