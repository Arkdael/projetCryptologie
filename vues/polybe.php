<!DOCTYPE html>
<html>
  <head>
      <title><?php echo htmlspecialchars($chiffre_courantVM->titre);?></title>
      <title><?php echo htmlspecialchars($chiffre_courantVM->titre);?></title>
      <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php include __DIR__ . "/../src/layout/header.php"?>
    <div class="page">
	    <main>
        <?php include __DIR__ . "/../src/layout/component_infos.php"?>

        <form method="GET">

          <?php include __DIR__ . "/../src/layout/formComponent_texteClair.php"?>

          <div class="formItem">
            <label for="clef">Clef</label><br>
  			    <input class="formInput" type="text" id="clef" name="clef" value="<?php echo htmlspecialchars($chiffre_courantVM->clef);?>"/><br>
  			    <input class="formInput" type="text" id="clef" name="clef" value="<?php echo htmlspecialchars($chiffre_courantVM->clef);?>"/><br>
          </div>

          <div class="formItem">
            <label for="_carre">Carré</label><br>
            <table name="_carre" tabindex=0> 
            <table name="_carre" tabindex=0> 
              <!-- Créer le visuel du carré dynamiquement-->
              <tr>
                <th> </th>
                <?php // Le header au dessus du carré.
                    $longueur_tableau = count($_carre->obtenir_tableau()[0]); //Prend la taille de la première rangée donc pose problème si les longueurs varient. 
                    for($colonne = 0; $colonne < $longueur_tableau; $colonne++)
                    {
                      echo '<th>'.($colonne+1).'</th>';
                    }
                ?>
              </tr>

              <?php // Le contenu du carré + des header sur les côtés.
                $index_rangee = 0;
                foreach($_carre->obtenir_tableau() as $rangee)
                {
                  echo '<tr>';
                  echo '<th>'.($index_rangee+1).'</th>';
                  $index_colonne = 0;
                  foreach($rangee as $colonne)
                  {
                    echo '<td><input class="itemTableau" tabindex="-1" type="text" maxlength=1 size=1 readonly value="'. $colonne.'"></td>';
                    echo '<td><input class="itemTableau" tabindex="-1" type="text" maxlength=1 size=1 readonly value="'. $colonne.'"></td>';
                  }
                  echo '</tr>';
                  $index_rangee++;
                }
              ?>
            </table>
          </div>

         <?php include __DIR__ . "/../src/layout/formComponent_texteChiffre.php"?>

         <?php include __DIR__ . "/../src/layout/formComponent_submit.php"?>

         <?php include __DIR__ . "/../src/layout/formComponent_texteChiffre.php"?>

         <?php include __DIR__ . "/../src/layout/formComponent_submit.php"?>
		    </form> 
	    </main>
    </div>
    <?php include __DIR__ . "/../src/layout/footer.php"?>
  </body>
</html>