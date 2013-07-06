<?php
$titre = "ADMINISTRATION - Ajout d\'un adhérent";
include ("../includes/header.php");
include ("../includes/menu.php");

echo '<h1>Ajout d\'un adhérent</h1>';

// récupération des variables postées dans le formulaire
// TODO : contrôles d'erreurs
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$naissance = $_POST['naissance'];
$mail = $_POST['mail'];
$sexe = $_POST['sexe'];
$poids = $_POST['poids'];

// requete d'ajout d'adherents
$requete = "INSERT INTO adherents (prenom,nom,naissance,mail,sexe,poids) VALUES ('$prenom', '$nom','$naissance','$mail','$sexe',$poids)";

// connexion à la BDD MySql
include ("../includes/sql.php");

// envoi de la requete
$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

// ok
echo '<p>Merci, l\'adhérent '.$prenom.' '.$nom.' a bien été ajouté</p>';

// nombre d'enregistrements dans la table adhérents
$requete = "SELECT COUNT(id) as nb FROM adherents";

// envoi de la requete
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
$ligne = $result->fetch_assoc();
$nb = $ligne['nb'];

echo '<p>Il y a maintenant '.$nb.' adhérents dans le club !</p>';

// nombre d'enregistrements dans la table adhérents
$requete = "SELECT id FROM adherents";

// envoi de la requete
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
$nb = $result->num_rows;

echo '<p>Il y a maintenant '.$nb.' adhérents dans le club !</p>';





include ("../includes/footer.php");
?>