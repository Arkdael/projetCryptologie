<?php
require_once __DIR__ . "/../src/controllers/ChiffreController.php";
require_once __DIR__ . "/../src/utils/Alphabet.php";
require_once __DIR__ . "/../src/utils/Tableau.php";

$controller = new ChiffreController();
$path = $_SERVER['REQUEST_URI'];
$path = explode('?', $path)[0];
$endPath = end(explode('/', $path));
$params = [
            'nom'=> $endPath??'',
            'action' => $_REQUEST['action'],
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
        $_carre = Tableau::fromText(implode($nouvel_alphabet->obtenir_tableau()), sqrt((float)$nouvel_alphabet->nb_lettres()), sqrt((float)$nouvel_alphabet->nb_lettres()));
        include __DIR__ . "/../vues/polybe.php"; 
        die();
    case "/ubchi" : $chiffre_courantVM = $controller->getViewModel($params); include __DIR__ . "/../vues/UBCHI.php"; die();
    case "/aes" : $chiffre_courantVM = $controller->getViewModel($params); include __DIR__ . "/../vues/cesar.php"; die();
    default : echo "Not found"; die();
}
?>
