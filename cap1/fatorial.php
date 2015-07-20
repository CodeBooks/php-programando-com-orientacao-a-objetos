<?php
function Fatorial($numero)
{
    if ($numero == 1)
        return $numero;
    else
        return $numero * Fatorial($numero -1);
}

echo Fatorial(5) . "<br>\n";
echo Fatorial(7) . "<br>\n";
?>
