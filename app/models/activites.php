<?php

class Activite
{
    private array $activites;
    private string $nom;
    private int $places;
    private int $maxPlaces;


    public function __construct()
    {
        $this->activites = [];
    }

    public function getAllActivities(): array
    {
        return $this->activites;
    }

    public function getActivityById(int $id): array
    {
        return $this->activites[$id];
    }

    public function getPlacesLeft(): int
    {
        return $this->maxPlaces -= $this->places;
    }
}