<div class="container">

  <div id='calendar'></div>

</div>

<div id="popupCreerEvenement" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content popups">
      <form action="" method="post" enctype="multipart/form-data">
        <p>Choisissez le groupe avec lequel vous voulez réserver le local !</p>
        <select name="groupe">
          <?php foreach ($mesGroupes as list($nomGroupe)): ?>
            <option value="<?php echo $nomGroupe ?>"> <?php echo $nomGroupe ?>  </option>
          <?php endforeach; ?>
        </select>
        <p>
          <input class="boutonsFormulaires" type="submit" name="creerEvenement" value="Valider">
          <button id="annuler" type="button" data-dismiss="modal">Annuler</button>
        </p>
      </form>
    </div>
  </div>
</div>

<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/fullcalendar.js'></script>
<script src='fullcalendar/locale/fr.js'></script>
<script src='JS/planning.js'></script>
