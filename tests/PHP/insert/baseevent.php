<?php
$titre = "évenements";
include ("../includes/header.php");
include ("../includes/menu.php");

echo '<h1>Liste des évènements</h1>';

// connexion à la BDD MySql
include ("../includes/sql.php");

$requete = 'SELECT * FROM evenement';
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

echo '<table>
<tr><th>Prénom</th><th>Nom</th><th>Date debut</th>
<th>Date fin</th><th>Durée</th><th>divers</th></tr>';

while ($ligne = $result->fetch_assoc()) {

//age
$finevent = $ligne['datefin'];
if ($finevent == "0000-00-00"){
$age = time() - strtotime($ligne['datedeb']);
$datefin = "null";
}
else{
$age = strtotime($ligne['datefin']) - strtotime($ligne['datedeb']);
$datefin = $ligne['datefin'];
}
$age = number_format($age / (3600 * 24 * 365),0);

	echo '
	<tr>
		<td>'.$ligne['prenom'].'</td>
		<td>'.$ligne['nom'].'</td>
		<td>'.$ligne['datedeb'].'</td>
		<td>'.$datefin.'</td>
		<td>'.$age.'</td>
		<td>'.$ligne['divers'].'</td>
	</tr>';
}
echo '</table>';






/* tant qu'il y a un enregistrement, les instructions dans la boucle s'exécutent
while ($ligne = $resultat->fetch_assoc()) {
}
*/
include ("../includes/footer.php");
?>