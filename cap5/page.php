<?php
$option = $_GET['option'];

switch ($option)
{
    case 'listar':
        echo 'listando registro';
        break;
    case 'incluir':
        echo 'incluindo registro';
        break;
    case 'alterar':
        echo 'alterando registro';
        break;
    case 'excluir':
        echo 'excluindo registro';
        break;
}
?>