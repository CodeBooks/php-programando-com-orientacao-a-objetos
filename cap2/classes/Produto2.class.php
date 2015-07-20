<?php
class Produto
{
    public $Codigo;
    public $Descricao;
    public $Preco;
    public $Quantidade;
    
    function ImprimeEtiqueta()
    {
        print 'Código:    ' . $this->Codigo . "<br>\n";
        print 'Descrição: ' . $this->Descricao . "<br>\n";
    }
}
?>