<?php 
/*
    index.php permet :
        1. de charger la configuration
        2. la connexion à la base de données 
        3. appeler le contrôleur correspondant
        4. de renvoyer le rendu déterminé par le template
*/


/* * * 
 1. Chargement de la configuration
 * * */

// définition des constantes dynamiques
define("SERVER_NAME", $_SERVER["SERVER_NAME"]);
define("ROOT", $_SERVER["DOCUMENT_ROOT"]);

// chargement du fichier config.ini
$config = parse_ini_file(ROOT."/config/config.ini");

// définition des constantes à partir du fichier
foreach ($config as $key => $value) {
    define($key, $value);
}

/* * * 
 2. Connexion à la base de données
 * * */

// On tente la connexion
try {
    // On instancie la connexion selon les paramètres en bdd
    $pdo = new PDO(
        DATABASE_DSN,
        DATABASE_USER, 
        DATABASE_PASSWORD, 
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") // on défini l'UTF-8
    );

    // on défini l'attribut "ATTR_ERRMODE afin de lever une exception en cas d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    $msg = "Base de données inaccessible.";
    die($msg);
}


/* * * 
 3. Routage des requêtes
 * * */
class BlackListException extends Exception {} // sert à lever une exception personnalisée qu'on récupère ensuite pour faire une erreur 404

try {
    // chargement de la liste des pages autorisées
    $whitelist = file(ROOT."/config/pages.txt");

    // si la page fait partie des pages autorisées
    if(is_int(array_search($_GET["page"], $whitelist))){
        // controleur
        require(ROOT."/includes/".$_GET["page"].".inc.php");

        // structure de la page
        require(ROOT."/templates/base.tpl.php");
    }
    else{
        throw new BlackListException('page refusée');
    }
}
catch(BlackListException $e){
    print_r($e);
    header("HTTP/1.0 404 Not Found");
}

?>