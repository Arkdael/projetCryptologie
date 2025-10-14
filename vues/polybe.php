<!DOCTYPE html>
<html>
  <head>
      <title><?php echo htmlspecialchars($chiffre_courrantVM->titre);?></title>
      <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <?php include __DIR__ . "/../src/layout/header.php"?>
    <div class="page">
	    <main>
        <h2><?php echo htmlspecialchars($chiffre_courrantVM->description);?></h2>
        <form action="<?php echo "/public/". $chiffre_courrantVM->nom;?>" method="GET">
          <div class="formItem">
  			    <label for="texte_clair">Texte clair</label><br>
  			    <textarea class="formInput" id="texte_clair" name="texte_clair" rows="4" cols="50"><?php echo $chiffre_courrantVM->texte_clair;?></textarea><br>
          </div>

          <div class="formItem">
            <label for="clef">Clef</label><br>
  			    <input class="formInput" type="text" id="clef" name="clef" value="<?php echo $chiffre_courrantVM->clef?>"/><br>
          </div>

          <div class="formItem">
            <label for="_carre">Carré</label><br>
            <table name="_carre"> 
              <!-- Créer le visuel du carré dynamiquement-->
              <tr>
                <th> </th>
                <?php //Le header au dessus du carré.
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
                    echo '<td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="'. $colonne.'"></td>';
                  }
                  echo '</tr>';
                  $index_rangee++;
                }
              ?>
            </table>
          </div>
          <div class="formItem">
  			    <label for="texte_chiffre">Texte chiffré</label><br>
            <textarea class="formInput" id="texte_chiffre" name="texte_chiffre" rows="4" cols="50"><?php echo $chiffre_courrantVM->texte_chiffre;?></textarea>
          </div>
          <div class="formItem" style="display: inline-block">
            <input class="formInput" type="submit" name="action" value="Chiffrer">
            <input class="formInput" type="submit" name="action" value="Déchiffrer">
          </div>
		    </form> 
	    </main>
    </div>
    <?php include __DIR__ . "/../src/layout/footer.php"?>
  </body>
</html>