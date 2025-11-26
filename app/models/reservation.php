<?php

class Reservation
{
    private int $id;
    private int $user_id;
    private int $activite_id;
    private DateTime $date_reservation = new DateTime;
    private bool $etat;

    public function getId(): int
    {
        return $this->id;
    }

    public function getuserId(): int
    {
        return $this->user_id;
    }

    public function getActiviteId(): int
    {
        return $this->activite_id;
    }


    public function setDateReservation(DateTime $date_reservation): self
    {
        $this->date_reservation = $date_reservation;
        return $this;
    }
    public function getDateReservation(): DateTime
    {
        return $this->date_reservation;
    }


    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;
        return $this;
    }
    public function getEtat(): bool
    {
        return $this->etat;
    }



}
