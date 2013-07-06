
<?php 
// Introduction des includes
$titre = '';
include("../includes/header.php");
include("../includes/menu.php");
include("../includes/sql.php");
// Fin introduction des includes
?>


<!-- Remise du formulaire -->
	<head> <title> Recherche </title> </head>
		<body>
			<form method="POST" action="liste_recherche_avancee.php" style="line-height:2em"  id="formulaire"> 


<!-- Nom -->
<p>
<label for= "nom">Nom/ titre : </label>
<input type="text" size="50" maxlength="250"id="nom" name="nom" />
</p>


<!-- Prenom -->
<p>
<label for= "prenom">Prénom : </label>
<input id="prenom" size="50" type="text" maxlength="250" name="prenom"/>
</p>


<!-- Date début -->
<h3> A partir de : </h3>

<p><label for= "anneedepart"> année :</label>
<input id="anneedepart" size="4" type="text" maxlength="4" name="anneedepart"/>
</p>
<p><label for= "moisdepart"> mois :</label>
<input id="moisdepart" size="2" type="text" maxlength="2" name="moisdepart"/>
</p>
<p><label for= "jourdepart"> jour  :</label>
<input id="jourdepart" size="2" type="text" maxlength="2" name="jourdepart"/>
</p>


<!-- Date fin -->
<h3> Date de fin : </h3>

<p><label for= "anneefin"> année :</label>
<input id="anneefin" size="4" type="text" maxlength="4" name="anneefin"/>
</p>
<p><label for= "moisfin"> mois :</label>
<input id="moisfin" size="2" type="text" maxlength="2" name="moisfin"/>
</p>
<p><label for= "jourfin"> jour  :</label>
<input id="jourfin" size="2" type="text" maxlength="2" name="jourfin"/>
</p>



			<!-- Envoi -->
			<label for="envoi"></label>
			<input type="submit" value="OK" id="envoi" />
			<!-- Fin Envoi --> 


			<!-- Effacer -->
			<label for="Effacer"></label>
			<input type="reset" id="Effacer" /><br /> 
			<!-- Fin Effacer -->

			</form>

			<a href="recherche.php"> Recherche globale </a>
		</body>
<!-- Fin formulaire -->



<?php
//Requête
$RAnom= $_POST['nom'];
$RAprenom= $_POST['prenom'];
$RAanneedepart= $_POST['anneedepart'];
$RAmoisdepart= $_POST['moisdepart'];
$RAjourdepart= $_POST['jourdepart'];
$RAanneefin= $_POST['anneefin'];
$RAmoisfin= $_POST['moisfin'];
$RAjourfin= $_POST['jourfin'];

echo $RAanneedepart.$RAmoisdepart;

if ($RAanneedepart=="") {
	$RAanneedepart = "0001";
} 


if ($RAmoisdepart=="") {
	$RAmoisdepart = "01";
} 


if ($RAjourdepart=="") {
	$RAjourdepart = "01";
}

$RAdatedebut= $RAanneedepart.'-'.$RAmoisdepart.'-'.$RAjourdepart;

if ($RAanneefin=="") {
	$RAanneefin = "9999";
}
if ($RAmoisfin=="") {
	$RAmoisfin = "01";
}
if ($RAjourfin=="") {
	$RAjourfin = "01";
}

$RAdatefin= $RAanneefin.'-'.$RAmoisfin.'-'.$RAjourfin;



echo '<br/> Résultat de recherche';

//liste 
$requete="SELECT * FROM evenement WHERE prenom LIKE '%$RAprenom%' AND nom LIKE '%$RAnom%' AND datedeb >= '$RAdatedebut' 
AND datefin <= '$RAdatefin'"; // le problème est que les individus qui ont une datefin = null ne sont pas filtrés par une date	

if ($RAdatefin != '9999-01-01') {
	$requete = $requete." AND datefin <> '0000-00-00' ";
}

$result  =$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
//Fin liste 

//verif
echo "<br>";
echo $requete ;

//Affichage


$tableau = array();
$i=0;
while ($ligne = $result->fetch_assoc()){
// récupération des champs
	$prenom=$ligne['prenom'];
	$nom=$ligne['nom'];
	$datedeb=$ligne['datedeb'];
	$datefin=$ligne['datefin'];
	$divers=$ligne['divers'];

$tableau[$i++] = $ligne;
?>

<!-- Mise en place d'une Checkbox à côté des résultats-->
<ul>
	<form method="POST" action="liste_recherche.php" style="line-height:2em"  id="formulaire"> 
		<INPUT type="checkbox" name="nometprenom"> <?php echo ''.$nom. ' '; echo $prenom; ?>
	</form>
</ul>
<?php
}


//$requeterech = "INSERT INTO recherche (nom,prenom,datedeb,datefin,divers) VALUES ('$nom', '$prenom','$datedeb','$datefin','$divers')";
//$connexion->query($requeterech) or die ('Erreur '.$requeterech.' '.$connexion->error);

?>

<?php
//include ("../frise/frise.php");
?>


<!-- Objectif: voir si la case est cochée ou non pour la mettre dans la sauvegarde
1/ Créer un bouton ok qui renvoie vers une fonction qui ne garderait que les cases qui sont cochées ou non
2/ Vérifier celles qui sont en "on" (équivalence au true) et renvoyer les valeurs
3/ Insérer dans une table les résultats sélectionnés pour permettre une seconde recherche puis effacer automatique table dès que l'utilisateur quitte-->
