<?php
$titre = "Traitement";
include ("../includes/header.php");
include ("../includes/menu.php");
include ("../includes/sql.php");

// r�cup�ration des variables post�es dans le formulaire
// TODO : contr�les d'erreurs
$type = strip_tags($_POST['type']);
$nom=strip_tags($_POST['nom']);
$prenom=strip_tags($_POST['prenom']);
//date de d�but
$anneedebut = strip_tags($_POST['anneedebut']);
$moisdebut = strip_tags($_POST['moisdebut']);
$jourdebut = strip_tags($_POST['jourdebut']);
//date de fin
$anneefin = strip_tags($_POST['anneefin']);
$moisfin = strip_tags($_POST['moisfin']);
$jourfin = strip_tags($_POST['jourfin']);

$divers = strip_tags($_POST['divers']);

$datedeb= $anneedebut.'-'.$moisdebut.'-'.$jourdebut;
$datefin= $anneefin.'-'.$moisfin.'-'.$jourfin;

if ($datefin == "--"){
$datefin = "";
}

// requete ajout d'actualit� + envoi
$requete = "INSERT INTO evenement (nom,prenom,datedeb,datefin,divers,type) VALUES ('$nom', '$prenom','$datedeb','$datefin','$divers','$type')";
$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

// ok
//echo '<p>Merci, l\'evenement '.$nom.  ' ' .$prenom. ' a bien �t� ajout� !</p>';


// Gestion des erreurs

//Nom//

	if ($nom == '') {
		echo '<p class="erreur"> Erreur : nom non renseign�</p>';
	}

	else{
		echo 'Nom : ' .$nom.' bien ajout� ';
	}


//Pr�nom//

	if ($prenom == '') {
		echo '<p class="erreur"> Erreur : pr�nom non renseign�</p>';
	}

	else{
		echo '<p> Pr�nom : ' .$prenom.' bien ajout� </p>';
	}
	
?>

<!-- Recommencez l'insertion dans la base de donn�es -->
<a href="news.php"> Recommencez l'insertion </a>

<?php
include ("../includes/footer.php");
?>	