<?php
function Abrir($file = null)
{
    if (!$file)
    {
        trigger_error('Falta o parвmetro com o nome do Arquivo', E_USER_NOTICE);
        return false;
    }
    if (!file_exists($file))
    {
        trigger_error('Arquivo nгo existente', E_USER_ERROR);
        return false;
    }
    if (!$retorno = @file_get_contents($file))
    {
        trigger_error('Impossнvel ler o arquivo', E_USER_WARNING);
        return false;
    }
    return $retorno;
}

// funзгo para manipular o erro
function manipula_erro($numero, $mensagem, $arquivo, $linha)
{
    $mensagem = "Arquivo $arquivo : linha $linha # no. $numero : $mensagem\n";
    
    // escreve no log todo tipo de erro
    $log = fopen('erros.log', 'a');
    fwrite($log, $mensagem);
    fclose($log);
    
    // se for uma warning
    if ($numero == E_USER_WARNING)
    {
        echo $mensagem;
    }
    
    // se for um erro fatal
    else if ($numero == E_USER_ERROR)
    {
        echo $mensagem;
        die;
    }
}
// define a funзгo manipula_erro como manipuladora dos erros ocorridos
set_error_handler('manipula_erro');

// abrindo um arquivo
$arquivo = Abrir('/tmp/arquivo.dat');
echo $arquivo;
?>