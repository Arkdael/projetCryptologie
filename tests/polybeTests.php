<?php
include "public/polybe.php";
chiffrer_polybe_general();

function chiffrer_polybe_general()
{
    //TODO fonctionne pas encore, probleme avec les importations de polybe.
    $carre = creer_tableau(creer_variante_alphabet("", constant("ALPHABET_LATIN_MAJ")), 5, 5);
    $resultat = chiffrer_polybe("le froid du doux zephyr accompagne les braves walkirie dans leur grande quête de justice", $_carre);
    $reponse = "32 15 21 43 35 24 14 14 51 14 35 51 54 15 41 23 55 43 11 13 13 35 33 41 11 22 34 15 32 15 44 12 43 11 52 15 44 53 11 32 31 24 43 24 15 14 11 34 44 32 15 51 43 22 43 11 34 14 15 42 51 45 15 14 15 25 51 44 45 24 13 15 ";
    assert($resultat == $reponse);
}
?>