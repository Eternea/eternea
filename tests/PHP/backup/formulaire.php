<?php
$titre = "Accueil du site";
include ("includes/header.php");
include ("includes/menu.php");
?>

<form method="POST" action="traitement.php">
<p>Pr�nom <input type="text" name="prenom" /></p>
<p>Nom <input type="text" name="nom" /></p>
<p>Ann�e de naissance<input type="text" name="naissance" /></p>
<input type="submit" />
</form>



<?php
include ("includes/footer.php");
?>