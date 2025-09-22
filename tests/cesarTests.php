<?php
include "public/cesar.php";

function chiffrer_decallage_general()
{
    $resultat =  chiffrer_decalage("Le froid du doux zephyr accompagne les braves Walkirie dans leur grande quête de justice", 3, constant("ALPHABET_LATIN_MIXTE"));
    $reponse = "Oh iurlg gx grxa Chskbu dffrpsdjqh ohv eudyhv Zdonlulh gdqv ohxu judqgh txêwh gh mxvwlfh";
    assert($resultat == $reponse);
}
function chiffrer_decallage_boucle()
{
    //Normalement, vu qu'il y a 26 lettre dans l'alphabet si on décale de 26 lettres ça devrait faire une boucle et ont devrait ravoir la même chose.
    $resultat =  chiffrer_decalage("Le froid du doux zephyr accompagne les braves Walkirie dans leur grande quête de justice", 26, constant("ALPHABET_LATIN_MIXTE"));
    $reponse = "Le froid du doux zephyr accompagne les braves Walkirie dans leur grande quête de justice";
    assert($resultat == $reponse);
}
function chiffrer_decallage_ponctuation_intacte()
{
    $resultat =  chiffrer_decalage("Le froid du doux-zephyr accompagne les braves Walkirie, dans leur grande quête de justice!", 3, constant("ALPHABET_LATIN_MIXTE"));
    $reponse = "Mf gspje ev epvy-afqizs bddpnqbhof mft csbwft Xbmljsjf, ebot mfvs hsboef rvêuf ef kvtujdf!";
    assert($resultat == $reponse);
}
?>