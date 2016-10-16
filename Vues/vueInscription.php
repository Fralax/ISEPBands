<?php
  $date = date('Y');
  settype($date, "integer");
?>

<form name = "formInscription" method="post" action = "">
  <table>
    <tr>
      <td>
        Prénom :
      </td>
      <td>
        <input type="text" name="prenom" value="">
      </td>
    </tr>
    <tr>
      <td>
        Nom :
      </td>
      <td>
        <input type="text" name="nom" value="">
      </td>
    </tr>
    <tr>
      <td>
        Email :
      </td>
      <td>
        <input type="text" name="email" value="">
      </td>
      <td>
        Confirmez votre Email :
      </td>
      <td>
        <input type="text" name="confirmEmail" value="">
      </td>
    </tr>
    <tr>
      <td>
        Mot de passe :
      </td>
      <td>
        <input type="password" name="mdp" value="">
      </td>
      <td>
        Confirmez votre Mot de passe :
      </td>
      <td>
        <input type="password" name="confirmMdp" value="">
      </td>
    </tr>
    <tr>
      <td>
        Portable :
      </td>
      <td>
        <input type="text" name="portable" value="">
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
  <input type="submit" name="envoyer" value="S'inscrire !">
</form>
