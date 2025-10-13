<?php
require_once __DIR__ . "/../utils/Tableau.php";
require_once __DIR__ . "/../utils/Alphabet.php";

    define("ALPHABET_LATIN_MAJ", new Alphabet(['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']));

    define("ALPHABET_LATIN_MIXTE", new Alphabet([['A', 'a'], ['B', 'b'], ['C', 'c'], ['D', 'd'], ['E','e'], ['F', 'f'], ['G', 'g'], ['H', 'h'], ['I', 'i'], ['J', 'j'], ['K', 'k'], ['L', 'l'], ['M', 'm'],
                            ['N', 'n'], ['O', 'o'], ['P', 'p'], ['Q', 'q'], ['R', 'r'], ['S', 's'], ['T', 't'], ['U', 'u'], ['V', 'v'], ['W', 'w'], ['X', 'x'], ['Y', 'y'], ['Z', 'z']]));
                            
    define("ALPHABET_JORIS", Alphabet::fromText("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789.,", 1, 64));
?>