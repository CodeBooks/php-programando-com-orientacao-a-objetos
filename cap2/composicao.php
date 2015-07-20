<?php
include_once 'classes/Fornecedor2.class.php';
include_once 'classes/Contato.class.php';

# instancia novo fornecedor
$fornecedor = new Fornecedor;
$fornecedor->RazaoSocial = 'Produtos Bom Gosto S.A.';

# atribui informações de contato
$fornecedor->SetContato('Mauro', '51 1234-5678', 'mauro@bomgosto.com.br');

# imprime informações
echo $fornecedor->RazaoSocial . "<br>\n";
echo "Informações de Contato<br>\n";
echo $fornecedor->GetContato();
?>
