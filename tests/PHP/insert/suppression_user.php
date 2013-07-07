<?php
$titre = "";
include ("../includes/header.php");
include ("../includes/menu.php");
include ("../includes/sql.php");


echo '<h3>MSuppression d\'un utilisateur</h3>';
$user_id = $_GET['user_id'];

// requete d'ajout d'adherents
$requete = " DELETE from forum_users WHERE user_id = $user_id";

// envoi de la requete
$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);


// ok
echo '<p>L\'utilisateur a bien été supprimé </p>';



// nombre d'enregistrements dans la table événement
$requete = "SELECT COUNT(user_id) as nb FROM forum_users";
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
$ligne = $result->fetch_assoc();
$nb = $ligne['nb'];

echo '<p>Il y a maintenant '.$nb.' utilisateurs dans la base de donnée !</p>';


include ("../includes/footer.php");
?>