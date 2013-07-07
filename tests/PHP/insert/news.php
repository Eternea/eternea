<?php
$titre = "Administration";
include ('../includes/header.php');
include ("../includes/menu.php");
include ("../includes/sql.php");
?>

<form method="POST" action="news2.php">

<?php
$requete = "SELECT nomtypeevent  FROM typeevent"; 
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

echo "Type d'évènement: ";
while ($tab = $result->fetch_assoc()) 
$nomtype[]=$tab['nomtypeevent'];
echo "<select id='type' name='type'>";
for ($i = 0; $i<count($nomtype);$i++)

echo "<OPTION VALUE=" .$nomtype[$i]. '>' .$nomtype[$i].'</OPTION>\n'; 
echo "</SELECT>";
?>

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


<h3> Date de début : </h3>

<p><label for= "anneedebut"> année :</label>
<input id="anneedebut" size="4" type="text" maxlength="4" name="anneedebut"/>
</p>
<p><label for= "moisdebut"> mois :</label>
<input id="moisdebut" size="2" type="text" maxlength="2" name="moisdebut"/>
</p>
<p><label for= "jourdebut"> jour  :</label>
<input id="jourdebut" size="2" type="text" maxlength="2" name="jourdebut"/>
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


<!-- divers -->
<p>
<label for= "divers"> Divers : </label>
<textarea name="divers" rows="30" cols="80" /></textarea>
</p>


<!--envoi et effacer -->
<input type="submit"/>
<input type="reset"/>
</form>


<?php
include ($_SERVER['DOCUMENT_ROOT'].'/projects/test/includes/footer.php');
?>