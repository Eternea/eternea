<?php
$titre = "	";
include ("../includes/header.php");
include ("../includes/menu.php");
?>




<html>
	<head> <title> Recherche </title> </head>
		<body>
			<form method="POST" action="liste_recherche.php" style="line-height:2em"  id="formulaire"> 


			<!-- recherche -->
			<label for="recherche">  Recherche : </label>
			<input type="text" name="recherche" id="nom" maxlength="100" /><br /> 
			<!-- Fin rerche -->


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


<?php
include ("../includes/footer.php");
?>
