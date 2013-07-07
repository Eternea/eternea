<?php
$titre = "";
include ("../includes/header.php");
include ("../includes/menu.php");
include ("../includes/sql.php");


echo '<h3>Mise à jour d\'un événement</h3>';
$id = $_GET['id'];


// récupération des variables postées dans le formulaire
// TODO : contrôles d'erreurs
$prenom= strip_tags($_POST['prenom']);
$nom= strip_tags($_POST['nom']);
$datedeb= strip_tags($_POST['datedeb']);
$datefin= strip_tags($_POST['datefin']);
$divers= strip_tags($_POST['divers']);
$type= strip_tags($_POST['type']);


// requete d'ajout d'adherents
$requete = "UPDATE evenement SET prenom = '$prenom', nom = '$nom', datedeb = '$datedeb', datefin = '$datefin', divers = '$divers', type ='$type' WHERE id = $id";

// envoi de la requete
$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);


// ok
echo '<p>Merci, l\'événement '.$prenom.' '.$nom.' a bien été modifié</p>';



// nombre d'enregistrements dans la table événement
$requete = "SELECT COUNT(id) as nb FROM evenement";
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
$ligne = $result->fetch_assoc();
$nb = $ligne['nb'];

echo '<p>Il y a maintenant '.$nb.' événements dans la base de donnée !</p>';


include ("../includes/footer.php");
?>