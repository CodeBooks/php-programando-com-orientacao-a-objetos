<?php
class Cachorro
{
    public $coleira, $nome, $idade, $raca;
    
    # método construtor
    function __construct($coleira, $nome, $idade, $raca)
    {
        $this->coleira = $coleira;
        $this->nome     = $nome;
        $this->idade    = $idade;
        $this->raca     = $raca;
    }
    
    function __clone()
    {
        $this->coleira = $this->coleira +1;
        $this->nome   .= ' Junior';
        $this->idade    = 0;
    }
}

$toto = new Cachorro(100, 'Totó', 10, 'Fox Terrier');
$vava = clone $toto;

echo 'Código: ' . $toto->coleira . "<br>\n";
echo 'Nome:     ' . $toto->nome    . "<br>\n";
echo 'Idade:    ' . $toto->idade   . " anos <br>\n";
echo "<br>\n";
echo 'Código: ' . $vava->coleira . "<br>\n";
echo 'Nome:     ' . $vava->nome    . "<br>\n";
echo 'Idade:    ' . $vava->idade   . " anos <br>\n";
?>