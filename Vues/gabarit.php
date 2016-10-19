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
    if ($_GET['page'] == "inscriptioninstruments") {
      $i = 1;
    } else{
      $i = 0;
    }
  } else{
    $i = 1;
  }

?>

<?php if ($i == 0): ?>
  <body>

    <header>

      <nav>
        <ul class = "barreMenu">
          <li><a href="index.php?page=accueil"><img src="Autres/LogoISEPBands.png" width="460" height="300" ></a></li>
          <li><a href="index.php?page=planning">PLANNING</a></li>
          <li class = "toggleSousMenu"> <span>ANNUAIRE</span>
            <ul class = "sousMenu">
              <li> <a href="index.php?page=annuaire">Membres</a> </li>
              <li> <a href="index.php?page=annuaire">Groupes</a> </li>
            </ul>
          </li>
          <li class = "toggleSousMenu"> <span> BONJOUR <?php echo strtoupper($_SESSION['prenom']) ?> ! </span>
            <ul class = "sousMenu">
              <li> <a href="index.php?page=profil">Profil</a> </li>
              <li> <a href="index.php">Déconnexion</a> </li>
            </ul>
          </li>
        </ul>
      </nav>
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

      <nav>
        <ul class = "barreMenu">
          <li><a href="index.php?page=accueil"><img src="Autres/LogoISEPBands.png"></a></li>
          <li class = "toggleSousMenu"> <span>ANNUAIRE</span>
            <ul class = "sousMenu">
              <li> <a href="index.php?page=annuaire">Membres</a> </li>
              <li> <a href="index.php?page=annuaire">Groupes</a> </li>
            </ul>
          </li>
          <li class = "toggleSousMenu"> <span>CONNEXION</span>
            <ul class = "sousMenu">
              <li>
                <?php
                require_once 'Controleurs/controleurConnexion.php';
                $cnx = new controleurConnexion();
                $cnx->connexionUtilisateur();
                ?>

                <form action="" id="formConnexion" name="formConnexion" method="post">
                  <p class = "postEmail"> <input type="text" name="emailAccueil" id="emailAccueil" placeholder="Email" required> </p>
                  <p> <input type="password" name="mdpAccueil" id="mdpAccueil" placeholder="Mot de Passe" required> </p>
                  <p> <input name="connexion" type="submit" id="connexion" value = "Connexion"> </p>
                </form>
              </li>
            </ul>
          </li>
          <li><a href="index.php?page=inscription">INSCRIPTION</a></li>
        </ul>
      </nav>
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


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
  // On cache les sous-menus :
  $(".barreMenu ul.sousMenu").hide();

  $(".barreMenu li.toggleSousMenu span").each(function(){
    $(this).replaceWith('<a href="">' + $(this).text() + '<\/a>');
  });

  // On modifie l'évènement "click" sur les liens dans les items de liste
  // qui portent la classe "toggleSubMenu" :
  $(".barreMenu li.toggleSousMenu > a").click(function(){
    // Si le sous-menu était déjà ouvert, on le referme :
    if($(this).next("ul.sousMenu:visible").length != 0){
      $(this).next("ul.sousMenu").slideUp("normal");
    } else{  // Si le sous-menu est caché, on ferme les autres et on l'affiche
      $(".navigation ul.sousMenu").slideUp("normal");
      $(this).next("ul.sousMenu").slideDown("normal");
    }
      // On empêche le navigateur de suivre le lien :
      return false;
  });
});

</script>
