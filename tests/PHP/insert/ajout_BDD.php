<?php
$titre = "Administration";
include ('../includes/header.php');
include ("../includes/menu.php");
include ("../includes/sql.php");
?>

<form method="POST" action="ajout_BDD2.php">


<?php
//echo "<SELECT NAME='Uti' onChange='FocusObjet()'>"; 
//$requete = "SELECT nomtypeevent  FROM typeevent"; 
//$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

//while ($tab = $result->fetch_assoc()) 
//$nomtype[]=$tab->nomtypeevent;
//echo "<select multiple size='2' id='type' name='type'>";
//for ($i = 0; $i<count($nomtype);$i++)

//echo "<OPTION VALUE='$nomtype[$i]'> $nomtype[$i]</OPTION>\n"; 

//echo "</SELECT>";
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


<!-- Date fin -->
<p>
<label for= "datefin">date de fin :</label>
<input id="datefin" size="50" type="text" maxlength="250" value="YYYY-MM-JJ ou null" name="datefin"/>
</p>


<!-- type -->
<p>
<label for= "type"> Type : </label>
<input id="type" size="50" type="text" maxlength="250" name="type"/>
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