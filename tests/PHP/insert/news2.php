<?php
$titre = "Administration";
include ("../includes/header.php");
include ("../includes/menu.php");

echo '<h1>Ajout d\'un évènement</h1>';

// connexion à la BDD MySql
include ("../includes/sql.php");

// récupération des variables postées dans le formulaire
// TODO : contrôles d'erreurs
$nom = $connexion->real_escape_string($_POST['nom']);
$prenom = $connexion->real_escape_string($_POST['prenom']);
$datedeb = $connexion->real_escape_string($_POST['datedeb']);
$datefin = $connexion->real_escape_string($_POST['datefin']);
$divers = $connexion->real_escape_string($_POST['divers']);

if ($datefin == "null"){
$datefin = "";
}

// requete ajout d'actualité
$requete = "INSERT INTO evenement (nom,prenom,datedeb,datefin,divers) VALUES ('$nom', '$prenom','$datedeb','$datefin','$divers')";

//echo $requete;

// envoi de la requete
$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

// ok
echo '<p>Merci, l\'evenement '.$nom.' a bien été ajouté !</p>';


include ("../includes/footer.php");
?>