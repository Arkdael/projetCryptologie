<?php
require_once "IChiffre.php";
require_once __DIR__ . "/../services/service.php";
require_once __DIR__ . "/../utils/Alphabet.php";
require_once __DIR__ . "/../utils/Tableau.php";
class ChiffrePolybe implements Ichiffre
{
    function chiffrer($texte_clair, $clef, $alphabet) // Chaque lettre du texte clair devient les coordonnées de la lettre dans le carre$carre.
    {
        $nouvel_alphabet = $alphabet->creer_variante_alphabet($clef??"", $alphabet);
        $carre = Tableau::fromText(implode($nouvel_alphabet->obtenir_tableau()), sqrt(count($nouvel_alphabet->obtenir_tableau())), sqrt(count($nouvel_alphabet->obtenir_tableau())));
        $texte_chiffre = "";

        foreach (str_split(strtoupper($texte_clair)) as $lettre)
        {
            if ($carre->recherche_recursive($carre->obtenir_tableau(), $lettre) != false)
            {
                $valeur_lettre = $carre->recherche_recursive($carre->obtenir_tableau(), $lettre);
                $texte_chiffre = $texte_chiffre . strval($valeur_lettre[0]+1) . strval($valeur_lettre[1]+1) . " ";
            }
        }
        return $texte_chiffre;
    }
    
    function dechiffrer($texte_chiffre, $clef, $alphabet)
    {
        $nouvel_alphabet = $alphabet->creer_variante_alphabet($clef??"", $alphabet);
        $carre = Tableau::fromText(implode($nouvel_alphabet->obtenir_tableau()), sqrt(count($nouvel_alphabet->obtenir_tableau())), sqrt(count($nouvel_alphabet->obtenir_tableau())));
        $texte_chiffre_formate = str_replace(" ", "", $texte_chiffre);
        $texte_clair = "";

        $liste_coordonnees = str_split($texte_chiffre_formate, 2); //Le 2 est pas adaptif.
        foreach($liste_coordonnees as $coordonnees)
        {
            $lettre = $carre->obtenir_tableau()[$coordonnees[0]-1][$coordonnees[1]-1];
            $texte_clair = $texte_clair . $lettre;
        }
        return $texte_clair;
    }
}

?>