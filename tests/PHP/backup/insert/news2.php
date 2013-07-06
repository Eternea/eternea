<?php
$titre = "Administration";
include ("../includes/header.php");
include ("../includes/menu.php");

echo '<h1>Ajout d\'un �v�nement</h1>';

// connexion � la BDD MySql
include ("../includes/sql.php");

// r�cup�ration des variables post�es dans le formulaire
// TODO : contr�les d'erreurs
$nom = $connexion->real_escape_string($_POST['nom']);
$prenom = $connexion->real_escape_string($_POST['prenom']);
$datedeb = $connexion->real_escape_string($_POST['datedeb']);
$datefin = $connexion->real_escape_string($_POST['datefin']);
$divers = $connexion->real_escape_string($_POST['divers']);
$type=$connexion->real_escape_string($_POST['type']);
if ($datefin == "null"){
$datefin = "";
}

// requete ajout d'actualit�
$requete = "INSERT INTO evenement (nom,prenom,datedeb,datefin,divers,type) VALUES ('$nom', '$prenom','$datedeb','$datefin','$divers','$type')";

//echo $requete;

// envoi de la requete
$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

// ok
echo '<p>Merci, l\'evenement '.$nom.' a bien �t� ajout� !</p>';


include ("../includes/footer.php");
?>