<?php
include __DIR__ . "/../src/models/ChiffrePolybe.php";
echo test_chiffrer_general();
echo test_chiffrer_avec_clef();

function test_chiffrer_general()
{
    $chiffre_courrant = new ChiffrePolybe();
    $resultat = $chiffre_courrant->chiffrer("le froid du doux zephyr accompagne les braves walkirie dans leur grande quête de justice", "", constant("ALPHABET_LATIN_MAJ"));
    $reponse = "32 15 21 43 35 24 14 14 51 14 35 51 54 15 41 23 55 43 11 13 13 35 33 41 11 22 34 15 32 15 44 12 43 11 52 15 44 53 11 32 31 24 43 24 15 14 11 34 44 32 15 51 43 22 43 11 34 14 15 42 51 45 15 14 15 25 51 44 45 24 13 15 ";
    assert($resultat == $reponse);
    return __FUNCTION__ . (($resultat === $reponse) ? " RÉUSSI\n" : " ÉCHOUÉ\n");
}
function test_chiffrer_avec_clef()
{
    $chiffre_courrant = new ChiffrePolybe();
    $resultat = $chiffre_courrant->chiffrer("le froid du doux zephyr accompagne les braves walkirie dans leur grande quête de justice", "CLEF", constant("ALPHABET_LATIN_MAJ"));
    $reponse = "12 13 14 43 35 25 22 22 51 22 35 51 54 13 41 24 55 43 15 11 11 35 33 41 15 23 34 13 12 13 44 21 43 15 52 13 44 53 15 12 32 25 43 25 13 22 15 34 44 12 13 51 43 23 43 15 34 22 13 42 51 45 13 22 13 31 51 44 45 25 11 13 ";
    assert($resultat == $reponse);
    return __FUNCTION__ . (($resultat === $reponse) ? " RÉUSSI\n" : " ÉCHOUÉ\n");
}
?>