<?php
include '../database/Database.php';
include '../model/Inscription.php';

//CODE
$ins = new Inscription(
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['mail'],
    $_POST['mdp'],
    $_POST['naissance'],
    $_POST['rue'],
    $_POST['cp'],
    $_POST['ville']
);



$ins -> inscription();
