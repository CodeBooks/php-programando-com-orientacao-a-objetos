<?php
function Incrementa($variavel, $valor)
{
    $variavel += $valor;
}

$a = 10;
Incrementa($a, 20);
echo $a;
?>