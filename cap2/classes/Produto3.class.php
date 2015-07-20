<?php
class Produto
{
    public $Codigo;
    public $Descricao;
    public $Quantidade;
    private $Preco;
    const MARGEM = 10;
    
    # método construtor de um Produto
    function __construct($Codigo, $Descricao, $Quantidade, $Preco)
    {
        $this->Codigo    = $Codigo;
        $this->Descricao = $Descricao;
        $this->Quantidade= $Quantidade;
        $this->Preco     = $Preco;
    }
    
    # intercepta a obtenção de propriedades
    function __get($propriedade)
    {
        echo "Obtendo o valor de '$propriedade' :<br>\n";
        if ($propriedade == 'Preco')
        {
            return $this->$propriedade * (1 + (self::MARGEM / 100));
        }
    }
}
?>