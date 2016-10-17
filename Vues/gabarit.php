<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="Contenu/gabarit.css" />
    <link rel="stylesheet" href="Contenu/vueAccueil.css" />

    <title><?= $titre ?></title>
</head>

<?php

  if (isset($_SESSION['email'])) {
    $i = 0;
  } else{
    $i = 1;
  }

?>

<?php if ($i == 0): ?>
  <body>

    <header>
      <div id="logo">
        <a href="index.php?page=accueil"><img src="Autres/LogoISEPBands.png" width="460" height="300" ></a>
      </div>
      <div class="menu">
        Menu Déroulant
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
<?php endif; ?>

<?php if ($i == 1): ?>
  <body>

    <header>
      <div id="logo">

        <a href="index.php?page=accueil"><img src="Autres/LogoISEPBands.png" width="460" height="300" ></a>

      </div>
      <div class="menu">
        <div class="connexion">

          <?php
          require_once 'Controleurs/controleurConnexion.php';
          $cnx = new controleurConnexion();
          $cnx->connexionUtilisateur();
          ?>

          <form action="" id="formConnexion" name="formConnexion" method="post">
            <p> <input type="text" name="emailAccueil" id="emailAccueil" placeholder="Email" required> </p>
            <p> <input type="password" name="mdpAccueil" id="mdpAccueil" placeholder="Mot de Passe" required> </p>
            <p> <input name="connexion" type="submit" id="connexion" value = "Connexion"> </p>
          </form>
        </div>
        <div class="inscription">
          <a href="index.php?page=inscription"><p>Inscris-toi !</p></a>
        </div>
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
<?php endif; ?>

</html>
