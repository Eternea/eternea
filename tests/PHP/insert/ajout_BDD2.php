<?php
$titre = "Traitement";
include ("../includes/header.php");
include ("../includes/menu.php");
include ("../includes/sql.php");

// récupération des variables postées dans le formulaire
// TODO : contréles d'erreurs
$type = strip_tags($_POST['type']);
$nom=strip_tags($_POST['nom']);
$prenom=strip_tags($_POST['prenom']);
//date de début
$anneedebut = strip_tags($_POST['anneedebut']);
$moisdebut = strip_tags($_POST['moisdebut']);
$jourdebut = strip_tags($_POST['jourdebut']);
//date de fin
$anneefin = strip_tags($_POST['anneefin']);
if ($anneefin == "") {
	$moisfin = "";
	$jourfin = "";
} else {
	$moisfin = strip_tags($_POST['moisfin']);
	$jourfin = strip_tags($_POST['jourfin']);
}

$divers = strip_tags($_POST['divers']);

$datedeb= $anneedebut.'-'.$moisdebut.'-'.$jourdebut;
$datefin= $anneefin.'-'.$moisfin.'-'.$jourfin;

if ($datefin == "--"){
$datefin = "";
}

// requete ajout d'actualité + envoi
$requete = "INSERT INTO evenement (nom,prenom,datedeb,datefin,divers,type) VALUES ('$nom', '$prenom','$datedeb','$datefin','$divers','$type')";
$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

// ok
//echo '<p>Merci, l\'evenement '.$nom.  ' ' .$prenom. ' a bien été ajouté !</p>';


// Gestion des erreurs

//Nom//

	if ($nom == '') {
		echo '<p class="erreur"> Erreur : nom non renseigné</p>';
	}

	else{
		echo 'Nom : ' .$nom.' bien ajouté ';
	}


//Prénom//

	if ($prenom == '') {
		echo '<p class="erreur"> Erreur : prénom non renseigné</p>';
	}

	else{
		echo '<p> Prénom : ' .$prenom.' bien ajouté </p>';
	}
	
?>

<!-- Recommencez l'insertion dans la base de données -->
<a href="news.php"> Recommencez l'insertion </a>

<?php
include ("../includes/footer.php");
?>	
