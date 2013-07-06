<?php
$titre = "ADMINISTRATION - Ajout d'une actualité";
include ($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
include ("../includes/menu.php");
?>

<form method="POST" action="news2.php">
<p>Titre : <input size="100" maxlength="250" type="text" name="titre" /></p>
<p>Auteur : <input type="text" name="auteur" size="100" maxlength="250" /></p>
<p>Lien vers l'image :<input type="text" name="image" value="http://" size="100" maxlength="250" /></p>
<p>Texte : 
<textarea name="texte" rows="30" cols="80" /></textarea>
<input type="submit" />
</form>



<?php
include ($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
?>