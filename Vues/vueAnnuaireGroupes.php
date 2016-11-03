<div class="container">
  <?php foreach ($groupes as list($nomGroupe)): ?>
    <p>
      <a href="index.php?page=groupe&groupe=<?php echo $nomGroupe ?>"> <?php echo $nomGroupe ?> </a>
    </p>
  <?php endforeach; ?>
</div>
