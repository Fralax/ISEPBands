<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="Contenu/gabarit.css" />
    <link rel="stylesheet" href="Contenu/vueAccueil.css" />
    <title><?= $titre ?></title>
</head>

<?php

require_once 'Controleurs/controleurMembres.php';
$membre = new controleurMembres();
$verificationSession = $membre->verificationSession();
$verificationValide = $membre->verificationValide();

if ($verificationSession == true) {
  if ($verificationValide == true) {
    $i = 0;
  } else{
    $i = 2;
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
          <li class = "toggleSousMenuConnexion"> <span>CONNEXION</span></li>
          <li class = "toggleSousMenuInscription"> <span>INSCRIPTION</span></li>
        </ul>
      </nav>

      <div id="popupConnexion" class="popup_block">
        <?php
        require_once 'Controleurs/controleurConnexion.php';
        $cnx = new controleurConnexion();
        $cnx->connexionUtilisateur();
        ?>

        <form action="" id="formConnexion" name="formConnexion" method="post">
          <p class = "postEmail"> <input type="text" name="emailAccueil" id="emailAccueil" placeholder="Email" required> </p>
          <p> <input type="password" name="mdpAccueil" id="mdpAccueil" placeholder="Mot de Passe" required> </p>
          <p>
            <input name="connexion" type="submit" id="connexion" value = "Connexion">
            <a href="index.php" id = "annuler">Annuler</a>
          </p>
        </form>
      </div>

      <div id="popupInscription" class="popup_block">
        <?php
          require_once 'Controleurs/controleurInscription.php';
          $cnx = new controleurInscription();
          $cnx->inscriptionUtilisateur();
          $date = date('Y');
          settype($date, "integer");
        ?>

        <form id ="formInscription" name = "formInscription" method="post" action = "">
          <table>
            <tr>
              <td>
                <img src="Autres/avatar.png"/>
              </td>
              <td>
                <input id="prenom" type="text" name="prenom" value="" placeholder="Prénom">
              </td>
              <td>
                <input id="nom" type="text" name="nom" value="" placeholder="Nom">
              </td>
            </tr>
            <tr>
              <td>
                <img src="Autres/opened-email-envelope.png"/>
              </td>
              <td>
                <input id="email" type="text" name="email" value="" placeholder="Email">
              </td>
              <td>
                <input id="confirmerEmail" type="text" name="confirmEmail" value="" placeholder="Confirmez l'Email">
              </td>
            </tr>
            <tr>
              <td>
                <img src="Autres/open-lock.png"/>
              </td>
              <td>
                <input id="mdp" type="password" name="mdp" value="" placeholder="Mot de passe">
              </td>
              <td>
                <input id="confirmerMdp" type="password" name="confirmMdp" value="" placeholder="Confirmez le mot de passe">
              </td>
            </tr>
            <tr>
              <td>
                <img src="Autres/phone-receiver.png"/>
              </td>
              <td>
                <input id="portable" type="text" name="portable" value="" placeholder="Numéro de téléphone">
              </td>
            </tr>
          </table>
          <p>
            Ta Promo :
            <select id="promo" name="promo">
              <?php for ($i = 0 ; $i <= 5; $i++){ ?>
              <option value = "<?php echo $date + $i ?>"> <?php echo $date + $i ?> </option>
              <?php } ?>
            </select>
          </p>
          <input id="inscription" type="submit" name="envoyer" value="S'inscrire !">
        </form>
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

<?php if ($i == 2): ?>
  <body>

    <header>
      <nav>
        <ul class = "barreMenu">
          <li><a href="index.php?page=profil&id=<?php echo $_SESSION['id'] ?>"><img src="Autres/LogoISEPBands.png"></a></li>
          <li class = "toggleSousMenu"> <span>ANNUAIRE</span>
            <ul class = "sousMenu">
              <li> <a href="index.php?page=annuaire">Membres</a> </li>
              <li> <a href="index.php?page=annuaire">Groupes</a> </li>
            </ul>
          </li>
          <li class = "toggleSousMenu"> <span> BONJOUR <?php echo strtoupper($_SESSION['prenom']) ?> ! </span>
            <ul class = "sousMenu">
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script src="JS/gabarit.js"></script>

</html>
