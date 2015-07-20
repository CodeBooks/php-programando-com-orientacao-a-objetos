<?php
class Cachorro
{
    private $Nascimento;
    
    # método construtor
    function __construct($nome)
    {
        $this->nome = $nome;
    }
    
    # tostring, executado sempre que o objeto for impresso
    function __tostring()
    {
        return $this->nome;
    }
}
$toto = new Cachorro('Totó');
$vava = new Cachorro('Daba');
echo $toto;
echo "<br>\n";
echo $vava;
echo "<br>\n";
?>