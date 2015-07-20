<?php
// cria array dados_william
$dados_william = array();
$dados_william['nome']      = 'William Scatola';
$dados_william['idade']     = 22;
$dados_william['profissao'] = 'Controle de Estoque';

// cria array dados_daline
$dados_daline = array();
$dados_daline['nome']      = 'Daline DallOglio';
$dados_daline['idade']     = 21;
$dados_daline['profissao'] = 'Almoxarifado';

// cria objeto william
$william = new StdClass;
foreach ($dados_william as $chave => $valor)
{
    // utiliza variáveis variantes
    $william->$chave = $valor;
}

// cria objeto daline
$daline = new StdClass;
foreach ($dados_daline as $chave => $valor)
{
    // utiliza variáveis variantes
    $daline->$chave = $valor;
}
echo "{$william ->nome} é {$william->profissao}<br>\n";
echo "{$daline->nome}   é {$daline->profissao}<br>\n";
?>