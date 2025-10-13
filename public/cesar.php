<!DOCTYPE html>
<html>
    <?php
        require_once __DIR__ . "/../src/controllers/ChiffreController.php";
        $controller = new ChiffreController();
        $chiffre_courrantVM = $controller->get("cesar");
    ?>
    <head>
        <title><?php echo htmlspecialchars($chiffre_courrantVM->titre);?></title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php include "../src/layout/header.php"?>
        <div class="page">
	        <main>
                <h2><?php echo htmlspecialchars($chiffre_courrantVM->description);?></h2>
                <form action="cesar.php" method="GET">
                    <div class="formItem">
                        <label for="texte_clair">Texte clair</label><br>
  			            <textarea class="formInput" id="texte_clair" name="texte_clair" rows="4" cols="50"><?php echo htmlspecialchars($chiffre_courrantVM->texte_clair);?></textarea><br>
                    </div>
                    <div class="formItem">
                        <label for="clef">Clef</label><br>
  			            <input class="formInput" type="number" id="clef" name="clef" value="<?php echo $chiffre_courrantVM->clef?>" required></input><br>
                    </div>
                    <div class="formItem">
  			            <label for="texte_chiffre">Texte chiffré</label><br>
  			            <textarea class="formInput" id="texte_chiffre" name="texte_chiffre" rows="4" cols="50"><?php echo htmlspecialchars($chiffre_courrantVM->texte_chiffre);?></textarea>
                    </div>
                    <div class="formItem" style="flex-direction:row;-">
                        <input class="formInput" type="submit" name="chiffrer" value="Chiffrer">
                        <input class="formInput" type="submit" name="dechiffrer" value="Déchiffrer">
                    </div>
		        </form>
	        </main>
        </div>
        <?php include "../src/layout/footer.php"?>
    </body>
</html>