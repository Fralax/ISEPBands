<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" initial-scale="1">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Contenu/gabarit.css" />
    <link rel="stylesheet" href="fullcalendar/fullcalendar.css">
    <link rel='stylesheet' href='fullcalendar/fullcalendar.print.css' media='print' />
    <link rel="stylesheet" href="<?php echo $css ?>" >

    <link rel="icon" href="Autres/LogoISEPBands.png" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="JS/gabarit.js"></script>

    <title><?= $titre ?></title>
</head>
<?php

require_once 'Controleurs/controleurMembres.php';
require_once 'Controleurs/controleurAdmin.php';
$membre = new controleurMembres();
$admin = new controleurAdmin();

$verificationSessionExiste = $membre->verificationSessionExiste();
$verificationMembreValide = $membre->verificationMembreValide();
$verificationAdmin = $admin->verificationAdmin();

if ($verificationSessionExiste == true) {
  if ($verificationMembreValide == true) {
    $c = 0;
    if($verificationAdmin == true){
      $admn = 1; //le membre est administrateur
    }
  } else{
    $c = 2;
  }
} else{
  $c = 1; //visiteur
}

?>

<?php if ($c == 0): ?>
  <body>

    <header>
      <nav>
        <ul class = "barreMenu">
          <li><a href="index.php?page=accueil"><img src="Autres/logoblanc.png"></a></li>
          <li><a href="index.php?page=planning">PLANNING</a></li>
          <li class = "toggleSousMenu"> <span>ANNUAIRE</span>
            <ul class = "sousMenu">
              <li> <a href="index.php?page=annuaire&amp;annuaire=membres">Membres</a> </li>
              <li> <a href="index.php?page=annuaire&amp;annuaire=groupes">Groupes</a> </li>
            </ul>
          </li>
          <li> <a href="index.php?page=mesgroupes">MES GROUPES</a> </li>
          <li class = "toggleSousMenu"> <span> BONJOUR <?php echo strtoupper($_SESSION['prenom']) ?> ! </span>
            <ul class = "sousMenu">
              <li> <a href="index.php?page=profil&amp;id=<?php echo $_SESSION['id'] ?>">Profil</a> </li>
              <?php if ($admn == 1): ?>
                <li><a href="index.php?page=administration">Panneau d'administration</a></li>
              <?php endif; ?>
              <li> <a href="index.php?page=deconnexion">Déconnexion</a> </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>

    <div class="container-fluid">
      <?= $contenu ?>
    </div>


    <footer>
        ISEPBands &copy 2016 - Tous droits r&eacute;serv&eacute;s
    </footer>

  </body>

<?php endif; ?>

<?php if ($c == 1): ?>
  <body>

    <header>

      <nav>
        <ul class = "barreMenu">
          <li><a href="index.php?page=accueil"><img src="Autres/logoblanc.png"></a></li>
          <li class = "toggleSousMenu"> <span>ANNUAIRE</span>
            <ul class = "sousMenu">
              <li> <a href="index.php?page=annuaire&amp;annuaire=membres">Membres</a> </li>
              <li> <a href="index.php?page=annuaire&amp;annuaire=groupes">Groupes</a> </li>
            </ul>
          </li>
          <li class = "toggleSousMenuConnexion"> <a href="#popupConnexion" data-toggle="modal">CONNEXION</a> </li>
          <li class = "toggleSousMenuInscription"> <a href="#popupInscription" data-toggle="modal">INSCRIPTION</a> </li>
        </ul>
      </nav>

      <div id="popupConnexion" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content formConnexion">
            <?php
            require_once 'Controleurs/controleurConnexion.php';
            $cnx = new controleurConnexion();
            $cnx->connexionUtilisateur();
            ?>

            <form action="" name="formConnexion" method="post">
              <p class = "postEmail"> <input type="text" name="emailAccueil" id="emailAccueil" placeholder="Email" required> </p>
              <p> <input type="password" name="mdpAccueil" id="mdpAccueil" placeholder="Mot de Passe" required> </p>
              <p>
                <input name="connexion" type="submit" id="connexion" value = "Connexion">
                <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
              </p>
            </form>
          </div>
        </div>
      </div>

      <div id="popupInscription" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content formInscription">
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
                    <input id="confirmerEmail" type="text" name="confirmEmail" value="" placeholder="Confirme l'Email">
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
                    <input id="confirmerMdp" type="password" name="confirmMdp" value="" placeholder="Confirme le mot de passe">
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
                <select class="select" name="promo">
                  <option value = "">Ta promo</option>
                  <?php for ($i = 0 ; $i <= 5; $i++){ ?>
                  <option value = "<?php echo $date + $i ?>"> <?php echo $date + $i ?> </option>
                  <?php } ?>
                </select>
              </p>
              <input id="inscription" type="submit" name="envoyer" value="S'inscrire !">
              <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
            </form>
          </div>
        </div>
      </div>
    </header>

    <div class="container-fluid">
      <?= $contenu ?>
    </div>

    <footer>
        ISEPBands &copy 2016 - Tous droits r&eacute;serv&eacute;s
    </footer>

  </body>
<?php endif; ?>

<?php if ($c == 2): ?>
  <body>

    <header>
      <nav>
        <ul class = "barreMenu">
          <li><a href="index.php?page=profil&amp;id=<?php echo $_SESSION['id'] ?>"><img src="Autres/logoblanc.png"></a></li>
          <li class = "toggleSousMenu"> <span>ANNUAIRE</span>
            <ul class = "sousMenu">
              <li> <a href="index.php?page=annuaire&amp;annuaire=membres">Membres</a> </li>
              <li> <a href="index.php?page=annuaire&amp;annuaire=groupes">Groupes</a> </li>
            </ul>
          </li>
          <li class = "toggleSousMenu"> <span> BONJOUR <?php echo strtoupper($_SESSION['prenom']) ?> ! </span>
            <ul class = "sousMenu">
              <li> <a href="index.php?page=profil&amp;id=<?php echo $_SESSION['id'] ?>">Profil</a> </li>
              <li> <a href="index.php?page=deconnexion">Déconnexion</a> </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>

    <div class="container-fluid">
      <?= $contenu ?>
    </div>

    <footer>
        ISEPBands &copy 2016 - Tous droits r&eacute;serv&eacute;s
    </footer>

  </body>
<?php endif; ?>

</html>
