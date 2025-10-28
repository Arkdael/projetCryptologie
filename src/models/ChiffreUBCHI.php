<?php
require_once "IChiffre.php";
require_once __DIR__ . "/../utils/Alphabet.php";
require_once __DIR__ . "/../utils/Tableau.php";

class ChiffreUBCHI implements Ichiffre
{
    public function chiffrer($texte_clair, $clef, $alphabet)
    {
        $texte_formate = str_replace(" ", "", $texte_clair);
        $hauteur = (int) ceil(strlen($texte_formate) / strlen($clef));
        $longueur = strlen($clef);
        $tableau_clair = Tableau::fromText($texte_formate,$hauteur, $longueur)->obtenir_tableau();
        $tableau_chiffre = $this->melanger_tableau($tableau_clair, $clef, $alphabet->obtenir_tableau());
        $tableau_chiffre = $this->melanger_tableau($tableau_chiffre, $clef, $alphabet->obtenir_tableau());

        // NOTE: Je lis la réponse en fesant des groupes de strlen($key) alors qu'en ligne ils semblent dire qu'ils faut faire des groupes de strlen($text)/$strlen($key).
        return $this->tableau_tostring($tableau_chiffre);
    }

    public function dechiffrer($texte_chiffre, $clef, $alphabet) // Non fonctionnel.
    {
        $texte_formate = str_replace(" ", "", $texte_chiffre);
        $hauteur = (int) ceil(strlen($texte_formate) / strlen($clef));
        $longueur = strlen($clef);
        $tableau_chiffre = Tableau::fromText($texte_formate,$hauteur, $longueur)->obtenir_tableau();
        $tableau_clair = $this->melanger_tableau2($tableau_chiffre, $clef, $alphabet->obtenir_tableau());
        $tableau_clair = $this->melanger_tableau2($tableau_clair, $clef, $alphabet->obtenir_tableau());

        //return $this->tableau_tostring($tableau_clair);
        return "Fonction incomplète.";
    }

    private function melanger_tableau($tableau_entree, $clef, $alphabet)
    {
        // Lit et réécrit chaque colone, à l'horizontale, en suivant l'ordre alphabétique de la clef. 
        $ordre_clef = $this->get_key_order($alphabet, $clef); // L'ordre alphabétique de la clef, pour ENIGNE vaut [0, 5, 3, 2, 4, 1]
        $tableau_sortie = [];
        $nouvelle_rangee = [];
        for($i = 0; $i < strlen($clef); $i++)
        {
            for($rangee = 0; $rangee < count($tableau_entree); $rangee++)
            {   
                if(isset($tableau_entree[$rangee][$ordre_clef[$i]])) // Ne push pas les " " dans le tableau.
                {
                    array_push($nouvelle_rangee, $tableau_entree[$rangee][$ordre_clef[$i]]);
                    array_find_key($ordre_clef, function($valeur, $i){$valeur == $i;}); //TODO comprendre.
                }
                if(count($nouvelle_rangee) == strlen($clef)) // Rajoute la ligne au tableau chiffre si elle est pleine (aussi grande que la clef).
                {
                    array_push($tableau_sortie, $nouvelle_rangee);
                    $nouvelle_rangee = array();
                }
            }
        }
        if(count($nouvelle_rangee) > 0)
        {
            array_push($tableau_sortie, $nouvelle_rangee); // A la fin on rajoute la ligne au tableau peu importe si elle est pleine ou non.
        }
        return $tableau_sortie;
    }

    private function melanger_tableau2($tableau_entree, $clef, $alphabet)
    {
        // Lit et réécrit chaque colone, à l'horizontale, en suivant l'ordre alphabétique de la clef. 
        $ordre_clef = $this->get_key_order($alphabet, $clef); // L'ordre alphabétique de la clef, pour ENIGNE vaut [0, 5, 3, 2, 4, 1]
        $tableau_sortie = [];
        $nouvelle_rangee = [];

        for($rangee = 0; $rangee < count($tableau_entree); $rangee++)
        {   
            for($i = 0; $i < strlen($clef); $i++)
            {
                if(isset($tableau_entree[$rangee][$ordre_clef[$i]])) // Ne push pas les " " dans le tableau.
                {
                    array_push($nouvelle_rangee, $tableau_entree[$rangee][$ordre_clef[$i]]);
                    array_find_key($ordre_clef, function($valeur, $i){$valeur == $i;}); //TODO comprendre.
                }
                if(count($nouvelle_rangee) == strlen($clef)) // Rajoute la ligne au tableau chiffre si elle est pleine (aussi grande que la clef).
                {
                    array_push($tableau_sortie, $nouvelle_rangee);
                    $nouvelle_rangee = array();
                }
            }
        }
        
        if(count($nouvelle_rangee) > 0)
        {
            array_push($tableau_sortie, $nouvelle_rangee); // A la fin on rajoute la ligne au tableau peu importe si elle est pleine ou non.
        }
        return $tableau_sortie;
    }

    private function ordonner_alphabetiquement($alphabet, $texte)// Prend un alphabet (array) et du texte, retourne le texte en ordre alphabetique.
    {
        $texte_nombre = array();
        foreach(str_split($texte) as $lettre)
        {
            for($index = 0; $index < count($alphabet); $index++)
            {
                if($lettre == $alphabet[$index])
                {
                    array_push($texte_nombre, $index);
                }
            }
        }

        sort($texte_nombre);
        $texte_ordonne = array();
        foreach($texte_nombre as $nombre)
        {
            {
                array_push($texte_ordonne, $alphabet[$nombre]);
            }   
        }

        return $texte_ordonne;
    }


    private function get_key_order($alphabet, $clef)
    {
        $clef_temp = str_split($clef);
        $clef_alpha = $this->ordonner_alphabetiquement($alphabet, $clef);
        $ordre_clef = array();
        // Navigue chaque lettre de la clef (ordonnee alphabetiquement) puis compare avec la clef d'origine, si c'est égal note l'index dans un tableau.
        foreach($clef_alpha as $lettre_clef_alpha)
        {
            for($index =0; $index < count($clef_temp); $index++)
            {
                if($lettre_clef_alpha == $clef_temp[$index])
                {
                    $clef_temp[$index] = "";// Pour pas qu'on aille les même valeurs plusieurs fois, on "vide" progressivement l'array.
                    array_push( $ordre_clef, $index);
                    break;
                }
            }
        }
        
        return $ordre_clef;
    }

    private function tableau_tostring($tableau)
    {
        //Convertit un tableau 2D en string, chaque sous_tableau est séparée par un espace.
        $tableau_string = "";
        foreach($tableau as $sous_tableau)
        {
            $tableau_string = $tableau_string.implode($sous_tableau)." ";
        }
        return $tableau_string; 
    }
}
?>