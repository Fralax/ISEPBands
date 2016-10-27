<?php $this->titre = "Profil" ?>

<?php

require_once 'Controleurs/controleurMembres.php';
$membre = new controleurMembres();
$verificationSessionExiste = $membre->verificationSessionExiste();
$verificationSessionValide = $membre->verificationSessionValide();
$verificationMembreValide = $membre->verificationMembreValide();

if ($verificationSessionExiste == true) {
  if ($verificationSessionValide == true) {
    if ($verificationMembreValide == true) {
      $i = 0; // Si le membre est connecté, sur sa page de profil, et qu'il est validé
    } else{
      $i = 2; // Si le membre est connecté, sur sa page de profil, mais qu'il n'est pas validé
    }
  } else {
    if ($verificationMembreValide == true) {
      $i = 3; // Si le membre est connecté sur la page de profil d'un autre membre et qu'il est validé
    } else{
      $i = 1; // Si le membre est connecté sur la page de profil d'un membre et qu'il n'est pas validé
    }
  }
} else{
  $i = 1; // Si l'utilisateur qui visionne cette page n'est pas connecté (c'est un visiteur)
}

?>

<div class="row photoNom">
  <img src="<?php echo $infos['u_photo'] ?>"/>
  <p>
    <?php echo $infos['u_prenom']." ".$infos['u_nom']?>
  </p>
</div>

<div class="container">

  <?php if ($i == 2): ?>
    <div class="row inscriptionConfirmee">
      <p>
        Bienvenue <?php echo $_SESSION['prenom'] ?> ! Et si tu complétais un peu ton profil en attendant qu'un membre du bureau valide ton inscription ?
      </p>
    </div>
  <?php endif; ?>

  <div class="row row-centered instruments">

    <div class="mesInstruments">
      Instruments
    </div>

    <?php if ($instrumentsJoues): ?>
      <?php foreach ($instrumentsJoues as list($instrument, $niveau, $annees)): ?>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered instrumentsProfil">
          <div class="conteneurPhotoInstrument">
            <img id = "photoInstrument" src="Autres/<?php echo $instrument ?>.png"/>
          </div>
          <div class="detailsInstruments">
            <p class="nomInstrument">
              <?php echo $instrument ?>
            </p>
            <p class="niveau">
              <span>Niveau</span> <?php echo $niveau ?>
            </p>
            <?php if ($annees <= 1): ?>
              <p class="experience"><span>Expérience</span> <?php echo $annees ?> an</p>
            <?php endif; ?>
            <?php if ($annees > 1): ?>
              <p class="experience"><span>Expérience</span> <?php echo $annees ?> ans</p>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!$instrumentsJoues): ?>
      <div class="pasInstrument">
        Ben alors ? Ajoute vite les instruments que tu maîtrises !
      </div>
    <?php endif; ?>

  </div>

  <div class="row row-centered informations">

    <div class="mesInformations">
      Informations
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-centered informationsProfil">
      <div class="conteneurPhotoEmail">
        <img src="Autres/enveloppe.png" alt="" />
      </div>
      <p>
        <?php echo $infos['u_email'] ?>
      </p>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-centered informationsProfil">
      <div class="conteneurPhotoFacebook">
        <img src="Autres/facebook.png" alt="" />
      </div>
      <div class="facebook">
        Profil Facebook
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-centered informationsProfil">
      <div class="conteneurPhotoPortable">
        <img src="Autres/telephone.png" alt="" />
      </div>
      <p>
        <?php echo $infos['u_portable'] ?>
      </p>
    </div>

  </div>

</div>




<?php if ($i == 0 || $i == 2): ?>
  <div class="formulairesProfil">
    <nav class="navFormulairesProfil">
      <ul class = "formulaires">
        <li class = "toggleSousMenuProfil"> <span>Ajoute un Instrument</span>
          <ul class = "sousMenuProfil">
            <form method="post" action="">
              <p>
                <select name="instrument">
                  <?php foreach ($intrumentsNonJoues as list($nomInstrument)) { ?>
                    <option value = "<?php echo $nomInstrument ?>" > <?php echo $nomInstrument?> </option>
                  <?php } ?>
                </select>
                <select name="niveau">
                  <option value="Débutant">Débutant</option>
                  <option value="Intermédiaire">Intermédiaire</option>
                  <option value="Avancé">Avancé</option>
                  <option value="Confirmé">Confirmé</option>
                </select>
                <select name="annees">
                  <?php for ($i=0; $i <= 20; $i++) { ?>
                    <?php if ($i<=1) { ?>
                      <option value="<?php echo $i ?>"><?php echo $i ?> an</option>
                    <?php } else { ?>
                      <option value="<?php echo $i ?>"><?php echo $i ?> ans</option>
                    <?php } ?>
                  <?php } ?>
                </select>
              </p>
              <p> <input id="ajouter" type="submit" name="ajouterInstrumentPratique" value="Ajouter"> </p>
            </form>
          </ul>
        </li>
        <li class = "toggleSousMenuProfil"> <span>Ajoute ton Facebook</span>
          <ul class = "sousMenuProfil">
            <form action="" method="post" enctype="multipart/form-data">
              <p>Lien vers ton profil<input type="text" name="lienFacebook"></p>
              <p><input id="boutonLienFacebook" type="submit" name="boutonLienFacebook" value="Envoyer"></p>
            </form>
          </ul>
        </li>
        <li class = "toggleSousMenuProfil"> <span>Modifie ta photo</span>
          <ul class = "sousMenuProfil">
            <form action="" method="post" enctype="multipart/form-data">
              <p><input type="file" name="avatar"></p>
              <p><input id="changerPhoto" type="submit" name="changerPhoto" value="Changer de photo"></p>
            </form>
          </ul>
        </li>
        <li class = "toggleSousMenuProfil"> <span>Crée un nouveau groupe</span>
          <ul class = "sousMenuProfil">
            <form action="" method="post" enctype="multipart/form-data">
              <p><input type="text" name="nomGroupe" value=''></p>
              <p><input id="changerPhoto" type="submit" name="creerGroupe" value="Créer un nouveau groupe"></p>
            </form>
            <?php
              require_once 'Controleurs/controleurGroupes.php';
                $creerGroupe = $_POST['creerGroupe'];
                if (isset($creerGroupe)){
                $cnx = new controleurGroupes();
                $cnx->creationGroupe();
              }
              ?>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
<?php endif; ?>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script src="JS/vueProfil.js"></script>
