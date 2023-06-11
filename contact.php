<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include_once './phpComponents/head.php'; ?>
        <title>Garage V-Parrot - contact</title>
    </head>
<body>
    <header>
        <?php include_once './phpComponents/header.php'; ?>
    </header>

        <section class="main">
            <article class="article-center">
                <div>
                <div class="sep"></div>
                <h2 style = "margin:auto;text-align:center;">besoin de plus d 'informations? <br> contactez nous :</h2>
                <br>
           <div class="contact-form">
                
                <form method="POST" action="">
                    <div class="form-box">
                        <br><br>
                        <label for="message">message :</label>
                        <textarea id="message" name="message" rows="8" cols="40">

                        </textarea>
                    </div>
                    <br>
                    
                    <div class="btn-sub">
                        <input type="submit" name="submit-form" id="submit-form" value="envoyer">
                    </div>
                    <br>
                </form>
           </div>
           <br>
           <div class="sep"></div>
                    <p>
                        Garage V-Parrot , Entretiens , réparations et ventes automobiles <br>
                        Adresse : 123 rue des Jardins, 75000 Paris, France <br>
                        Téléphone : +33 1 23 45 67 89 <br>
                        Email : contact@V-Parrot.com <br>
                    </p>
                </div>
            </article>
        </section>

        <footer>
            <?php include_once './phpComponents/footer.php'; ?>
        </footer class= "container-fluid">
        <?php include_once './phpComponents/scripts.php'; ?>
</body>
</html>