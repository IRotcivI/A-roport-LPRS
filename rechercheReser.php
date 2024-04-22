<?php

include '../database/Database.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $villeDepart = $_POST['ville_depart'];
    $villeArrive = $_POST['ville_arrive'];
    $heureDepart = $_POST['heure_depart'];
    $heureArrive = $_POST['heure_arrive'];
    $matricule = $_POST['matricule'];
    $volClasse = $_POST['classe'];


    try {

        $db = new Database();


        $query = "SELECT * FROM vol WHERE ville_depart = :ville_depart AND ville_arrive = :ville_arrive AND heure_depart = :heure_depart";
        // Exécuter la requête
        $statement = $db->getBdd()->prepare($query);
        $statement->execute([
            'ville_depart' => $villeDepart,
            'ville_arrive' => $villeArrive,
            'heure_depart' => $heureDepart,
        ]);

        $vol = $statement->fetchAll(PDO::FETCH_ASSOC);


        if (!empty($vols)) {
            foreach ($vols as $vol) {

                echo "Départ: " . $vol['ville_depart'] . "<br>";
                echo "Arrivée: " . $vol['ville_arrive'] . "<br>";
                echo "Date de départ: " . $vol['heure_depart'] . "<br>";
                echo "<form method='post' action='reservation.php'>";
                echo "<input type='hidden' name='id_vol' value='" . $vol['id'] . "'>";
                echo "<input type='submit' value='Réserver'>";
                echo "</form>";
                echo "<br>";
            }
        } else {
            echo "Aucun vol disponible .";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }
}
?>

