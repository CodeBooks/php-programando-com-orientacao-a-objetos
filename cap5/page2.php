<?php
include_once 'app.widgets/TElement.class.php';
include_once 'app.widgets/TPage.class.php';

class Mundo extends TPage
{
    function ola($param)
    {
        echo 'Olá meu amigo ' . $param['nome'];
    }
}

$pagina = new Mundo;
$pagina->show();
?>