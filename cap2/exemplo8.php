<?php
// interpreta o documento XML
$xml = simplexml_load_file('paises4.xml');
echo "*** Estados ***<br>\n";

// percorre os estados
foreach ($xml->estados->estado as $estado)
{
    // percorre os atributos de cada estado
    foreach ($estado->attributes() as $key => $value)
    {
        echo "$key=>$value<br>\n";
    }
}
?>