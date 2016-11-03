<div class="container">
  <div class="row row-centered">
    <?php for ($i=0; $i<count($listeMembres) ; $i++) { ?>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-centered groupes">
        <a href="index.php?page=groupe&groupe=<?php echo urlencode($groupes[$i][0]) ?>"> <?php echo $groupes[$i][0]; ?> </a>
        <p>
          <?php foreach ($listeMembres[$i] as list($membres) ): ?>
          <?php echo $membres ?>
        <?php endforeach; ?> </p>
      </div>

    <?php } ?>

  </div>
</div>
