<!DOCTYPE html>
<html>
  <?php
    include "../src/services/service.php";
    include "../src/utils/creerTableau2D.php";
    include "../src/utils/rechercheTableau2D.php";
    include "../src/utils/creerAlphabet.php";

    $_carre = creer_tableau(creer_variante_alphabet($_GET["clef"], constant("ALPHABET_LATIN_MAJ")), 5, 5); //TODO gérer la 26e lettre.

    function chiffrer_polybe($texte_clair, $_carre) //Chaque lettre du texte clair devient les coordonnées de la lettre dans le _carre.
    {
      $texte_chiffre = "";
      foreach (str_split(strtoupper($texte_clair)) as $lettre)
      {
        if (recherche_tableau_2D($lettre, $_carre) != false)
        {
          $valeur_lettre = recherche_tableau_2D($lettre, $_carre);
          $texte_chiffre = $texte_chiffre . "$valeur_lettre ";
        }
      }
      return $texte_chiffre;
    }
    
    function dechiffrer_polybe($texte_chiffre, $_carre)
    { 
      $texte_clair = "";
      $texte_chiffre_formate = str_replace(" ", "", $texte_chiffre);
      
      $liste_coordonnees = str_split($texte_chiffre_formate, 2);
      foreach($liste_coordonnees as $coordonnees)
      {
        $lettre = $_carre[$coordonnees[0]-1][$coordonnees[1]-1];
        $texte_clair = $texte_clair . $lettre;
      }
      return $texte_clair;
    }
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
              else
              {
                echo dechiffrer_polybe($_GET["texte_chiffre"], $_carre);
              }
            ?></textarea><br>
          </div>

          <div class="formItem">
            <label for="clef">Clef</label><br>
  			    <input class="formInput" type="text" id="clef" name="clef" value="<?php echo $_GET["clef"]?>"/><br>
          </div>

          <div class="formItem">
            <label for="_carre">Carré</label><br>
            <table name="_carre"> <!--TODO créer le carré dynamiquement-->
              <tr>
                <th> </th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
              </tr>
              <tr>
                <th>1</th>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[0][0]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[0][1]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[0][2]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[0][3]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[0][4]?>"></td>
              </tr>
              <tr>
                <th>2</th>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[1][0]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[1][1]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[1][2]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[1][3]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[1][4]?>"></td>
              </tr>
              <tr>
                <th>3</th>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[2][0]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[2][1]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[2][2]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[2][3]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[2][4]?>"></td>
              </tr>
              <tr>
                <th>4</th>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[3][0]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[3][1]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[3][2]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[3][3]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[3][4]?>"></td>
              </tr>
              <tr>
                <th>5</th>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[4][0]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[4][1]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[4][2]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[4][3]?>"></td>
                <td><input class="itemTableau" type="text" maxlength=1 size=1 readonly value="<?php echo $_carre[4][4]?>"></td>
              </tr>
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
              else
              {
                echo chiffrer_polybe($_GET["texte_clair"], $_carre);
              }
             ?></textarea>
          </div>
		    </form> 
	    </main>
    </div>
    <?php include "../src/layout/footer.php"?>
  </body>
</html>