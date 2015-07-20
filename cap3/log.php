<?php
/*
 * funчуo __autoload()
 * Carrega uma classe quando ela щ necessсria,
 * ou seja, quando ela щ instancia pela primeira vez.
 */
function __autoload($classe)
{
    if (file_exists("app.ado/{$classe}.class.php"))
    {
        include_once "app.ado/{$classe}.class.php";
    }
}

try
{
    // abre uma transaчуo
    TTransaction::open('pg_livro');
    
    // define a estratщgia de LOG
    TTransaction::setLogger(new TLoggerHTML('/tmp/arquivo.html'));
    
    // escreve mensagem de LOG
    TTransaction::log("Inserindo registro William Wallace");
    
    // cria uma instruчуo de INSERT
    $sql = new TSqlInsert;
    
    // define o nome da entidade
    $sql->setEntity('famosos');
    
    // atribui o valor de cada coluna
    $sql->setRowData('codigo', 9);
    $sql->setRowData('nome', 'William Wallace');
    
    // obtщm a conexуo ativa
    $conn = TTransaction::get();
    
    // executa a instruчуo SQL
    $result = $conn->Query($sql->getInstruction());
    
    // escreve mensagem de LOG
    TTransaction::log($sql->getInstruction());
    
    // define a estratщgia de LOG
    TTransaction::setLogger(new TLoggerXML('/tmp/arquivo.xml'));
    
    // escreve mensagem de LOG
    TTransaction::log("Inserindo registro Albert Einstein");
    
    // cria uma instruчуo de INSERT
    $sql = new TSqlInsert;
    
    // define o nome da entidade
    $sql->setEntity('famosos');
    
    // atribui o valor de cada coluna
    $sql->setRowData('codigo', 10);
    $sql->setRowData('nome', 'Albert Einstein');
    
    // obtщm a conexуo ativa
    $conn = TTransaction::get();
    
    // executa a instruчуo SQL
    $result = $conn->Query($sql->getInstruction());
    
    // escreve mensagem de LOG
    TTransaction::log($sql->getInstruction());
    
    // fecha a transaчуo, aplicando todas as operaчѕes
    TTransaction::close();
}
catch (Exception $e)
{
    // exibe a mensagem de erro
    echo $e->getMessage();
    // desfaz operaчѕes realizadas durante a transaчуo
    TTransaction::rollback();
}
?>