<?php
//Mettre un array de lettre (pas un string) dans un tableau.
function creer_tableau($liste_lettres, $hauteur, $longueur)
{
    $tableau = [];
    
    for($rangee = 0; $rangee < $hauteur; $rangee++ )
    {
        $nouvelle_rangee = array();
        for($colonne = 0; $colonne < $longueur; $colonne++ )
        {
            $lettre = $liste_lettres[($rangee * $longueur) + $colonne];
            if($lettre != null)
            {
                array_push($nouvelle_rangee, $lettre);
            }
        }
        array_push($tableau, $nouvelle_rangee);
    }

    return $tableau;
}
?>