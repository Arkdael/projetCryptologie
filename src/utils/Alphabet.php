<?php
require_once "Tableau.php";

class Alphabet extends Tableau
{
    public function __construct(array $liste_lettres)
    {
        parent::__construct($liste_lettres);
    }

    public function nb_lettres() : int
    {
       return count($this::obtenir_tableau());
    }

    //Créer une variante d'un alphabet (Array) avec le mot clef au debut, ex: avec "allo" et [a,b,c,d,e,f,g,...] retourne [a,l,o,b,c,d,e,f,g,...].
    public function creer_variante_alphabet(string $mot, Alphabet $alphabet)
    {
        $liste_lettres = $alphabet->obtenir_tableau();
  
        for($index = strlen($mot) -1; $index >= 0; $index--) // Lit le mot en partant de la fin.
        {
            $position_lettre = array_search($mot[$index], $liste_lettres);
            if($position_lettre != false)
            {
                array_splice($liste_lettres, $position_lettre, 1);
                array_unshift($liste_lettres, $mot[$index]);
            }
        }
        return new Alphabet($liste_lettres);
    }

    public function creer_variante_alphabet2(string $mot, $alphabet)
    {
        $liste_lettres = $alphabet->obtenir_tableau();
  
        for($index = strlen($mot) -1; $index >= 0; $index--) // Lit le mot en partant de la fin.
        {
            $position_lettre = array_search($mot[$index], $liste_lettres);
            if($position_lettre != false)
            {
                // TODO Prendre le 'l'array qui contient la lettre au complet. 
                array_splice($liste_lettres, $position_lettre, 1);
                array_unshift($liste_lettres, $mot[$index]);
            }
        }
        return new Alphabet($liste_lettres);
    }
}
?>