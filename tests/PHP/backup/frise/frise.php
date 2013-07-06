

<div id="afficheFrise">
<div id="date">

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
		echo "<div 
			style= \"width:40px ;
			height:20px ;
			background: grey;
			top: ".($tampon*20)."px;
			border:1px solid\"> "
			.$i." </div>"
			;
	}
	else
	 {
	 	echo "<div 
			style= \"width:40px ;
			height:20px ;
			background: white;
			top: ".($tampon*20)."px;
			border:1px solid\"> "
			.$i." </div>";
	 }
}
echo "</div>";
echo "<div id=\"frise\">";
for ($i = 0; $i < count($tableau); $i++){
	$coorY = 210 + (110 * $i);
	$coorX = ($tableau[$i]["datedeb"] - $debfr + 5)*20;
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
			position: relative;
			top: ".$coorX."px;
			left: ".$coorY."px;
			border:2px orange solid;
			border-top-width: 20px;
			\">".$coorX.$tableau[$i]["nom"]." ".$tableau[$i]["prenom"]."  ".$finBloc."</div>";

}
echo "</div>";
include ("../includes/footer.php");
?>