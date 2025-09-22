<!DOCTYPE html>
<html>
    <?php
        include "../src/services/service.php";
        include "../src/utils/modulo.php";

        function chiffrer_decalage($texte_clair, $clef, $alphabet)
        {
            $texte_chiffre = "";

            foreach(str_split($texte_clair) as $lettre)
            {
                $valeur_lettre = array_search($lettre, $alphabet);
                if($valeur_lettre !== false) //Vrai si le caractere est dans l'alphabet, faux sinon (Note: 0 === null donc doit faire false car pas même type).
                {
                    $nouvelle_valeur_lettre =  modulo(($valeur_lettre + $clef * 2), count($alphabet));
                    $texte_chiffre = $texte_chiffre . $alphabet[$nouvelle_valeur_lettre];
                }
                else //Assume que si pas dans alphabet, est ponctuation donc laisse tel quel.
                {
                    $texte_chiffre = $texte_chiffre . $lettre; 
                }
            }
            return $texte_chiffre;
        }

        function dechiffrer_decalage($texte_chiffre, $clef, $alphabet)
        {
            $clef_inverse = $clef * -1; 
            return chiffrer_decalage($texte_chiffre, $clef_inverse, $alphabet);
        }
    ?>
    <head>
        <title>Chiffrement par décalage</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <?php include "../src/layout/header.php"?>

        <div class="page">
	        <main>
                <h2>Chiffrement par décalage (chiffre de César)</h2>

                <form action="cesar.php" method="GET">
                    <div class="formItem">
                        <label for="texte_clair">Texte clair</label><br>
  			            <textarea class="formInput" id="texte_clair" name="texte_clair" rows="4" cols="50"><?php
                        if(isset($_GET["chiffrer"]))
                        {
                            echo $_GET["texte_clair"];
                        }
                        else
                        {
                            echo dechiffrer_decalage($_GET["texte_chiffre"], $_GET["clef"], constant("ALPHABET_LATIN_MIXTE"));
                        }
                        ?></textarea><br>
                    </div>
                    <div class="formItem">
                        <label for="clef">Clef</label><br>
  			            <input class="formInput" type="number" id="clef" name="clef" value="<?php echo $_GET["clef"]?>" required></input><br>
                    </div>
                    <div class="formItem" style="flex-direction:row;-">
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
                            echo chiffrer_decalage($_GET["texte_clair"], $_GET["clef"], constant("ALPHABET_LATIN_MIXTE"));
                        }
                        ?></textarea>
                    </div>
		        </form>
	        </main>
        </div>
        <?php include "../src/layout/footer.php"?>
    </body>
</html>