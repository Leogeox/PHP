<?php

class Activity
{
    private int $id;
    private string $nom;
    private int $type_id;

    private int $place_disponibles;
    private string $description;
    private string $datetime_debut;
    private int $duree;

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

    public function getTypeId(): string
    {
        return $this->type_id;
    }

    public function setPlacesDisponibles(int $places_disponibles): self
    {
        $this->place_disponibles = $places_disponibles;
        return $this;
    }
    public function getPlacesDisponibles(): int
    {
        return $this->place_disponibles;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDateTimeDebut(string $datetime_debut): self
    {
        $this->datetime_debut = $datetime_debut;
        return $this;
    }
    public function getDateTimeDebut(): string
    {
        return $this->datetime_debut;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;
        return $this;
    }
    public function getDuree(): int
    {
        return $this->duree;
    }
}
