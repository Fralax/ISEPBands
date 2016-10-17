<?php
  $date = date('Y');
  settype($date, "integer");
?>

<form name = "formInscription" method="post" action = "">


  <div id="presentation">
    <table>
      <tr>
        <td>
          <input type="text" name="nom" value="" placeholder="Nom">
        </td>
        <td>
          <input type="text" name="prenom" value="" placeholder="Prénom">
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="email" value="" placeholder="Email">
        </td>
        <td>
          <input type="text" name="confirmEmail" value="" placeholder="Confirmez votre Email">
        </td>
      </tr>
      <tr>
        <td>
          <input type="password" name="mdp" value="" placeholder="Mot de passe">
        </td>
          <input type="password" name="confirmMdp" value="" placeholder="Confirmez votre mot de passe">
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="portable" value="" placeholder="Numéro de téléphone">
        </td>
      </tr>
      <tr>
        <td>
          Promo :
        </td>
        <td>
          <select name="promo">
            <?php for ($i = 0 ; $i <= 5; $i++){ ?>
            <option value = "<?php echo $date + $i ?>"> <?php echo $date + $i ?> </option>
            <?php } ?>
          </select>
        </td>
      </tr>
    </table>
  </div>

  <div id="musique">
    <table>
      <tr>
        <td>

        </td>
      </tr>
    </table>
  <input type="submit" name="envoyer" value="S'inscrire !">
</form>
