<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include_once './phpComponents/head.php'; ?>
    </head>
<body>
    <header>
        <?php include_once './phpComponents/header.php'; ?>
    </header>

        <section class="main">
            <div class="sep"></div>
           <div class="connect-form">
                <legend><h2>connexion</h2></legend>
                <form method="POST" action="">
                    <div class="form-box">
                        <label for="user">identifiant :</label>
                        <input type="email" name="user" id="user" placeholder="Entrez votre adresse mail">
                    </div>
                    <br>
                    <div class="form-box">
                        <label for="pass">Mot de passe :</label>
                        <input type="password" name="pass" id="pass" placeholder="Mot de passe">
                    </div>
                    <br>
                    <div class="btn-sub">
                        <input type="submit" name="submit-form" id="submit-form" value="se connecter">
                    </div>
                    <br>
                </form>
           </div>
           <div class="sep"></div>

            <div class="text-sub">
                <div class="sep"></div>

                <p>Vous ne possedez pas de compte ? <br> Remplissez le formulaire d 'inscription et rejoignez notre communauté</p>

                <div class="sep"></div>
            </div>

            <div class="sep"></div>
            <div class="connect-form">
                <legend><h2>inscription</h2></legend>
                <form method="POST" action="">
                    <div class="form-box">
                        <label for="new-user">e_mail :</label>
                        <input type="email" name="new-user" id="new-user" placeholder="Entrez votre adresse mail">
                    </div>
                    <br>
                    <div class="form-box">
                        <label for="new-user-2">confirmation e_mail :</label>
                        <input type="email" name="new-user-2" id="new-user-2" placeholder="Entrez votre adresse mail">
                    </div>
                    <br>
                    <div class="form-box">
                        <label for="new-pass">Mot de passe :</label>
                        <input type="password" name="new-pass" id="new-pass" placeholder="Mot de passe">
                    </div>
                    <br>
                    <div class="form-box">
                        <label for="new-pass-2">confirmation du mot de passe :</label>
                        <input type="password" name="new-pass-2" id="new-pass-2" placeholder="Mot de passe">
                    </div>
                    <div class="btn-sub">
                        <input type="submit" name="new-submit-form" id="new-submit-form" value="créer un compte">
                    </div>
                    <br>
                </form>
           </div>

        </section>

        <footer>
            <?php include_once './phpComponents/footer.php'; ?>
        </footer>
        
</body>
</html>