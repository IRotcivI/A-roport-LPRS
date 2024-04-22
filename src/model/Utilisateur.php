<?php

namespace model;

use Aeroport;

class Utilisateur extends Aeroport
{

//CONNEXION
    public function Connexion ()
    {
        $bdd = new Database();
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

//INSCRIPTION
    public function Inscription()
    {
        try {
            $bdd = new PDO('mysql:host=localhost:3306;dbname=lprs_vol;charset=utf8', 'root', '');

            $verif = $bdd->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
            $verif->execute(array('mail' => $this->getMail()));

            if ($verif->rowCount() > 0) {
                echo "Cet email est déjà utilisé !";
            } else {

                $requete = $bdd->prepare("INSERT INTO utilisateurs (nom, prenom, mail, mdp, naissance, rue, cp, ville) 
                                          VALUES (:nom, :prenom, :mail, :mdp, :naissance, :rue, :cp, :ville)");
                $requete->execute(array(
                    'nom' => $this->getNom(),
                    'prenom' => $this->getPrenom(),
                    'mail' => $this->getMail(),
                    'mdp' => $this->getMdp(),
                    'naissance' => $this->getNaissance(),
                    'rue' => $this->getRue(),
                    'cp' => $this->getCp(),
                    'ville' => $this->getVille(),
                ));
                echo "Votre compte a été créé !";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}