<?php
class Tableau
{
    public array $_tableau = [];

    public function obtenir_tableau()
    {
        return $this->_tableau;
    }

    public function __construct(array $array = [])
    {
        $this->_tableau = $array;
        return $this->_tableau ;
    }

    public static function fromText(string $texte, int $hauteur, int $longueur) : static // Note: la construction d'un tableau avec un hauter de 1 creer un tableau 2D avec 1 seul sous-tableau.
    // Est-ce que je veux vraiment avoir des tableaux 1D? ou est-ce que c'est mieux de rester consistant et toujours utiliser des tableaux 2d.
    {
        $array = [];
        for($colonne = 0; $colonne < $hauteur; $colonne++ )
        {
            $nouvelle_rangee = array();
            for($rangee = 0; $rangee < $longueur; $rangee++ )
            {
                $lettre = str_split($texte)[($colonne * $longueur) + $rangee];
                if($lettre != null)
                {
                    array_push($nouvelle_rangee, $lettre);
                }
            }
            if($hauteur == 1) // Vraiment laid comme if. 
            {
                $array = $nouvelle_rangee;
            }
            else
            {
                array_push($array, $nouvelle_rangee);
            }
        }
        $nouveau_tableau = new static($array);
        return $nouveau_tableau;
    }

    public function recherche2D($texte) // Obsolète.
    {
        for ($rangee = 0; $rangee < count($this->_tableau); $rangee++)
        {
            for ($colonne = 0; $colonne < count($this->_tableau[$rangee]); $colonne++)
            {
                if ($this->_tableau[$rangee][$colonne] == $texte)
                {
                    $position = [];
                    array_push($position, $rangee);
                    array_push($position, $colonne);
                    return $position;
                }
            }
        }
    }

    /* Si la valeur est dans le tableau, retourne un jeu de coordonnées de taille variable qui représente sa position dans le tableau.
    Par exemple, pour l'array [[A,a], [B,b], [C,c,Ç,ç], ...] chercher 'ç' retourne [2,3]. 
    Tandis que pour l'array [A, B, C, D, ...] chercher 'D' retourne [3]. Et pour l'array [  [ ["A","À"],["a","à"] ], [ ["B","B"],["b","b"] ]  ] chercher à retourne [0,1,1]*/
    public function recherche_recursive(array $tableau, $valeur, array $coordonnees = [])
    {
        array_push($coordonnees, 0);
        foreach($tableau as $sous_objet)
        {
            if(is_array($sous_objet))
            {
                $resultat = $this->recherche_recursive($sous_objet, $valeur, $coordonnees);
                if($resultat != null)
                {
                    return $resultat;
                }
            }
            elseif($sous_objet == $valeur)
            {
                return $coordonnees;
            }
            
            $coordonnees[count($coordonnees) -1]++;
        }
        return null; // La valeur n'a pas été trouvé. 
    }

    // Decale une rangee i de i position vers la gauche en bouclant vers le droite (ABCD -> BCDA).
    public function decaler_rangee($index_rangee, $valeur_decalage, array $tableau = self::_tableau) : array
    {
        $rangee_temp = $tableau[$index_rangee];
        
        for($index = 0; $index < count($rangee_temp); $index++)
        {
            $nouvelle_position = mon_modulo(($index + $valeur_decalage), count($tableau[$index_rangee]));
            $tableau[$index_rangee][$nouvelle_position] = $rangee_temp[$index];
        }
        return $tableau[$index_rangee];
    }
}
?>