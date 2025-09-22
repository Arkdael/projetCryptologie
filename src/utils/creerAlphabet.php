<?php
//Créer une variante d'un alphabet (Array) avec le mot clef au debut, ex: avec "allo" et [a,b,c,d,e,f,g,...] retourne [a,l,o,b,c,d,e,f,g,...].
function creer_variante_alphabet($mot, $alphabet)
{
  $nouvel_alphabet = $alphabet;
  
  for($index = strlen($mot) -1; $index >= 0; $index--) //Lit le mot en partant de la fin.
  {
    $position_lettre = array_search($mot[$index], $nouvel_alphabet);
    if($position_lettre != false)
    {
      array_splice($nouvel_alphabet, $position_lettre, 1);
      array_unshift($nouvel_alphabet, $mot[$index]);
    }
  }
  return $nouvel_alphabet;
}
?>