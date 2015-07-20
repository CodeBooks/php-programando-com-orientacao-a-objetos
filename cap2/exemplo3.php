<?php
// interpreta o documento XML
$xml = simplexml_load_file('paises.xml');
foreach ($xml->children() as $elemento => $valor)
{
	   echo "$elemento -> $valor<br>\n";
}
?>