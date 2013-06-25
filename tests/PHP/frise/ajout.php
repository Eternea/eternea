<?php
$titre = "ADMINISTRATION - Ajout d'un adhérent";
include ("../includes/header.php");
include ("../includes/menu.php");
?>

<form method="POST" action="ajout2.php">
<p>Prénom : <input size="30" maxlength="50" type="text" name="prenom" /></p>
<p>Nom : <input type="text" name="nom" size="30" maxlength="50" /></p>
<p>Date de naissance :<input type="text" name="naissance" value="YYYY-MM-JJ" size="10" maxlength="10" /></p>
<p>Poids actuel : <input type="text" name="poids" size="3" maxlength="3" /></p>
<p>Mail : <input type="text" name="mail" value="user@domaine" size="50" maxlength="150" /></p>
<p>Sexe : <input type="radio" name="sexe" value="F" /> Femme
					<input type="radio" name="sexe" value="M" /> Homme
</p>
<input type="submit" />
</form>



<?php
include ("../includes/footer.php");
?>