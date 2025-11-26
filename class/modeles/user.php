<?php

class User
{
    private array $user;
    // private array $allUser;

    public function __construct()
    {
        $this->user = [];
    }

    public function logUser(string $email, string $mdp): array
    {
        $this->user = [
            'email' => $email,
            'mdp' => $mdp
        ];
        return $this->user;
    }

    public function createUser(array $data): bool
    {
        if ($data != $this->user) {
            $this->user += $data;
        } else if ($data = $this->user) {
            return false;
        }
        return true;
    }

    public function getAllUsers(): array
    {
        return $this->user;
    }
}