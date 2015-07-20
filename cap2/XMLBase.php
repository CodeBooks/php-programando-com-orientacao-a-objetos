<?php
# inclue classe XMLBase
include_once 'classes/XMLBase.class.php';

class Cachorro extends XMLBase
{
    # método construtor
    function __construct($nome, $idade, $raca)
    {
        
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raca = $raca;
    }
}

$toto = new Cachorro('Totó', 10, 'Fox Terrier');
$vava = new Cachorro('Daba', 8, 'Dálmata');
echo $toto->toXml();
echo $vava->toXml();
?>