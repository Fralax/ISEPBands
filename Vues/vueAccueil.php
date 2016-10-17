<?php $this->titre = "Accueil" ?>

<?php
  if (isset($_SESSION['email'])) {
    $a = 0;
  } else{
    $a = 1;
  }
?>

<?php if ($a == 0): ?>
  Vos informations :
<?php endif; ?>

<?php if ($a == 1): ?>
  <div class="bienvenue">
    <h1>Bienvenue sur le site d'ISEP Bands !</h1>
  </div>
<?php endif; ?>
