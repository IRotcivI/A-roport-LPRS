<?php

use model\Aeroport;

class Inscription extends Aeroport
{
    private $nom;
    private $prenom;
    private $date;

    /*
     * @param $mdp
     */

    public function __construct($email,$mdp,$nom,$prenom,$date)
    {
        parent:: __construct($email);
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> date = $date;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function Connexion ()
    {
        $bdd = new \database\Database();
        $req = $bdd -> getBdd() -> prepare ("SELECT * FROM profil WHERE email = :email AND motDePasse = :mdp");
        $req -> execute(array(
            'email'=> $this -> getEmail(),
            'mdp' => $this -> getMdp()

        ));
        $res = $req -> fetch();
        if (is_array($res))
        {
            $this -> setNom($res["nom"]);
            $this -> setPrenom($res["prenom"]);
            $this -> setDate($res["naissance"]);
            session_start();
            $_SESSION["user"] = $this;
            header("Location: ");
        }
    }
}