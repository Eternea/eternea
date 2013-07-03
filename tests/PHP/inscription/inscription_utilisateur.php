
<?php
$titre = "";
include ("../includes/header.php");
include ("../includes/menu.php");
include ("../includes/sql.php");
?>


<html>
    <head>
    <title> Inscription</title> 
    <meta charset="UTF-8">
    </head>
        <body>
        <h3> Bonjour, veuillez entrer les informations suivantes afin de vous inscrire </h3>
        <form method="post" action="traitement_inscription.php" >
       
            <table>
            

            <!-- pseudo -->
            <tr>
                <td><label for="pseudo"><strong> Nom d'utilisateur * : </strong></label></td>
                <td><input type="text" name="pseudo" id="pseudo"/></td>
            </tr>
           

            <!-- mot de passe -->
            <tr>
                <td><label for="mot_de_passe"><strong> Mot de passe * :</strong></label></td>
                <td><input type="password" name="mot_de_passe" id="mot_de_passe"/></td>
            </tr>
           

            <!-- confirmation mot de passe -->
            <tr>
                <td><label for="mot_de_passe2"><strong> Vérification du mot de passe * :</strong></label></td>
                <td><input type="password" name="mot_de_passe2" id="mot_de_passe2"/></td>
            </tr>
           
            <!-- Adresse email -->
              <tr>
                <td><label for="mail"><strong> Adresse e-mail * :</strong></label></td>
                <td><input type="text" name="mail" id="mail" value="@"/></td>
            </tr>

            </table>

            <!-- inscription newsletter -->
            <input type="checkbox" name="abonnement" id="abonnement" checked> M'abonner à la newsletter <br>

            <!-- Accepter les conditions -->
            <input type="checkbox" name="lu_et_accepte" id="lu_et_accepte" checked> J'ai lu et j'accepte les <a href="conditions_utilisation.php">conditions d'utilisation * </a><br>
            
            <br/>
            * informations obligatoires
            <br/>    

        <input type="submit" name="register" value="S'inscrire"/>
       
        </form>


   
    </body>

</html>


<?php
include ("../includes/footer.php");
?>
