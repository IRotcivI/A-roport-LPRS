<?php

class Reservation
{
    private $numVol;
    private $utilisateur;

    public function __construct($numVol, $utilisateur)
    {
        $this->numVol = $numVol;
        $this->utilisateur = $utilisateur;
    }

    public function faireReserv()
    {

        return "La réservation du vol $this->numVol a été effectuée avec succès pour l'utilisateur $this->utilisateur.";
    }
}

