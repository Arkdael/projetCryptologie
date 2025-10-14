<?php
require_once __DIR__ . "/../utils/Tableau.php";
require_once __DIR__ . "/../utils/Alphabet.php";

    define("ALPHABET_LATIN_MAJ", new Alphabet(['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']));

    define("ALPHABET_LATIN_MIXTE", new Alphabet([['A', 'a'], ['B', 'b'], ['C', 'c'], ['D', 'd'], ['E','e'], ['F', 'f'], ['G', 'g'], ['H', 'h'], ['I', 'i'], ['J', 'j'], ['K', 'k'], ['L', 'l'], ['M', 'm'],
                            ['N', 'n'], ['O', 'o'], ['P', 'p'], ['Q', 'q'], ['R', 'r'], ['S', 's'], ['T', 't'], ['U', 'u'], ['V', 'v'], ['W', 'w'], ['X', 'x'], ['Y', 'y'], ['Z', 'z']]));                       
    define("ALPHABET_JORIS", Alphabet::fromText("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789.,", 1, 64));
    define("ALPHABET_LATIN_COMPLET", new Alphabet([//Fonctionne pas comme je veux.
        ['A','a','À','à','Á','á','Â','â','Ã','ã','Ä','ä'], 
        ['B','b','B','b','B','b','B','b','B','b','B','b'], 
        ['C','c','C','c','C','c','C','c','C','c','C','c'], 
        ['D','d','D','d','D','d','D','d','D','d','D','d'], 
        ['E','e','È','è','É','é','Ê','ê','E','e','Ë','ë'], 
        ['F','f','F','f','F','f','F','f','F','f','F','f'], 
        ['G','g','G','g','G','g','G','g','G','g','G','g'], 
        ['H','h','H','h','H','h','H','h','H','h','H','h'], 
        ['I','i','Ì','ì','Í','í','Î','î','I','i','Ï','ï'], 
        ['J','j','J','j','J','j','J','j','J','j','J','j'], 
        ['K','k','K','k','K','k','K','k','K','k','K','k'], 
        ['L','l','L','l','L','l','L','l','L','l','L','l'], 
        ['M','m','M','m','M','m','M','m','M','m','M','m'], 
        ['N','n','N','n','N','n','Ñ','ñ','N','n','N','n'], 
        ['O','o','Ò','ò','Ó','ó','Ô','ô','Õ','õ','Ö','ö'], 
        ['P','p','P','p','P','p','P','p','P','p','P','p'], 
        ['Q','q','Q','q','Q','q','Q','q','Q','q','Q','q'], 
        ['R','r','R','r','R','r','R','r','R','r','R','r'], 
        ['S','s','S','s','S','s','S','s','S','s','S','s'], 
        ['T','t','T','t','T','t','T','t','T','t','T','t'], 
        ['U','u','Ù','ù','Ú','ú','Û','û','U','u','Ü','ü'], 
        ['V','v','V','v','V','v','V','v','V','v','V','v'], 
        ['W','w','W','w','W','w','W','w','W','w','W','w'], 
        ['X','x','X','x','X','x','X','x','X','x','X','x'], 
        ['Y','y','Y','y','Ý','ý','Y','y','Y','y','Ÿ','ÿ'], 
        ['Z','z','Z','z','Z','z','Z','z','Z','z','Z','z']
]));      
?>