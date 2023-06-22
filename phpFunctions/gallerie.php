<?php
// Afficher les résultats de la galerie en utilisant les données récupérées
 function drawGallery($_result){
    echo '<div class="gallery">';
        // afficher les véhicules en fonction du résultat retourné
        while ($row = $_result->fetch_assoc()) {
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
    return;

 }
?>