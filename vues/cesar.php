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
                <?php include __DIR__ . "/../src/layout/component_infos.php"?>
                <form method="GET">
                    
                    <?php include __DIR__ . "/../src/layout/formComponent_texteClair.php"?>

                    <div class="formItem">
                        <label for="clef">Clef</label><br>
  			            <input class="formInput" type="number" id="clef" name="clef" value="<?php echo htmlspecialchars($chiffre_courantVM->clef);?>" required></input><br>
                    </div>

                    <?php include __DIR__ . "/../src/layout/formComponent_texteChiffre.php"?>

                    <?php include __DIR__ . "/../src/layout/formComponent_submit.php"?>

		        </form>
	        </main>
        </div>
        <?php include __DIR__ . "/../src/layout/footer.php"?>
    </body>
</html>