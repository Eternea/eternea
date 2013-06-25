
<?php 
// Introduction des includes
$titre = '';
include("../includes/header.php");
include("../includes/menu.php");
include("../includes/sql.php");
// Fin introduction des includes
?>


<!-- Remise du formulaire -->
<html>
	<head> <title> Recherche </title> </head>
		<body>
			<form method="POST" action="liste_recherche.php" style="line-height:2em"  id="formulaire"> 


			<!-- recheche -->
			<label for="recherche">  Recherche : </label>
			<input type="text" name="recherche" id="nom" maxlength="100" /><br /> 
			<!-- Fin nom -->


			<!-- Envoi -->
			<label for="envoi"></label>
			<input type="submit" value="OK" id="envoi" />
			<!-- Fin Envoi --> 


			<!-- Effacer -->
			<label for="Effacer"></label>
			<input type="reset" id="Effacer" /><br /> 
			<!-- Fin Effacer -->

			</form>
		</body>
</html>
<!-- Fin formulaire -->



<?php
//Requête
$recherche= $_POST['recherche'];
echo ' Votre recherche : ' .$recherche. '';

//liste 
$requete="SELECT * FROM evenement WHERE prenom LIKE '%$recherche%' OR nom LIKE '%$recherche%' OR datedeb LIKE '%$recherche%' 
OR datefin LIKE '%$recherche%' OR divers like '%$recherche%' ";

$result  =$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
//Fin liste 


//Affichage
echo '<ul>';

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
	<form method="POST" action="liste_recherche.php" style="line-height:2em"  id="formulaire"> 
		<INPUT type="checkbox" name="nometprenom"> <?php echo ''.$nom. ' '; echo $prenom; ?>
		<br/>
	</form> <br/>
</ul>
<hr/>

<?php
}


$requeterech = "INSERT INTO recherche (nom,prenom,datedeb,datefin,divers) VALUES ('$nom', '$prenom','$datedeb','$datefin','$divers')";
//$connexion->query($requeterech) or die ('Erreur '.$requeterech.' '.$connexion->error);

?>

<?php
include ("../frise/frise.php");
?>

<!-- Objectif: voir si la case est cochée ou non pour la mettre dans la sauvegarde
1/ Créer un bouton ok qui renvoie vers une fonction qui ne garderait que les cases qui sont cochées ou non
2/ Vérifier celles qui sont en "on" (équivalence au true) et renvoyer les valeurs
3/ Insérer dans une table les résultats sélectionnés pour permettre une seconde recherche puis effacer automatique table dès que l'utilisateur quitte-->
