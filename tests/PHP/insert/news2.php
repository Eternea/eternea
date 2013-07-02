<?php
$titre = "Administration";
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


if ($datefin == "null"){
$datefin = "";
}

// requete ajout d'actualité + envoi
$requete = "INSERT INTO evenement (nom,prenom,datedeb,datefin,divers) VALUES ('$nom', '$prenom','$datedeb','$datefin','$divers')";
$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

// ok
echo '<p>Merci, l\'evenement '.$nom. .$prenom. ' a bien été ajouté !</p>';


// Gestion des erreurs

//Nom//

	if ($nom == '') {
		echo '<p class="erreur">Nom non renseigné</p>';
	}

	else{
		echo 'nom : ' .$nom.' bien rajouté ';
	}

	echo '<br/>';



//Prénom//

	if ($prenom == '') {
		echo '<p class="erreur"> PRénom non renseigné</p>';
	}

	else{
		echo 'prénom : ' .$prénom.' bien rajouté ';
	}

	echo '<br/>';



//datedeb//


	if(is_numeric($datedeb))
	{
		echo 'Date début : '.$datedeb.' ajoutée ';
	}

	elseif (!is_numeric($datedeb))
	{
		echo '<p class="erreur"> L\'année renseignée n\'est pas valide</p>'; 
	}

	if ($datedeb == '') 
		{
			echo '<p class="erreur">Naissance non renseignée</p>';
		}
		

		echo '<hr/>';



//datefin//


	if(is_numeric($datefin))
	{
		echo 'Date de fin : '.$datefin.' ajoutée ';
	}

	elseif (!is_numeric($datefin))
	{
		echo '<p class="erreur"> L\'année renseignée n\'est pas valide</p>'; 
	}

	if ($datefin == '') 
		{
			echo '<p class="erreur">Naissance non renseignée</p>';
		}
		

		echo '<hr/>';


// Divers



	if ($divers == '') 
	{
		echo '<p class="erreur">Vous n avez laissé aucun commentaire</p>';
	}
	
	echo '<hr/>';


include ("../includes/footer.php");
?>	