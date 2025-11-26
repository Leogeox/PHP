<?php

class ActiviteModel extends Bdd
{

    public function __construct()
    {
        parent::__construct();
    }

    public function findAll(): array
    {
        $activities = $this->co->prepare('SELECT * FROM Activities');
        $activities->execute();

        return $activities->fetchAll(PDO::FETCH_CLASS, 'Activities');
    }

    public function findOneById(int $id): Activity|false
    {
        $activities = $this->co->prepare('SELECT * FROM Activities WHERE id = :id LIMIT 1');
        $activities->setFetchMode(PDO::FETCH_CLASS, 'Activities');
        $activities->execute([
            'id' => $id
        ]);

        return $activities->fetch();
    }
}
//     private array $activites;
//     private string $nom;
//     private int $places;
//     private int $maxPlaces;


//     public function __construct()
//     {
//         $this->activites = [];
//     }

//     public function getAllActivities(): array
//     {
//         return $this->activites;
//     }

//     public function getActivityById(int $id): array
//     {
//         return $this->activites[$id];
//     }

//     public function getPlacesLeft(): int
//     {
//         return $this->maxPlaces -= $this->places;
//     }
// }