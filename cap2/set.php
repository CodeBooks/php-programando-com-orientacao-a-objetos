<?php
#inclui classe cachorro
include_once 'classes/Cachorro.class.php';

$toto = new Cachorro('Totó');
$toto->Nascimento = '3 de março'; // atribuição inválida
$toto->Nascimento = '10/04/2005'; // atribuição correta
?>
