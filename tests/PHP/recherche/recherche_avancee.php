<?php
$titre = "	";
include ("../includes/header.php");
include ("../includes/menu.php");
include("../includes/sql.php");
?>

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
<h3> Jusqu'à : </h3>

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

<?php
include ("../includes/footer.php");
?>
