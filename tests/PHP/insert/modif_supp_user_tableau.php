<!--includes -->
<?php
$titre = "";
include ("../includes/header.php");
include ("../includes/menu.php");
include ("../includes/sql.php");
// Fin includes 

// Récupération
$requete = 'SELECT * FROM forum_users';
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
// fin récupération


//Affichage
echo '<table>
<tr>
	<th>Nom</th>
	<th>Email</th>
	<th>Adresse IP</th>
	<th>Modification</th>
	<th>Suppression</th>
</tr>';



while ($ligne = $result->fetch_assoc()) {



	echo '
	<tr>
		<td>'.$ligne['username'].'</td>
		<td>'.$ligne['user_email'].'</td>
		<td>'.$ligne['user_ip'].'</td>
		<td><button type="button" onclick="location.href=\'modif_user.php?user_id='.$ligne['user_id'].'\'">Modifier</button></td>
		<td><button type="button" onclick="location.href=\'suppression_user.php?user_id='.$ligne['user_id'].'\'">Supprimer</button></td>
	</tr>';
}

echo '</table>';
//Fin affichage

//include footer
include ("../includes/footer.php");
//fin footer

?>


