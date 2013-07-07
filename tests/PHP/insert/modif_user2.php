<?php
$titre = "";
include ("../includes/header.php");
include ("../includes/menu.php");
include ("../includes/sql.php");


echo '<h3>Mise à jour d\'un utilisateur</h3>';
$user_id = $_GET['user_id'];


// récupération des variables postées dans le formulaire
// TODO : contrôles d'erreurs
$username= strip_tags($_POST['username']);
$user_email= strip_tags($_POST['user_email']);
$user_ip= strip_tags($_POST['user_ip']);


// requete d'ajout d'adherents
$requete = "UPDATE forum_users SET username = '$username', user_email = '$user_email', user_ip = '$user_ip' WHERE user_id = $user_id";

// envoi de la requete
$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);


// ok
echo '<p>Merci, l\'utilisateur '.$username.' a bien été modifié</p>';



// nombre d'enregistrements dans la table événement
$requete = "SELECT COUNT(user_id) as nb FROM forum_users";
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
$ligne = $result->fetch_assoc();
$nb = $ligne['nb'];

echo '<p>Il y a maintenant '.$nb.' utilisateurs dans la base de donnée !</p>';


include ("../includes/footer.php");
?>