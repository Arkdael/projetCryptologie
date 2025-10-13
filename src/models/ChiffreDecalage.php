<?php
require_once "IChiffre.php";
require_once __DIR__ . "/../utils/modulo.php";
require_once __DIR__ . "/../utils/Tableau.php";

class ChiffreDecalage implements Ichiffre
{
    public function chiffrer($texte_clair, $clef, $alphabet)
    {
        $texte_chiffre = "";

        foreach(str_split($texte_clair) as $lettre)
        {
            $coordonnees_lettre = $alphabet->recherche_recursive($alphabet->obtenir_tableau(), $lettre);
            if($coordonnees_lettre != null)
            {
                $nouvelles_coordonnees = [modulo($coordonnees_lettre[0] + $clef, count($alphabet->obtenir_tableau())), $coordonnees_lettre[1]];
                $texte_chiffre .= $alphabet->obtenir_tableau()[$nouvelles_coordonnees[0]][$nouvelles_coordonnees[1]]; //Manque de verifications, possibilite oob.
            }
            else // Assume que si pas dans alphabet est ponctuation donc laisse tel quel.
            {
                $texte_chiffre .= $lettre;
            }
        }
        return $texte_chiffre;
    }
    
    public function dechiffrer($texte_chiffre, $clef, $alphabet)
    {
        $clef_inverse = $clef * -1; 
        $texte_clair = $this->chiffrer($texte_chiffre, $clef_inverse, $alphabet);
        return $texte_clair;
    }
}
?>