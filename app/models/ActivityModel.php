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

        return $activities->fetchAll(PDO::FETCH_CLASS, 'Activity');
    }
    public function getActivityById(int $id): array
    {
        $activities = $this->co->prepare('SELECT * FROM Activities WHERE id = :id LIMIT 1');
        $activities->setFetchMode(PDO::FETCH_CLASS, 'Activity');
        $activities->execute([
            'id' => $id
        ]);

        return $activities->fetchAll();
    }

    public function getPlacesLeft(): int
    {
        $activities = $this->co->prepare('SELECT * FROM Activities WHERE places_disponible = :places_disponible');
        $activities->setFetchMode(PDO::FETCH_CLASS, 'Activity');

        return $activities->fetch();
    }

}
