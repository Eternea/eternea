
<?php
$titre = "";
include ("../includes/header.php");
include ("../includes/menu.php");
include ("../includes/sql.php");
?>


<?php

$pseudo=strip_tags($_POST['pseudo']);
$mot_de_passe=strip_tags($_POST['mot_de_passe']);
$mot_de_passe2 = strip_tags($_POST['mot_de_passe2']);
$mail = strip_tags($_POST['mail']);


// tout est ok + abonnement
if($mot_de_passe == $mot_de_passe2 && $pseudo !='' && $mot_de_passe !='' && $mot_de_passe2 !='' && $mail !='@' && isset($_POST['lu_et_accepte']) && (isset($_POST['abonnement'])) ){
	$requete = "INSERT INTO utilisateurs (pseudo,mot_de_passe,mail,abonnement) VALUES ('$pseudo', '$mot_de_passe','$mail','oui')";
	$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
	echo 'Votre inscription a bien été enregistrée';
}


// tout est ok + pas d'abonnement
else if($mot_de_passe == $mot_de_passe2 && $pseudo !='' && $mot_de_passe !='' && $mot_de_passe2 !='' && $mail !='@' && isset($_POST['lu_et_accepte']) && (!isset($_POST['abonnement'])) ){
	$requete = "INSERT INTO utilisateurs (pseudo,mot_de_passe,mail,abonnement) VALUES ('$pseudo', '$mot_de_passe','$mail','non')";
	$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
	echo 'Votre inscription a bien été enregistrée';
}


// Gestion des champs non renseignés
// else if ($pseudo=' ' || $mot_de_passe='****' || $mot_de_passe2=' ' || $mail='@' || !isset($_POST['lu_et_accepte'])){
// 	echo 'Il vous manque des données';
	
	if ($pseudo=' '){
		echo' <p class="erreur"> Erreur : pseudo non renseigné ';
	}

	if ( $mot_de_passe='****' || $mot_de_passe2=' '){
		echo' <p class="erreur"> Erreur : Mot de passe non renseigné ';
	}

	if ($mail='@'){
		echo' <p class="erreur"> Erreur : mail non renseigné ';
	}

	if (!isset($_POST['lu_et_accepte'])){
		echo' <p class="erreur"> Erreur : Erreur: veuillez accepter les conditions d\'utilisation ';
	}
// }


// Gestion des champs déjà existants
$requeta = "SELECT COUNT(id) as nb FROM utilisateurs";
$result = $connexion->query($requeta) or die ('Erreur '.$requeta.' '.$connexion->error);
$ligne = $result->fetch_assoc();
$nb = $ligne['nb'];
$pseudo_recherche=$ligne['pseudo'];

echo $pseudo_recherche;
	// for ($i=0; $i<=$nb;$i++){
	// 	if ($pseudo=$peudo_recherche){
	// 		echo 'Pseudo déjà pris';
	// 	}
	// }


// // Gestion des mots de passe: doivent être identiques
// 	if ($mot_de_passe != $mot_de_passe2) {
// 		echo' <p class="erreur"> Erreur : les mots de passe saisis sont différents';
// 	}

?>


<?php
include ("../includes/footer.php");
?>
