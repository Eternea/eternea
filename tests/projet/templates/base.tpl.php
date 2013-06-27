<html lang=fr>
  <head>
  	<meta charset="utf-8" />
  	<title>Titre de la page</title>
  	<link href="/static/css/knacss.css" rel="stylesheet" />
  	<link href="/static/css/design.css" rel="stylesheet" />
  </head>

  <body>
    <header class="row id-header">Nom du site, liste de liens</header>
		
		<div id="header" class="row">
			<?php
			    require(ROOT."/templates/".$_GET["page"].".tpl.php"); 
			?>
    </div>
  </body>
</html>