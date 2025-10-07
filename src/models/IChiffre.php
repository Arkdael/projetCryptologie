<?php 
interface IChiffre
{
    public function chiffrer($texte_clair, $clef, $alphabet); 
    
    public function dechiffrer($texte_chiffre, $clef, $alphabet);
} 
?>