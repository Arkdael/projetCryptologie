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
            'nomAlphabetDefaut'=> "ALPHABET_LATIN_COMPLET"
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

    public function getViewModel(array $params)
    {
        $infos = $this::$_chiffres[strtolower($params['nom'])]?? throw new Exception("Modèle de chiffre '".strtolower($params['chiffre'])."' introuvable.");
        $chiffre_courrant = new $infos['classe'];
        $chiffreVM = new ChiffreViewModel($infos['titre'], $infos['description']);


        $chiffreVM->nom = $params['nom']??'';
        $chiffreVM->alphabet = constant($infos['nomAlphabetDefaut']); //TODO permettre personalisation de l'alphabet.
        $chiffreVM->clef = $params['clef'];
        if($params['action'] == 'Chiffrer')
        {
            $chiffreVM->texte_clair = $params["texte_clair"];
            $chiffreVM->texte_chiffre = $chiffre_courrant->chiffrer($chiffreVM->texte_clair, $chiffreVM->clef, $chiffreVM->alphabet);
        }
        elseif($params['action'] == 'Déchiffrer')
        {
            $chiffreVM->texte_chiffre = $params["texte_chiffre"];
            $chiffreVM->texte_clair =  $chiffre_courrant->dechiffrer($chiffreVM->texte_chiffre, $chiffreVM->clef, $chiffreVM->alphabet);
        }
        return $chiffreVM;
    }
}
?>