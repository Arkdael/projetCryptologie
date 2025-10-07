<!DOCTYPE html>
<html>
  <?php
    require "../src/services/service.php";
    require_once "../src/classes/ChiffrePolybe.php";
    require_once "../src/utils/creerTableau2D.php";
    require_once "../src/utils/creerAlphabet.php";

    $chiffre_courrant = new ChiffrePolybe();
    $_carre = creer_tableau(creer_variante_alphabet($_GET["clef"]??"", constant("ALPHABET_LATIN_MAJ")), 5, 5); //TODO gérer la 26e lettre.
  ?>
  <head>
      <title>Carré de Polybe</title>
      <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <?php include "../src/layout/header.php"?>
    <div class="page">
	    <main>
        <h2>Carré de Polybe</h2>
        <form action="polybe.php" method="GET">

          <div class="formItem">
  			    <label for="texte_clair">Texte clair</label><br>
  			    <textarea class="formInput" id="texte_clair" name="texte_clair" rows="4" cols="50"><?php
              if(isset($_GET["chiffrer"]))
              {
                echo $_GET["texte_clair"];
              }
              elseif(isset($_GET["texte_chiffre"]))
              {
                echo $chiffre_courrant->dechiffrer($_GET["texte_chiffre"], $_GET["clef"], constant("ALPHABET_LATIN_MAJ"));
              }
            ?></textarea><br>
          </div>

          <div class="formItem">
            <label for="clef">Clef</label><br>
  			    <input class="formInput" type="text" id="clef" name="clef" value="<?php echo $_GET["clef"]??""?>"/><br>
          </div>

          <div class="formItem">
            <label for="_carre">Carré</label><br>
            <table name="_carre"> 
              <!-- Créer le visuel du carré dynamiquement-->
              <tr>
                <th> </th>
                <?php //Le header au dessus du carré.
                    $longueur_tableau = count($_carre[0]); //Prend la taille de la première rangée donc pose problème si les longueurs varient. 
                    for($colonne = 0; $colonne < $longueur_tableau; $colonne++)
                    {
                      echo '<th>'.($colonne+1).'</th>';
                    }
                ?>
              </tr>

              <?php // Le contenu du carré + des header sur les côtés.
                $index_rangee = 0;
                foreach($_carre as $rangee)
                {
                  echo '<tr>';
                  echo '<th>'.($index_rangee+1).'</th>';
                  $index_colone = 0;
                  foreach($_carre as $colonne)
                  {
                    echo '<td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="'. $_carre[$index_rangee][$index_colone].'"></td>';
                    $index_colone++;
                  }
                  echo '</tr>';
                  $index_rangee++;
                }
              ?>
            </table>
          </div>

          <div class="formItem" style="display: inline-block">
              <input class="formInput" type="submit" name="chiffrer" value="Chiffrer">
              <input class="formInput" type="submit" name="dechiffrer" value="Déchiffrer">
          </div>
          <div class="formItem">
  			    <label for="texte_chiffre">Texte chiffré</label><br>
            <textarea class="formInput" id="texte_chiffre" name="texte_chiffre" rows="4" cols="50"><?php
              if(isset($_GET["dechiffrer"]))
              {
                echo $_GET["texte_chiffre"];
              }
              elseif(isset($_GET["texte_clair"]))
              {
                echo $chiffre_courrant->chiffrer($_GET["texte_clair"], $_GET["clef"], constant("ALPHABET_LATIN_MAJ"));
              }
             ?></textarea>
          </div>
		    </form> 
	    </main>
    </div>
    <?php include "../src/layout/footer.php"?>
  </body>
</html>