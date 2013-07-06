<?php
$titre = "ADMINISTRATION - Ajout d\'une actualité";
include ("../includes/header.php");
include ("../includes/menu.php");

echo '<h1>Ajout d\'une actualité</h1>';

// connexion à la BDD MySql
include ("../includes/sql.php");

// récupération des variables postées dans le formulaire
// TODO : contrôles d'erreurs
$titre = $connexion->real_escape_string($_POST['titre']);
$texte = $connexion->real_escape_string($_POST['texte']);
$image = $connexion->real_escape_string($_POST['image']);
$auteur = $connexion->real_escape_string($_POST['auteur']);

// requete ajout d'actualité
$requete = "INSERT INTO actualites (titre,texte,image,auteur,date) VALUES ('$titre', '$texte','$image','$auteur',NOW())";

//echo $requete;

// envoi de la requete
$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

// ok
echo '<p>Merci, l\'actualité '.$titre.' a bien été ajoutée !</p>';


include ("../includes/footer.php");
?>