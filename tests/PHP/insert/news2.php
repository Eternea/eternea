<?php
$titre = "Administration";
include ("../includes/header.php");
include ("../includes/menu.php");
include ("../includes/sql.php");

// r�cup�ration des variables post�es dans le formulaire
// TODO : contr�les d'erreurs
$nom=strip_tags($_POST['nom']);
$prenom=strip_tags($_POST['prenom']);
$datedeb = strip_tags($_POST['datedeb']);
$datefin = strip_tags($_POST['datefin']);
$divers = strip_tags($_POST['divers']);


if ($datefin == "null"){
$datefin = "";
}

// requete ajout d'actualit� + envoi
$requete = "INSERT INTO evenement (nom,prenom,datedeb,datefin,divers) VALUES ('$nom', '$prenom','$datedeb','$datefin','$divers')";
$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

// ok
echo '<p>Merci, l\'evenement '.$nom. .$prenom. ' a bien �t� ajout� !</p>';


// Gestion des erreurs

//Nom//

	if ($nom == '') {
		echo '<p class="erreur">Nom non renseign�</p>';
	}

	else{
		echo 'nom : ' .$nom.' bien rajout� ';
	}

	echo '<br/>';



//Pr�nom//

	if ($prenom == '') {
		echo '<p class="erreur"> PR�nom non renseign�</p>';
	}

	else{
		echo 'pr�nom : ' .$pr�nom.' bien rajout� ';
	}

	echo '<br/>';



//datedeb//


	if(is_numeric($datedeb))
	{
		echo 'Date d�but : '.$datedeb.' ajout�e ';
	}

	elseif (!is_numeric($datedeb))
	{
		echo '<p class="erreur"> L\'ann�e renseign�e n\'est pas valide</p>'; 
	}

	if ($datedeb == '') 
		{
			echo '<p class="erreur">Naissance non renseign�e</p>';
		}
		

		echo '<hr/>';



//datefin//


	if(is_numeric($datefin))
	{
		echo 'Date de fin : '.$datefin.' ajout�e ';
	}

	elseif (!is_numeric($datefin))
	{
		echo '<p class="erreur"> L\'ann�e renseign�e n\'est pas valide</p>'; 
	}

	if ($datefin == '') 
		{
			echo '<p class="erreur">Naissance non renseign�e</p>';
		}
		

		echo '<hr/>';


// Divers



	if ($divers == '') 
	{
		echo '<p class="erreur">Vous n avez laiss� aucun commentaire</p>';
	}
	
	echo '<hr/>';


include ("../includes/footer.php");
?>	