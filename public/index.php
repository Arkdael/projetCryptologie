<?php
require_once __DIR__ . "/../src/controllers/ChiffreController.php";
require_once __DIR__ . "/../src/utils/Alphabet.php";
require_once __DIR__ . "/../src/utils/Tableau.php";

$controller = new ChiffreController();
$path = $_SERVER['REQUEST_URI'];
$path = explode('?', $path)[0]; // Retire les paramètres du chemin.
$path_split = explode('/', $path); // Sépare le chemin par /. Surtout pour éviter le warning de PHP avec $endPath =  end(explode('/', $path)).
$endPath = end($path_split);
$params = [
            'nom'=> $endPath??'',
            'action' => $_REQUEST['action']??'',
            'texte_clair' => $_REQUEST['texte_clair']??'',
            'texte_chiffre' => $_REQUEST['texte_chiffre']??'',
            'clef' => $_REQUEST['clef']??'',
];

switch(strtolower($path))
{
    case "/accueil" : include __DIR__ . "/../vues/accueil.php"; die();
    case "/cesar" : $chiffre_courantVM = $controller->getViewModel($params); include __DIR__ . "/../vues/cesar.php"; die();
    case "/polybe" : 
        $chiffre_courantVM = $controller->getViewModel($params);
        $nouvel_alphabet = $chiffre_courantVM->alphabet->creer_variante_alphabet($chiffre_courantVM->clef??"", $chiffre_courantVM->alphabet);
        $_carre = Tableau::fromText(implode($nouvel_alphabet->obtenir_tableau()), (int)sqrt((float)$nouvel_alphabet->nb_lettres()), (int)sqrt((float)$nouvel_alphabet->nb_lettres())); // TODO rendre lisible.
        include __DIR__ . "/../vues/polybe.php"; 
        die();
    case "/ubchi" : $chiffre_courantVM = $controller->getViewModel($params); include __DIR__ . "/../vues/UBCHI.php"; die();
    case "/aes" : $chiffre_courantVM = $controller->getViewModel($params); include __DIR__ . "/../vues/aes.php"; die();
    default : include __DIR__ . "/../vues/notFound.php";  die();
}
?>
