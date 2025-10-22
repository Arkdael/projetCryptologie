<?php
// L'operateur modulo PHP de base ne fonctionne pas comme je veux avec les nombres negatifs. Par exemple -3 % 26 donne -3 alors que je veux avoir 23.
function modulo($dividende, $diviseur)
{
    $quotient = floor($dividende / $diviseur);
    $reste = $quotient * $diviseur - $dividende;
    return abs($reste);
}
?>