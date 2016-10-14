<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="Contenu/gabarit.css" />
    <link rel="stylesheet" href="Contenu/vueAccueil.css" />

    <title><?= $titre ?></title>
</head>


  <body>

    <header>
      <div id="logo">
        <a href="index.php?page=accueil"><img id="logo" src="Autres/LogoISEPBands.png" width="460" height="300" ></a>
      </div>
      <div class="bienvenue">
        <h1>Bienvenue sur le site d'ISEP Bands !</h1>
      </div>
    </header>

    <div id="wrap">
      <div id="main" class="clearfix">
        <?= $contenu ?>
      </div>
    </div>

    <footer>
        ISEPBands &copy; 2016 - Tous droits r&eacute;serv&eacute;s
    </footer>

  </body>

</html>
