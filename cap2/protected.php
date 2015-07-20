<?php
# carrega as classes
include 'classes/Funcionario2.class.php';
include 'classes/Estagiario.class.php';

$pedrinho = new Estagiario;
$pedrinho->SetSalario(248);
echo 'O Salário do Pedrinho é R$: ' . $pedrinho->GetSalario() . "\n";
?>
