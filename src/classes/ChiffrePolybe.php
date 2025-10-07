<?php
require __DIR__ . "/../classes/IChiffre.php";
require __DIR__ . "/../utils/creerAlphabet.php";
require __DIR__ . "/../utils/creerTableau2D.php";
require __DIR__ . "/../utils/rechercheTableau2D.php";

class ChiffrePolybe implements Ichiffre
{
    function chiffrer($texte_clair, $clef, $alphabet) //Chaque lettre du texte clair devient les coordonnées de la lettre dans le carre$carre.
    {
        $carre = creer_tableau(creer_variante_alphabet($clef, $alphabet), 5, 5); //TODO gérer la 26e lettre.
        $texte_chiffre = "";

        foreach (str_split(strtoupper($texte_clair)) as $lettre)
        {
            if (recherche_tableau_2D($lettre, $carre) != false)
            {
                $valeur_lettre = recherche_tableau_2D($lettre, $carre);
                $texte_chiffre = $texte_chiffre . "$valeur_lettre ";
            }
        }
        return $texte_chiffre;
    }
    
    function dechiffrer($texte_chiffre, $clef, $alphabet)
    { 
        $carre = creer_tableau(creer_variante_alphabet($clef, $alphabet), 5, 5); //TODO gérer la 26e lettre.
        $texte_chiffre_formate = str_replace(" ", "", $texte_chiffre);
        $texte_clair = "";

        $liste_coordonnees = str_split($texte_chiffre_formate, 2);
        foreach($liste_coordonnees as $coordonnees)
        {
            $lettre = $carre[$coordonnees[0]-1][$coordonnees[1]-1];
            $texte_clair = $texte_clair . $lettre;
        }
        return $texte_clair;
    }
}

?>