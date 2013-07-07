<!--includes -->
<?php
$titre = "";
include ("../include/header.php");
include ("../include/menu.php");
include ("../include/sql.php");
// Fin includes 

// Récupération
$requete = "SELECT * FROM evenement";
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
// fin récupération


//Affichage
echo '<table>
<tr><th>Prénom</th>
	<th>Nom</th>
	<th>date de début</th>
	<th>date de fin</th>
	<th>Divers</th>
	<th>Type</th>
	<th>Modification</th>
	<th>Suppression</th>
</tr>';



while ($ligne = $result->fetch_assoc()) {

	
		// ligne en jaune si tyoe=discipline
	if ($ligne['type'] == 'discipline') 
	{
		$fond = ' style="background: red"';
	}
	else 
	{
		$fond = '';
	}
	// fin fond



	echo '
	<tr'.$fond.'>
		<td>'.$ligne['prenom'].'</td>
		<td>'.$ligne['nom'].'</td>
		<td>'.$ligne['datedeb'].'</td>
		<td>'.$ligne['datefin'].'</td>
		<td>'.$ligne['divers'].'</td>
		<td>'.$ligne['type'].'</td>
		<td><button type="button" onclick="location.href=\'modif_BDD.php?id='.$ligne['id'].'\'">Modifier</button></td>
		td><button type="button" onclick="location.href=\'suppression_BDD.php?id='.$ligne['id'].'\'">Supprimer</button></td>
	</tr>';
}

echo '</table>';
//Fin affichage

//include footer
include ("../include/footer.php");
//fin footer

?>


