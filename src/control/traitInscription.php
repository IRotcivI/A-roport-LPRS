<?php
include '../database/Database.php';
include '../model/User.php';


//CODE
$ins = new \model\User([
    'nom' => $_POST['nom'],
   'prenom' => $_POST['prenom'],
    'mail' => $_POST['mail'],
    'mdp' => $_POST['mdp'],
    'naissance' => $_POST['naissance'],
    'rue' => $_POST['rue'],
    'cp' => $_POST['cp'],
    'ville' => $_POST['ville']
]);

$ins -> Incription();
