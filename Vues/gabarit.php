<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="Contenu/gabarit.css" />

    <title><?= $titre ?></title>
</head>


  <body>

    <header>
      <div id="logo">
        <a href="index.php?page=accueil"><img id="logo" src="Autres/LogoISEPBands.jpg" width="460" height="300" ></a>
        <h1> <?php echo $slogan  ?> </h1>
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
