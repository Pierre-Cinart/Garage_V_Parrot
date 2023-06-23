<?php
    session_start();
?>
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
    <!-- main section -->
    <section class = "main" >
        <!-- barre de recherche -->
        <h1>Nos véhicules en vente</h1>
        <form class="search-form" action="ventes_de_vehicules.php" method="GET" style = "margin-left :20px;">
            <input type="text" name="search" placeholder="Rechercher...">
            <button type="submit">Rechercher</button>
            <!-- barre d otions -->
            <label for="sort_select">trier par :</label>
            <select name="sort_select" id="sort_select" >
                <option value="">-- Options de tri  --</option>
                <option value="prix-croissant">Prix croissant</option>
                <option value="prix-decroissant">Prix décroissant</option>
                <option value="marque">Marque</option>
                <option value="modele">Modèle</option>
            </select>
        </form>

        <!-- code php de reponse à la recherche -->
        <?php
        // Vérifier si des critères de recherche ou de tri ont été envoyés
        if (isset($_GET['search']) || isset($_GET['sort_select'])) {
            // Valider et échapper les données de recherche (sécurité)
            $searchTerm = isset($_GET['search']) ? mysqli_real_escape_string($bdd, $_GET['search']) : '';

            // Préparer la requête SQL en ajoutant une clause WHERE pour filtrer les voitures selon le critère de recherche sans option
            $query = "SELECT * FROM Cars WHERE car_mark LIKE '%$searchTerm%' OR car_model LIKE '%$searchTerm%'";
            
            // Vérifier l'option de tri sélectionnée et modifier la requete SQL
            if (isset($_GET['sort_select'])) {
                $sortOption = $_GET['sort_select'];
                // Préparer la requête SQL en ajoutant une clause WHERE 
                // et une clause ORDER BY en fonction de l'option de tri sélectionnée 
                // pour filtrer les voitures selon le critère de recherche
                switch ($sortOption) {
                    case 'prix-croissant':
                        $query = "SELECT * FROM Cars WHERE car_mark LIKE '%$searchTerm%' OR car_model LIKE '%$searchTerm%'ORDER BY car_price ASC";
                        break;
                    case 'prix-decroissant':
                        $query = "SELECT * FROM Cars WHERE car_mark LIKE '%$searchTerm%' OR car_model LIKE '%$searchTerm%'ORDER BY car_price DESC";
                        break;
                    case 'marque':
                        $query = "SELECT * FROM Cars WHERE car_mark LIKE '%$searchTerm%' ORDER BY car_mark ASC";
                        break;
                    case 'modele':
                        $query = "SELECT * FROM Cars WHERE car_model LIKE '%$searchTerm%' ORDER BY car_model ASC";
                        break;
                }
            }
           

            // Exécuter la requête SQL en utilisant une requête préparée pour une meilleure sécurité
            $stmt = $bdd->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows === 0) {
                echo '<p class = "txt-noresult">Aucun véhicule ne correspond à votre recherche.</p>';
            }
            else {
                 // Afficher les résultats de la galerie en utilisant les données récupérées (require './phpFunctions/gallerie.php')
                drawGallery($result);
            }
           

            // Fermer la requête préparée et libérer les ressources
            $stmt->close();
        } else {
            // Préparer la requête SQL sans critère de recherche ou de tri
            $query = "SELECT * FROM Cars";

            // Exécuter la requête SQL en utilisant une requête préparée pour une meilleure sécurité
            $stmt = $bdd->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            drawGallery($result);

            // Fermer la requête préparée et libérer les ressources
            $stmt->close();
        }

        // Fermer la connexion à la base de données et libérer les ressources
        $bdd->close();
        ?>
    </section>

   <!-- footer -->
   <?php include_once './phpComponents/footer.php'; ?>
    
</body>
</html>
