<?php
require "IChiffre.php";
require __DIR__ . "/../utils/modulo.php";

class ChiffreDecalage implements Ichiffre
{
    public function chiffrer($texte_clair, $clef, $alphabet)
    {
        $texte_chiffre = "";

        foreach(str_split($texte_clair) as $lettre)
        {
            $valeur_lettre = array_search($lettre, $alphabet);
            if($valeur_lettre !== false) //Vrai si le caractere est dans l'alphabet, faux sinon (Note: 0 === null donc doit faire false car pas même type).
            {
                $nouvelle_valeur_lettre =  modulo(($valeur_lettre + $clef * 2), count($alphabet));
                $texte_chiffre = $texte_chiffre . $alphabet[$nouvelle_valeur_lettre];
            }
            else //Assume que si pas dans alphabet, est ponctuation donc laisse tel quel.
            {
                $texte_chiffre = $texte_chiffre . $lettre; 
            }
            }
        return $texte_chiffre;
    }

    public function dechiffrer($texte_chiffre, $clef, $alphabet)
    {
        $clef_inverse = $clef * -1; 
        return $this->chiffrer($texte_chiffre, $clef_inverse, $alphabet);
    }
}

?>