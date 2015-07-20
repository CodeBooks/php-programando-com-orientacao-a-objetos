<?php
class Cachorro
{
    private $Nascimento;
    
    # método construtor
    function __construct($nome)
    {
        $this->nome = $nome;
    }
    
    # intercepta atribuição
    function __set($propriedade, $valor)
    {
        if ($propriedade == 'Nascimento')
        {
            # verifica se valor é dividido em
            # 3 partes separadas por '/'
            if (count(explode('/', $valor))==3)
            {
                echo "Dado '$valor', atribuido à '$propriedade'<br>\n";
                $this->$propriedade = $valor;
            }
            else
            {
                echo "Dado '$valor', não atribuido à '$propriedade'<br>\n";
            }
        }
        else
        {
            $this->$propriedade = $valor;
        }
    }
}
?>