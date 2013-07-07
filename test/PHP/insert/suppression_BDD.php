<?php
$titre = "";
include ("../includes/header.php");
include ("../includes/menu.php");
include ("../includes/sql.php");


echo '<h3>MSuppression d\'un événment</h3>';
$id = $_GET['id'];

// requete d'ajout d'adherents
$requete = " DELETE from evenement WHERE id = $id";

// envoi de la requete
$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);


// ok
echo '<p>L\'événement '.$prenom.' '.$nom.' a bien été supprimé </p>';



// nombre d'enregistrements dans la table événement
$requete = "SELECT COUNT(id) as nb FROM evenement";
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
$ligne = $result->fetch_assoc();
$nb = $ligne['nb'];

echo '<p>Il y a maintenant '.$nb.' événements dans la base de donnée !</p>';


include ("../includes/footer.php");
?>