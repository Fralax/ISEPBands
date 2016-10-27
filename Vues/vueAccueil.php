<?php $this->titre = "Accueil" ?>

<?php
  if (isset($_SESSION['email'])) {
    $a = 0;
  } else{
    $a = 1;
  }
?>

<?php if ($a == 0): ?>
  Actualités d'ISEP Bands :
<?php endif; ?>

<?php if ($a == 1): ?>
  <div class="row">
    <div class="bienvenue">
      <h1>Bienvenue sur le site d'ISEP Bands !</h1>
      <a href="index.php?page=accueil"><img src="Autres/LogoISEPBands.png" width="368" height="240" ></a>
    </div>
  </div>
<?php endif; ?>
