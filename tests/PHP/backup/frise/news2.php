<?php
$titre = "ADMINISTRATION - Ajout d\'une actualit�";
include ("../includes/header.php");
include ("../includes/menu.php");

echo '<h1>Ajout d\'une actualit�</h1>';

// connexion � la BDD MySql
include ("../includes/sql.php");

// r�cup�ration des variables post�es dans le formulaire
// TODO : contr�les d'erreurs
$titre = $connexion->real_escape_string($_POST['titre']);
$texte = $connexion->real_escape_string($_POST['texte']);
$image = $connexion->real_escape_string($_POST['image']);
$auteur = $connexion->real_escape_string($_POST['auteur']);

// requete ajout d'actualit�
$requete = "INSERT INTO actualites (titre,texte,image,auteur,date) VALUES ('$titre', '$texte','$image','$auteur',NOW())";

//echo $requete;

// envoi de la requete
$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

// ok
echo '<p>Merci, l\'actualit� '.$titre.' a bien �t� ajout�e !</p>';


include ("../includes/footer.php");
?>