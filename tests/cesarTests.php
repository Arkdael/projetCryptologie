<?php

require_once __DIR__ . "/../src/models/ChiffreDecalage.php";
require_once __DIR__ . "/../src/services/service.php";

echo test_chiffrer_general(); 
echo test_chiffrer_boucle();
echo test_chiffrer_ponctuation_intacte();

function test_chiffrer_alphabet_mixte()
{
    $chiffre_courant = new ChiffreDecalage();
    $resultat = $chiffre_courant->chiffrer("Le froid du doux zephyr accompagne les braves Walkirie dans leur grande quête de justice", 3, constant("ALPHABET_LATIN_MIXTE"));
    $reponse = "Oh iurlg gx grxa chskbu dffrpsdjqh ohv eudyhv Zdonlulh gdqv ohxu judqgh txhwh gh mxvwlfh";
    assert($resultat == $reponse);
    return __FUNCTION__ . (($resultat === $reponse) ? " RÉUSSI\n" : " ÉCHOUÉ\n");
}
function test_chiffrer_alphabet_maj()
{
    $chiffre_courant = new ChiffreDecalage();
    $resultat = $chiffre_courant->chiffrer("Le froid du doux zephyr accompagne les braves Walkirie dans leur grande quete de justice", 4, constant("ALPHABET_LATIN_MAJ"));
    $reponse = "PI JVSMH HY HSYB DITLCV EGGSQTEKRI PIW FVEZIW AEPOMVMI HERW PIYV KVERHI UYIXI HI NYWXMGI";
    assert($resultat == $reponse);
    return __FUNCTION__ . (($resultat === $reponse) ? " RÉUSSI\n" : " ÉCHOUÉ\n");
}
function test_chiffrer_boucle() // Puisqu'il y a 26 lettre dans l'alphabet, décaler de 26 lettres devrait redonner le même texte.
{
    $chiffre_courant = new ChiffreDecalage();
    $resultat = $chiffre_courant->chiffrer("Le froid du doux zephyr accompagne les braves Walkirie dans leur grande quête de justice", 26, constant("ALPHABET_LATIN_MIXTE"));
    $reponse = "Le froid du doux zephyr accompagne les braves Walkirie dans leur grande quête de justice";
    assert($resultat === $reponse);
    return __FUNCTION__ . (($resultat === $reponse) ? " RÉUSSI\n" : " ÉCHOUÉ\n");
}
function test_chiffrer_ponctuation_intacte()
{
    $chiffre_courant = new ChiffreDecalage();
    $resultat = $chiffre_courant->chiffrer("Dans leur grande quête de justice, le froid du doux-zephyr accompagne les braves Walkirie!", 3, constant("ALPHABET_LATIN_MIXTE"));
    $reponse = "Gdqv ohxu judqgh txêwh gh mxvwlfh, oh iurlg gx grxa-chskbu dffrpsdjqh ohv eudyhv Zdonlulh!";
    assert($resultat === $reponse);
    return __FUNCTION__ . (($resultat === $reponse) ? " RÉUSSI\n" : " ÉCHOUÉ\n");
}
?>