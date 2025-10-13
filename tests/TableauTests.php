<?php
require_once __DIR__ . "/../src/utils/Tableau.php";
echo test();

function test()
{
    $tableau = new Tableau(array('A','a','B','b','C','c','D','d','E','e','F','f','G','g','H','h','I','i','J','j','K','k','L','l','M','m',
                                        'N','n','O','o','P','p','Q','q','R','r','S','s','T','t','U','u','V','v','W','w','X','x','Y','y','Z','z'), 2, 26);
    echo "REPONSE: " . implode(',', $tableau->recherche_recursive($tableau->obtenir_tableau() , "G")) . "\n";
}
?>