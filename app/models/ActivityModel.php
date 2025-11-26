<?php

class ActivityModel extends Bdd
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllActivities(): array
    {
        $activities = $this->co->prepare('SELECT * FROM Activities');
        $activities->execute();

        return $activities->fetchAll(PDO::FETCH_CLASS, 'Activities');
    }

    public function getActivityById(int $id): array
    {
        $activities = $this->co->prepare('SELECT * FROM Activities WHERE id = :id LIMIT 1');
        $activities->setFetchMode(PDO::FETCH_CLASS, 'Activities');
        $activities->execute([
            'id' => $id
        ]);

        return $activities->fetch();
    }

    public function getPlacesLeft(): int
    {
        $activities = $this->co->prepare('SELECT * FROM Activities WHERE places_disponible = :places_disponible');
        $activities->setFetchMode(PDO::FETCH_CLASS, 'Activities');

        return $activities->fetch();
    }

}


