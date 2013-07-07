<?php
$titre = "Traitement";
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
$type = strip_tags($_POST['type']);


if ($datefin == "null"){
$datefin = "9999";
}

// requete ajout d'actualit� + envoi
$requete = "INSERT INTO evenement (nom,prenom,datedeb,datefin,divers,type) VALUES ('$nom', '$prenom','$datedeb','$datefin','$divers', '$type')";
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

//datedeb//


	if(is_numeric($datedeb))
	{
		echo '<p> Date d�but : '.$datedeb.' ajout�e </p> ';
	}

	else if (!is_numeric($datedeb) && $datedeb !='YYYYMMJJ')
	{
		echo '<p class="erreur"> Erreur : Date de d�but en num�rique </p>'; 
	}

	else if ($datedeb == 'YYYYMMJJ') 
	{
		echo '<p class="erreur"> Erreur : date de d�but non renseign�e</p>';
	}
		

//datefin//


	if(is_numeric($datefin))
	{
		echo '<p> Date de fin : '.$datefin.' ajout�e </p>';
	}

	elseif (!is_numeric($datefin) && $datefin !='YYYYMMJJ ou null')
	{
		echo '<p class="erreur"> Erreur : Date de fin en num�rique et non null </p>'; 
	}

	if ($datefin == 'YYYYMMJJ ou null') 
		{
			echo '<p class="erreur"> Erreur : date de fin non renseign�e </p>';
		}
		
// Divers

	if ($divers == '') 
	{
		echo '<p class="erreur"> Erreur : vous n\'avez laiss� aucune description </p>';
	}


// Type

		if ($type == '') 
	{
		echo '<p class="erreur"> Erreur : vous n\'avez laiss� aucun type </p>';
	}
	
?>


<!-- Recommencez l'insertion dans la base de donn�es -->
<a href="ajout_BDD.php"> Recommencez l'insertion </a>

<?php
include ("../includes/footer.php");
?>	