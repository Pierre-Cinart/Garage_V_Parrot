<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include_once './phpComponents/head.php'; ?>
        <title>Entretiens de véhicules</title>
    </head>
<body>
    <!-- header  -->
    <?php include_once './phpComponents/header.php'; ?>
   <!-- image bannière  -->
    <div class="bg">
        <img src="./Images/entretien/bg.jpg" alt="image de fond entretien">
    </div>

    <div class = "sep"></div>

     <!-- main section -->
    <section class="main">
    <h1 id ="link-place">Entretiens véhicules :</h1>
    <div class = "sep"></div>
    <!-- images de fond  ,présentation -->
        <div class ="pictures">
            <div>
                <img src="./Images/entretien/ent1.jpeg" alt="image entretien vehicule">
                <img src="./Images/entretien/ent2.jpeg" alt="image entretien vehicule"> 
            </div>
            <div>
                <img src="./Images/entretien/ent3.jpeg" alt="image entretien vehicule">
                <img src="./Images/entretien/ent4.jpg" alt="image entretien vehicule"> 
            </div>
        </div>

        <div class = "sep"></div>
        
        <!-- texte de description -->
        <article >
            <div class="txt-box">
                <p class="txt-s">
                    Au Garage <b>V-Parrot</b>. 
                    Nous comprenons l'importance d'un <b>entretien régulier</b> pour assurer la performance et la durabilité de votre véhicule. 
                    Notre équipe qualifiée est là pour vous offrir des <b>services d'entretien complets et professionnels</b>, 
                    adaptés aux besoins spécifiques de votre voiture. De la vidange d'huile au remplacement des filtres, de la 
                    vérification des freins à l'inspection générale, nous veillons à ce que chaque aspect de votre véhicule soit pris en 
                    charge avec soin et précision. Faites confiance à notre expertise et à notre engagement envers la qualité du service. 
                    Prenez rendez-vous dès aujourd'hui pour maintenir 
                    <b>votre voiture en parfait état</b> et profiter d'une conduite en toute tranquillité.
                </p>
            </div>
        </article>       
    </section>
    <!-- footer  -->
    <?php include_once './phpComponents/footer.php'; ?>
</body>
</html>