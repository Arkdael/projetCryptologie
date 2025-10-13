<?php
require_once "IChiffreViewModel.php";
class ChiffreViewModel implements IChiffreViewModel
{
    public string $titre;
    public string $description;

    public string $texte_clair = "";
    public string $texte_chiffre = "";
    public $clef;
    public Alphabet $alphabet;

    public function __construct(string $titre = "", string $description = "") 
    {
        $this->titre = $titre;
        $this->description = $description;
    }
}
?>