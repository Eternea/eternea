<?php
$titre = "Modification dans la base de données";
include ('../includes/header.php');
include ("../includes/menu.php");
include ("../includes/sql.php");

$id = $_GET['id'];
$requete = "SELECT * FROM evenement WHERE id = $id";
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
$ligne = $result->fetch_assoc();


$prenom = $ligne['prenom'];
$nom = $ligne['nom'];
$datedeb = $ligne['datedeb'];
$datefin =$ligne['datefin'];
$divers =$ligne['divers'];
$type = $ligne['type'];


// //echo "<SELECT NAME='Uti' onChange='FocusObjet()'>"; 
// $requete = "SELECT nomtypeevent  FROM typeevent"; 
// $result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

// while ($tab = $result->fetch_assoc()) 
// $nomtype[]=$tab->nomtypeevent;
// echo "<select multiple size='2' id='type' name='type'>";
// for ($i = 0; $i<count($nomtype);$i++)

// echo "<OPTION VALUE='$nomtype[$i]'> $nomtype[$i]</OPTION>\n"; 

// echo "</SELECT>";

?>

<form method="POST" action="modif_BDD2.php?id=<?php echo $id ?>">

<!-- Nom -->
<p>
<label for= "nom">Nom/ titre : </label>
<input type="text" size="50" maxlength="250"id="nom" name="nom" value="<?php echo $nom ?>"/>
</p>


<!-- Prenom -->
<p>
<label for= "prenom">Prénom : </label>
<input id="prenom" size="50" type="text" maxlength="250" name="prenom" value="<?php echo $prenom ?>"/>
</p>


<!-- Date début -->
<p>
<label for= "datedeb">date de naissance :</label>
<input id="datedeb" size="50" type="text" maxlength="250" name="datedeb" value="<?php echo $datedeb ?>"/>
</p>


<!-- Date fin -->
<p>
<label for= "datefin">date de fin :</label>
<input id="datefin" size="50" type="text" maxlength="250" value="<?php echo $datefin ?>" name="datefin"/>
</p>


<!-- Type -->
<p>
<label for= "type"> Type : </label>
<input type="text" size="50" maxlength="250"id="type" name="type" value="<?php echo $type ?>" />
</p>

<!-- divers -->
<p>
<label for= "divers"> Divers : </label>
<textarea name="divers" rows="30" cols="80" value="<?php echo $divers ?>"/></textarea>
</p>


<!--envoi et effacer -->
<input type="submit" value="Modifier"/>
<input type="reset" value="Recommencer"/>
</form>


<?php
include ($_SERVER['DOCUMENT_ROOT'].'/projects/test/includes/footer.php');
?>