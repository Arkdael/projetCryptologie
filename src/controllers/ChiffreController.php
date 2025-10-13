<?php
require_once __DIR__ . "/../models/IChiffre.php";
require_once __DIR__ . "/../models/ChiffreViewModel.php";
require_once __DIR__ . "/../services/service.php";
require_once __DIR__ . "/../models/ChiffreDecalage.php";
require_once __DIR__ . "/../models/ChiffrePolybe.php";
require_once __DIR__ . "/../models/ChiffreUBCHI.php";
class ChiffreController
{
    private static $_chiffres = [
        'cesar' => [
            'classe' => ChiffreDecalage::class,
            'titre' => "Chiffrement par décalage",
            'description' => "Chiffrement par décalage (chiffre de César)",
            'nomAlphabetDefaut'=> "ALPHABET_LATIN_MIXTE"
        ],
        'polybe' => [
            'classe' => ChiffrePolybe::class,
            'titre' => "Chiffrement de Polybe",
            'description' => "Carré de Polybe",
            'nomAlphabetDefaut'=> "ALPHABET_LATIN_MAJ"
        ],
        'ubchi' => [
            'classe' => ChiffreUBCHI::class,
            'titre' => "Chiffrement UBCHI",
            'description' => "Chiffrement UBCHI",
            'nomAlphabetDefaut'=> "ALPHABET_LATIN_MAJ"
        ],
    ];


    public function get(string $nom)
    {
        $infos = $this::$_chiffres[strtolower($nom)]?? throw new Exception("Modèle de chiffre '".strtolower($nom)."' introuvable.");
        $chiffre_courrant = new $infos['classe'];
        $chiffreVM = new ChiffreViewModel($infos['titre'], $infos['description']);

        $chiffreVM->alphabet = constant($infos['nomAlphabetDefaut']); //TODO permettre personalisation de l'alphabet.
        $chiffreVM->clef = $_GET["clef"];
        if(isset($_GET["chiffrer"]))
        {
            $chiffreVM->texte_clair = $_GET["texte_clair"];
            $chiffreVM->texte_chiffre = $chiffre_courrant->chiffrer($chiffreVM->texte_clair, $chiffreVM->clef, $chiffreVM->alphabet);
        }
        elseif(isset($_GET["dechiffrer"]))
        {
            $chiffreVM->texte_chiffre = $_GET["texte_chiffre"];
            $chiffreVM->texte_clair =  $chiffre_courrant->dechiffrer($chiffreVM->texte_chiffre, $chiffreVM->clef, $chiffreVM->alphabet);
        }
        return $chiffreVM;
    }
}
?>