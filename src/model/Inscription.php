<?php

use model\Aeroport;

class Inscription
{
    private $nom;
    private $prenom;
    private $naissance;
    private $rue;
    private $cp;
    private $ville;

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * @param mixed $rue
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    }


    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }


    /*
     * @param $mdp
     */

    public function __construct($mail, $naissance, $rue, $cp, $ville, $mdp, $prenom, $nom)
    {
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> mail = $mail;
        $this -> mdp = $mdp;
        $this -> naissance = $naissance;
        $this -> rue = $rue;
        $this -> cp = $cp;
        $this -> ville = $ville;

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
    public function getNaissance()
    {
        return $this->naissance;
    }

    /**
     * @param mixed $date
     */
    public function setNaissance($naissance)
    {
        $this->naissance = $naissance;
    }

    public function Inscription ()
    {
        $bdd = new PDO('mysql:host=localhost:3307;dbname=lprs_aeroport;charset=utf8', 'root', '');
        $verif = $bdd ->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
        $verif -> execute(array(
            'mail'=>$this->getMail(),
        ));
        if ($verif -> rowCount() > 0)
        {
            echo "Ce email est deja utilisé !!!";
        }
        else
        {
            $requete = $bdd -> prepare("INSERT INTO utilisateurs (nom,prenom,mail,mdp,naissance,rue,cp,ville) VALUES (:nom,:prenom,:mail,:mdp,:date,:rue,:cp,:ville)");
            $requete -> execute(array(
                'nom'=>$this->getNom(),
                'prenom'=>$this->getPrenom(),
                'mail'=>$this->getMail(),
                'mdp'=>$this->getMdp()
                ,'naissance'=>$this->getNaissance(),
                'rue'=>$this->getRue(),
                'cp'=>$this->getCp(),
                'ville'=>$this->getVille(),
            ));
            echo "Votre compte a été créee";
        }
    }



}