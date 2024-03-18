<?php
include '../database/Database.php';
include '../model/Inscription.php';

//CODE
$ins = new Inscription ([
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'mail' => $_POST['mail'],
    'mdp' => $_POST['mdp'],
    'naissance'=>$_POST['naissance'],
    'rue'=>$_POST ['rue'],
    'cp'=>$_POST ['cp'],
    'ville'=>$_POST ['ville']
]);

$ins -> inscription();
