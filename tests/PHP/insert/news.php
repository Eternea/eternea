<?php
$titre = "Administration";
include ('../includes/header.php');
include ("../includes/menu.php");
include ("../includes/sql.php");
?>

<form method="POST" action="news2.php">

<!-- Type -->
<?php
//echo "<SELECT NAME='Uti' onChange='FocusObjet()'>"; 
$requete = "SELECT nomtypeevent  FROM typeevent"; 
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

while ($tab = $result->fetch_assoc()) 
$nomtype[]=$tab->nomtypeevent;
echo "<select multiple size='2' id='type' name='type'>";
for ($i = 0; $i<count($nomtype);$i++)

echo "<OPTION VALUE='$nomtype[$i]'> $nomtype[$i]</OPTION>\n"; 

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
<!-- Date début -->
<p>
<label for= "datedeb">date de naissance :</label>
<input id="datedeb" size="50" type="text" maxlength="250" value="YYYY-MM-JJ" name="datedeb"/>
</p>

<!-- Date début -->
<p>
<label for= "datefin">date de fin :</label>
<input id="datefin" size="50" type="text" maxlength="250" value="YYYY-MM-JJ ou null" name="datefin"/>
</p>

<p>
<label for= "datefin"> Divers : </label>
<textarea name="divers" rows="30" cols="80" /></textarea>
</p>
<input type="submit" />
</form>



<?php
include ($_SERVER['DOCUMENT_ROOT'].'/projects/test/includes/footer.php');
?>