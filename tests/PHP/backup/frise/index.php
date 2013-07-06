<?php
$titre = "Frise";
include ("../includes/header.php");
include ("../includes/menu.php");

// connexion à la BDD MySql
include ("../includes/sql.php");

$requete = 'SELECT * FROM evenement';
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

$debfr = 1975;
$finfr = 2013;
$tampon = 5;

for ($i=$debfr ; $i < $finfr ; $i++) { 
	$tampon++;

	if (($i%10) == 0) {
		echo $i."<div 
			style= \"width:846px ;
			height:20px ;
			background: grey;
			position: absolute;
			top: ".($tampon*20)."px;
			border:1px solid\"> "
			.$i." </div>".
			"<br/>";
	}
	else
	 {
	 	echo "<div 
			style= \"width:846px ;
			height:20px ;
			background: white;
			position: absolute;
			top: ".($tampon*20)."px;
			border:1px solid\"> "
			.$i." </div>"."<br/>";
	 }
}

//tests de blocs
while ($ligne = $result->fetch_assoc()) {
	$coorY = 100 + (110 * $ligne['id']);
	$coorX = (6+ $ligne["datedeb"] - $debfr)*20;
	$finBloc = $ligne["datefin"] - $ligne["datedeb"]; 
	
	if (($finBloc * (0-1)) == $ligne["datedeb"]) {
		$finBloc = date('Y') - $ligne["datedeb"];
	}

	echo "<div 
			style= \"width:80px ;
			height:".(($finBloc*20)-20)."px ;
			background: white;
			box-shadow:2px 2px 2px #555555;
			border-radius: 0px 10px 10px 10px;
			position: absolute;
			top: ".$coorX."px;
			left: ".$coorY."px;
			border:2px orange solid;
			border-top-width: 20px;
			\">".$ligne["nom"]." ".$ligne["prenom"]."  ".$finBloc."</div>";

}

include ("../includes/footer.php");
?>