<!DOCTYPE html>
<html lang="fr">
<head>
   <?php
    // base de données
    include_once('./phpComponents/bdd.php');
    // affichage des véhicules
    include_once('./phpFunctions/gallerie.php');
    // metadata et style Css
    include_once('./phpComponents/head.php');
    
   ?>
    <title>Gallerie de véhicules</title>
</head>
<body>
<?php
    // header navBar
    include_once('./phpComponents/header.php');
   ?>
        <h1>Nos véhicules en vente</h1>
        <form class="search-form" action="tri.php" method="GET">
            <input type="text" name="search" placeholder="Rechercher...">
            <button type="submit">Rechercher</button>

            <label for="sort_select">Options de tri :</label>
            <select name="sort_select" id="sort_select">
                <option value="">-- Choisissez une option de tri --</option>
                <option value="prix-croissant">Prix croissant</option>
                <option value="prix-decroissant">Prix décroissant</option>
                <option value="marque">Marque</option>
                <option value="modele">Modèle</option>
            </select>
        </form>
    <?php
    // Vérifier si des critères de recherche ou de tri ont été envoyés
    if (isset($_GET['search']) || isset($_GET['sort_select'])) {
        // Valider et échapper les données de recherche (sécurité)
        $searchTerm = isset($_GET['search']) ? mysqli_real_escape_string($bdd, $_GET['search']) : '';

        // Préparer la requête SQL en ajoutant une clause WHERE pour filtrer les voitures selon le critère de recherche
        $query = "SELECT * FROM Cars WHERE car_mark LIKE '%$searchTerm%' OR car_model LIKE '%$searchTerm%'";

        // Vérifier l'option de tri sélectionnée
        if (isset($_GET['sort_select'])) {
            $sortOption = $_GET['sort_select'];

            // Ajouter une clause ORDER BY en fonction de l'option de tri sélectionnée
            switch ($sortOption) {
                case 'prix-croissant':
                    $query .= " ORDER BY car_price ASC";
                    break;
                case 'prix-decroissant':
                    $query .= " ORDER BY car_price DESC";
                    break;
                case 'marque':
                    $query .= " ORDER BY car_mark ASC";
                    break;
                case 'modele':
                    $query .= " ORDER BY car_model ASC";
                    break;
            }
        }

        // Exécuter la requête SQL en utilisant une requête préparée pour une meilleure sécurité
        $stmt = $bdd->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        // Afficher les résultats de la galerie en utilisant les données récupérées (require './phpFunctions/gallerie.php')
        drawGallery($result);

        // Fermer la requête préparée et libérer les ressources
        $stmt->close();
    } else {
        // Préparer la requête SQL sans critère de recherche ou de tri
        $query = "SELECT * FROM Cars";

        // Exécuter la requête SQL en utilisant une requête préparée pour une meilleure sécurité
        $stmt = $bdd->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        echo '<div class="gallery">';
        // Afficher les résultats de la galerie en utilisant les données récupérées
        while ($row = $result->fetch_assoc()) {
            // Échapper les données avant de les afficher pour éviter les failles XSS
            $carMark = htmlspecialchars($row['car_mark']);
            $carModel = htmlspecialchars($row['car_model']);
            $carKm = htmlspecialchars($row['car_km']);
            $carColor = htmlspecialchars($row['car_color']);
            $carPrice = htmlspecialchars($row['car_price']);
            $carPicture = htmlspecialchars($row['car_picture']);
            $carInfo = htmlspecialchars($row['car_info']);

            // Afficher les informations de chaque voiture dans la galerie
            echo "<div class='card'>";
            echo "<div class='card-txt'>";
            echo "<h3>$carMark $carModel</h3>";
            echo "<p>Kilométrage : $carKm km</p>";
            echo "<p>Couleur : $carColor</p>";
            echo "<p>Prix : $carPrice €</p>";
            echo "</div>";
            echo "<div>";
            echo "<img class='card-img' src='$carPicture' alt='$carMark $carModel'>";
            echo $carInfo;
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";

        // Fermer la requête préparée et libérer les ressources
        $stmt->close();
    }

    // Fermer la connexion à la base de données et libérer les ressources
    $bdd->close();
    ?>

</body>
</html>
