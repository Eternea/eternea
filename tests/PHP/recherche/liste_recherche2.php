

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


//requête qui liste l'actualitée souhaitée
	$requete="SELECT *from recherche";
	$result  = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

	echo $result;

