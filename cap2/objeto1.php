<?php
// insere a classe
include_once 'classes/Produto1.class.php';

// cria um objeto
$produto = new Produto;

// atribuir valores
$produto->Codigo = 4001;
$produto->Descricao = 'CD - The Best of Eric Clapton';
var_dump($produto);
?>
