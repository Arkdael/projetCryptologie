<?php
function recherche_tableau_2D($texte, $tableau) //Retourne un string avec la rangee et la colonne (+1) du premier element trouver dans le tableau.
{
  for ($colonne = 0; $colonne < count($tableau); $colonne++)
  {
    for ($rangee = 0; $rangee < count($tableau[$colonne]); $rangee++)
    {
      if ($tableau[$rangee][$colonne] == $texte)
      {
        $position = "";
        $position .= $rangee + 1;
        $position .= $colonne + 1;
        return $position;
      }
    }
  }
  return false;
}
?>