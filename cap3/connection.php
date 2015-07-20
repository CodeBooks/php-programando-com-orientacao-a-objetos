<?php
/*
 * função __autoload()
 * Carrega uma classe quando ela é necessária,
 * ou seja, quando ela é instancia pela primeira vez.
 */
function __autoload($classe)
{
    if (file_exists("app.ado/{$classe}.class.php"))
    {
        include_once "app.ado/{$classe}.class.php";
    }
}

// cria instrução de SELECT
$sql = new TSqlSelect;

// define o nome da entidade
$sql->setEntity('famosos');

// acrescenta colunas à consulta
$sql->addColumn('codigo');
$sql->addColumn('nome');

// cria critério de seleção de dados
$criteria = new TCriteria;

// obtém a pessoa de código "1"
$criteria->add(new TFilter('codigo', '=', '1'));

// atribui o critério de seleção de dados
$sql->setCriteria($criteria);

try
{
    // abre conexão com a base my_livro (mysql)
    $conn = TConnection::open('my_livro');
    
    // executa a instrução SQL
    $result = $conn->query($sql->getInstruction());
    if ($result)
    {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        // exibe os dados resultantes
        echo $row['codigo'] . ' - ' . $row['nome'] . "<br>\n";
    }
    // fecha a conexão
    $conn = null;
}
catch (PDOException $e)
{
    // exibe a mensagem de erro
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}

try
{
    // abre conexão com a base pg_livro (postgres)
    $conn = TConnection::open('pg_livro');
    // executa a instrução SQL
    $result = $conn->query($sql->getInstruction());
    if ($result)
    {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        // exibe os dados resultantes
        echo $row['codigo'] . ' - ' . $row['nome'] . "<br>\n";
    }
    // fecha a conexão
    $conn = null;
}
catch (Exception $e)
{
    // exibe a mensagem de erro
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}
?>