<?php
// interpreta o documento XML
$xml = simplexml_load_file('paises4.xml');
echo "*** Estados ***<br>\n";

// percorre a lista de estados
foreach ($xml->estados->estado as $estado)
{
    // imprime o estado e a capital
    echo str_pad('Estado : '    . $estado['nome'], 30) .
                 'Capital: '    . $estado['capital']   . "<br>\n";
}
?>