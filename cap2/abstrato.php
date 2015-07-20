<?php
include_once 'classes/Pessoa2.class.php';
include_once 'classes/Conta4.class.php';
include_once 'classes/ContaPoupanca.class.php';

$carlos = new Pessoa(10, "Carlos da Silva", 1.85, 25, 72,"Ensino Médio", 650.00);
$conta = new ContaPoupanca(6677, "CC.1234.56", "10/07/02", $carlos, 9876, 500.00, '10/07');
?>
