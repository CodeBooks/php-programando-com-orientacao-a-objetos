<?php
function Abrir($file = null)
{
    if (!$file)
    {
        die('Falta o parâmetro com o nome do Arquivo');
    }
    
    if (!file_exists($file))
    {
        die('Arquivo não existente');
    }
    
    if (!$retorno = @file_get_contents($file))
    {
        die('Impossível ler o arquivo');
    }
    return $retorno;
}

// abrindo um arquivo
$arquivo = Abrir('/tmp/arquivo.dat');
echo $arquivo;
?>