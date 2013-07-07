<?php
$titre = "Modification dans la base de données";
include ('../includes/header.php');
include ("../includes/menu.php");
include ("../includes/sql.php");

$user_id = $_GET['user_id'];
$requete = "SELECT * FROM forum_users WHERE user_id = $user_id";
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
$ligne = $result->fetch_assoc();

$username = $ligne['username'];
$user_email = $ligne['user_email'];
$user_ip = $ligne['user_ip'];


// //echo "<SELECT NAME='Uti' onChange='FocusObjet()'>"; 
// $requete = "SELECT nomtypeevent  FROM typeevent"; 
// $result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

// while ($tab = $result->fetch_assoc()) 
// $nomtype[]=$tab->nomtypeevent;
// echo "<select multiple size='2' user_id='type' name='type'>";
// for ($i = 0; $i<count($nomtype);$i++)

// echo "<OPTION VALUE='$nomtype[$i]'> $nomtype[$i]</OPTION>\n"; 

// echo "</SELECT>";

?>

<form method="POST" action="modif_user2.php?user_id=<?php echo $user_id ?>">

<!-- username -->
<p>
<label for= "username"> Pseudo : </label>
<input type="text" size="50" maxlength="250" id="username" name="username" value="<?php echo $username ?>"/>
</p>


<!-- Email -->
<p>
<label for= "user_email"> Email : </label>
<input id="user_email" size="50" type="text" maxlength="250" name="user_email" value="<?php echo $user_email ?>"/>
</p>


<!-- Adresse IP -->
<p>
<label for= "user_ip"> Adresse IP : </label>
<input type="text" size="50" maxlength="250" id="user_ip" name="user_ip" value="<?php echo $user_ip ?>" />
</p>


<!--envoi et effacer -->
<input type="submit" value="Modifier"/>
<input type="reset" value="Recommencer"/>
</form>


<?php
include ($_SERVER['DOCUMENT_ROOT'].'/projects/test/includes/footer.php');
?>