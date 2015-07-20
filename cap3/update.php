<?php
/*
 * função __autoload()
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instancia pela primeira vez.
 */
function __autoload($classe)
{
    if (file_exists("app.ado/{$classe}.class.php"))
    {
        include_once "app.ado/{$classe}.class.php";
    }
}

// cria critério de seleção de dados
$criteria = new TCriteria;
$criteria->add(new TFilter('id', '=', '3'));

// cria instrução de UPDATE
$sql = new TSqlUpdate;

// define a entidade
$sql->setEntity('aluno');

// atribui o valor de cada coluna
$sql->setRowData('nome',     'Pedro Cardoso da Silva');
$sql->setRowData('rua',      'Machado de Assis');
$sql->setRowData('fone',     '(88) 5555');

// define o critério de seleção de dados
$sql->setCriteria($criteria);

// processa a instrução SQL
echo $sql->getInstruction();
echo "<br>\n";
?>