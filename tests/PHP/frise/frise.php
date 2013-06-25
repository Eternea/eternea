<?php



$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
//query($requete) = ok
foreach ($tableau as $valeur){
	if (!isset($debfr) || $debfr>$valeur['datedeb']){
		$debfr=$valeur['datedeb'];
	}
}


$finfr = 2013;
$tampon = 5;

for ($i=$debfr-5 ; $i < $finfr ; $i++) { 
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

for ($i = 0; $i < count($tableau); $i++){
	$coorY = 200 + (110 * $i);
	$coorX = (6+ $tableau[$i]["datedeb"] +5 - $debfr)*20;
	$finBloc = $tableau[$i]["datefin"] - $tableau[$i]["datedeb"]; 
	
	if (($finBloc * (0-1)) == $tableau[$i]["datedeb"]) {
		$finBloc = date('Y') - $tableau[$i]["datedeb"];
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
			\">".$tableau[$i]["nom"]." ".$tableau[$i]["prenom"]."  ".$finBloc."</div>";

}

include ("../includes/footer.php");
?>