<?php
# carrega as classes
include 'classes/Funcionario3.class.php';
include 'classes/Estagiario.class.php';

// cria objeto Funcionario
$pedrinho = new Funcionario;
$pedrinho->Nome = 'Pedrinho';

// cria objeto Estagiario
$mariana = new Estagiario;
$mariana->Nome = 'Mariana';

// imprime propriedade Nome
echo $pedrinho->Nome;
echo "<br>\n";
echo $mariana->Nome;
?>
