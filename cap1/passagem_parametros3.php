<?php
function Incrementa(&$variavel, $valor = 40)
{
    $variavel += $valor;
}

$a = 10;
Incrementa($a);
echo $a;
?>