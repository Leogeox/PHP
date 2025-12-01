<?php

class User
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $prenom = null;

    private ?string $email = null;
    private ?string $mdp = null;
    private string $role;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;
        return $this;
    }
    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function getRole(): string
    {
        if ($this->role === 'admin') {
            return 'Admin';
        } else if ($this->role === 'user') {
            return 'User';
        }
        return $this->role;
    }
}
