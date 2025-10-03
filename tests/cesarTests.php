<?php
require __DIR__ . "/../src/classes/ChiffreDecalage.php";
require __DIR__ . "/../src/services/service.php";

echo test_chiffrer_general(); 
echo test_chiffrer_boucle();
echo test_chiffrer_ponctuation_intacte();

function test_chiffrer_general()
{
    $chiffre_courrant = new ChiffreDecalage();
    $resultat = $chiffre_courrant->chiffrer("Le froid du doux zephyr accompagne les braves Walkirie dans leur grande quête de justice", 3, constant("ALPHABET_LATIN_MIXTE"));
    $reponse = "Oh iurlg gx grxa chskbu dffrpsdjqh ohv eudyhv Zdonlulh gdqv ohxu judqgh txêwh gh mxvwlfh";
    assert($resultat == $reponse);
    return __FUNCTION__ . (($resultat === $reponse) ? " RÉUSSI\n" : " ÉCHOUÉ\n");
}
function test_chiffrer_boucle() // Puisqu'il y a 26 lettre dans l'alphabet, décaler de 26 lettres devrait redonner le même texte.
{
    $chiffre_courrant = new ChiffreDecalage();
    $resultat = $chiffre_courrant->chiffrer("Le froid du doux zephyr accompagne les braves Walkirie dans leur grande quête de justice", 26, constant("ALPHABET_LATIN_MIXTE"));
    $reponse = "Le froid du doux zephyr accompagne les braves Walkirie dans leur grande quête de justice";
    assert($resultat === $reponse);
    return __FUNCTION__ . (($resultat === $reponse) ? " RÉUSSI\n" : " ÉCHOUÉ\n");
}
function test_chiffrer_ponctuation_intacte()
{
    $chiffre_courrant = new ChiffreDecalage();
    $resultat = $chiffre_courrant->chiffrer("Dans leur grande quête de justice, le froid du doux-zephyr accompagne les braves Walkirie!", 3, constant("ALPHABET_LATIN_MIXTE"));
    $reponse = "Gdqv ohxu judqgh txêwh gh mxvwlfh, oh iurlg gx grxa-chskbu dffrpsdjqh ohv eudyhv Zdonlulh!";
    assert($resultat === $reponse);
    return __FUNCTION__ . (($resultat === $reponse) ? " RÉUSSI\n" : " ÉCHOUÉ\n");
}
?>