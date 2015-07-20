<?php
# função de carga autoática
function __autoload($classe)
{
    # busca classe no diretório de classes...
    include_once "classes/{$classe}.class.php";
}

# instanciando novo Produto
$bolo = new Produto(500, 'Bolo de Fubá', 4, 4.12);
echo 'Código: ' . $bolo->Codigo . "<br>\n";
echo 'Nome:     ' . $bolo->Descricao . "<br>\n";
?>