Eternea : projet PHP
====================

## Structure des répertoires ##

 - `/class/` : chaque fichier contenu correspond à une classe PHP permettant d'accéder à la base de données [Inaccessible aux internautes]
 - `/config/` : contient la configuration du projet [Inaccessible aux internautes]
 - `/includes/` : chaque fichier contenu correspond à un contrôleur [Inaccessible aux internautes]
 - `/static/` : contient feuilles de style, images et autres médias non-générés par PHP
   - `/static/css/`
   - `/static/images/`
      - `/static/images/design` : images, icônes, arrière-plans relatifs au design du site
 - `/templates/` : contient les templates PHP servant à l'affichage des pages [Inaccessible aux internautes]

 ## Fichiers ##

- `/index.php` : page par laquelle transite toutes les requêtes dynamiques (= pages du site générées via PHP)
- `/README.md` : description du projet
- dans `/config/` :
  - `/config/config.ini` 	: fichier INI permettant de paramétrer l'installation
  - `/config/pages.txt` 	: liste des pages autorisées
  - `/config/tests.db` 		: base de données de test
  - `/config/.secret_key` 	: clé secrète permettant de chiffrer les mots de passe