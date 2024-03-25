<?php
include '../model/Aeroport.php';
include '../model/Connexion.php';
include '../database/Database.php';

$mode = new Aeroport([
    'email' => $_POST['email'],
    'mdp' => $_POST['mdp']
]);

$login = new Connexion();
$login -> Connexion();