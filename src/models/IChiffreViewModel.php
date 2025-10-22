<?php 
interface IChiffreViewModel
{
    public string $nom { get; set;}

    public string $titre { get; set;}
    
    public string $description { get; set;}

    public string $texte_clair { get; set;}

    public string $texte_chiffre { get; set;}

    public mixed $clef { get; set;}
} 
?>