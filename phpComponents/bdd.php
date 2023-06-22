<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "garage-v-parrot";

$bdd = new mysqli($servername, $username, $password, $dbname);

if ($bdd->connect_error) {
    die("Erreur de connexion à la base de données: " . $bdd->connect_error);
} 
else {
    echo "Connection réussie";
}
?>