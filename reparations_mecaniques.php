<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include_once './phpComponents/head.php'; ?>
        <title>Réparations mécaniques</title>
    </head>
<body>
    <header>
        <?php include_once './phpComponents/header.php'; ?>
        <?php
session_start();
?>
</header>
    <div class="bg">
        <img src="./Images/mecanique/bg.jpg" alt="image de fond mecanique">
    </div>
    <div class = "sep"></div>
    <section class="main" >
        <h1 id ="link-place">Réparations de mécaniques :</h1>
        <div class = "sep"></div>
        <section class ="pictures">
            <div>
                <img src="./Images/mecanique/repa1.jpeg" alt="image mecanique vehicule">
                <img src="./Images/mecanique/repa2.jpeg" alt="image mecanique vehicule"> 
            </div>
            <div>
                <img src="./Images/mecanique/repa3.jpg" alt="image mecanique vehicule">
                <img src="./Images/mecanique/repa4.jpg" alt="image mecanique vehicule"> 
            </div>
        </section>
        <div class = "sep"></div>
            <article >
                <div class="txt-box" >
                    <p class="txt-s">
                            Au Garage <b>V-Parrot</b>. 
                        Nous sommes spécialisés dans <b>la réparation</b> et l'entretien de tous types de véhicules. 
                        Notre équipe de mécaniciens qualifiés est là pour prendre soin de votre voiture et résoudre tous 
                        <b>les problèmes mécaniques</b>. Que ce soit pour une révision, une réparation moteur, 
                        une climatisation ou tout autre service, nous mettons tout en œuvre pour garantir le bon 
                        fonctionnement de votre véhicule. Faites confiance à notre expertise et à notre 
                        engagement envers la qualité du service. 
                        Prenez rendez-vous dès aujourd'hui et laissez-nous prendre soin de votre voiture.
                    </p>
                </div>
            </article>
            
    </section>

    <footer>
        <?php include_once './phpComponents/footer.php'; ?>
    </footer>
</body>
</html>