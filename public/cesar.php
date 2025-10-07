<!DOCTYPE html>
<html>
    <?php
        require __DIR__ . "/../src/services/service.php";
        require __DIR__ . "/../src/classes/ChiffreDecalage.php";
        
        $chiffre_courrant = new ChiffreDecalage();
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
                        elseif(isset($_GET["texte_chiffre"]))
                        {
                            echo $chiffre_courrant->dechiffrer($_GET["texte_chiffre"], $_GET["clef"], constant("ALPHABET_LATIN_MIXTE"));
                        }
                        ?></textarea><br>
                    </div>
                    <div class="formItem">
                        <label for="clef">Clef</label><br>
  			            <input class="formInput" type="number" id="clef" name="clef" value="<?php echo $_GET["clef"]??3?>" required></input><br>
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
                            echo $_GET["texte_chiffre"]??"";
                        }
                        elseif(isset($_GET["texte_clair"]))
                        {
                            echo $chiffre_courrant->chiffrer($_GET["texte_clair"], $_GET["clef"], constant("ALPHABET_LATIN_MIXTE"))??"";
                        }
                        ?></textarea>
                    </div>
		        </form>
	        </main>
        </div>
        <?php include "../src/layout/footer.php"?>
    </body>
</html>