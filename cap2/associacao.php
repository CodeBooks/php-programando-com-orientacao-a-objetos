<?php
include_once 'classes/Fornecedor1.class.php';
include_once 'classes/Produto2.class.php';

// instancia Fornecedor
$fornecedor = new Fornecedor;
$fornecedor->Codigo      = 848;
$fornecedor->RazaoSocial= 'Bom Gosto Alimentos S.A.';
$fornecedor->Endereco    = 'Rua Ipiranga';
$fornecedor->Cidade      = 'Poços de Caldas';

// instancia Produto
$produto = new Produto;
$produto->Codigo      = 462;
$produto->Descricao = 'Doce de Pêssego';
$produto->Preco       = 1.24;
$produto->Fornecedor = $fornecedor;

// imprime atributos
echo 'Código      : ' . $produto->Codigo . "<br>\n";
echo 'Descrição   : ' . $produto->Descricao . "<br>\n";
echo 'Código      : ' . $produto->Fornecedor->Codigo . "<br>\n";
echo 'Razão Social: ' . $produto->Fornecedor->RazaoSocial . "<br>\n";
?>
