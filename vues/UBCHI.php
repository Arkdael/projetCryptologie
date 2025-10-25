<!DOCTYPE html>
<html>
    <head>
        <title><?php echo htmlspecialchars($chiffre_courantVM->titre);?></title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php include __DIR__ . "/../src/layout/header.php"?>
        <div class="page">
	        <main>
                <h2><?php echo htmlspecialchars($chiffre_courrantVM->description);?></h2>
                <form method="GET">
                    
                    <div class="formItem">
                        <label for="texte_clair">Texte clair</label><br>
  			            <textarea class="formInput" id="texte_clair" name="texte_clair" rows="4" cols="50"><?php echo htmlspecialchars($chiffre_courrantVM->texte_clair);?></textarea><br>
                    </div>

                    <div class="formItem">
                        <label for="clef">Clef</label><br>
  			            <input class="formInput" type="text" id="clef" name="clef" value="<?php echo htmlspecialchars($chiffre_courantVM->clef);?>" required></input><br>
                    </div>

                    <?php include __DIR__ . "/../src/layout/formComponent_texteChiffre.php"?>

                    <?php include __DIR__ . "/../src/layout/formComponent_submit.php"?>
		        </form>
	        </main>
        </div>
        <?php include __DIR__ . "/../src/layout/footer.php"?>
    </body>
</html>