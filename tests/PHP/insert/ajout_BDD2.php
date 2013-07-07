<?php
$titre = "Traitement";
include ("../includes/header.php");
include ("../includes/menu.php");
include ("../includes/sql.php");

// récupération des variables postées dans le formulaire
// TODO : contrôles d'erreurs
$nom=strip_tags($_POST['nom']);
$prenom=strip_tags($_POST['prenom']);
$datedeb = strip_tags($_POST['datedeb']);
$datefin = strip_tags($_POST['datefin']);
$divers = strip_tags($_POST['divers']);
$type = strip_tags($_POST['type']);


if ($datefin == "null"){
$datefin = "9999";
}

// requete ajout d'actualité + envoi
$requete = "INSERT INTO evenement (nom,prenom,datedeb,datefin,divers,type) VALUES ('$nom', '$prenom','$datedeb','$datefin','$divers', '$type')";
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

//datedeb//


	if(is_numeric($datedeb))
	{
		echo '<p> Date début : '.$datedeb.' ajoutée </p> ';
	}

	else if (!is_numeric($datedeb) && $datedeb !='YYYYMMJJ')
	{
		echo '<p class="erreur"> Erreur : Date de début en numérique </p>'; 
	}

	else if ($datedeb == 'YYYYMMJJ') 
	{
		echo '<p class="erreur"> Erreur : date de début non renseignée</p>';
	}
		

//datefin//


	if(is_numeric($datefin))
	{
		echo '<p> Date de fin : '.$datefin.' ajoutée </p>';
	}

	elseif (!is_numeric($datefin) && $datefin !='YYYYMMJJ ou null')
	{
		echo '<p class="erreur"> Erreur : Date de fin en numérique et non null </p>'; 
	}

	if ($datefin == 'YYYYMMJJ ou null') 
		{
			echo '<p class="erreur"> Erreur : date de fin non renseignée </p>';
		}
		
// Divers

	if ($divers == '') 
	{
		echo '<p class="erreur"> Erreur : vous n\'avez laissé aucune description </p>';
	}


// Type

		if ($type == '') 
	{
		echo '<p class="erreur"> Erreur : vous n\'avez laissé aucun type </p>';
	}
	
?>


<!-- Recommencez l'insertion dans la base de données -->
<a href="ajout_BDD.php"> Recommencez l'insertion </a>

<?php
include ("../includes/footer.php");
?>	