<?php
/*
 * funчуo __autoload()
 * carrega uma classe quando ela щ necessсria,
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
    
    // cria uma instruчуo de INSERT
    $sql = new TSqlInsert;
    
    // define o nome da entidade
    $sql->setEntity('famosos');
    
    // atribui o valor de cada coluna
    $sql->setRowData('codigo', 8);
    $sql->setRowData('nome', 'Galileu');
    
    // obtщm a conexуo ativa
    $conn = TTransaction::get();
    
    // executa a instruчуo SQL
    $result = $conn->Query($sql->getInstruction());
    
    // cria uma instruчуo de UPDATE
    $sql = new TSqlUpdate;
    
    // define o nome da entidade
    $sql->setEntity('famosos');
    
    // atribui o valor de cada coluna
    $sql->setRowData('nome', 'Galileu Galilei');
    
    // cria critщrio de seleчуo de dados
    $criteria = new TCriteria;
    
    // obtщm a pessoa de cѓdigo "8"
    $criteria->add(new TFilter('codigo', '=', '8'));
    
    // atribui o critщrio de seleчуo de dados
    $sql->setCriteria($criteria);
    
    // obtщm a conexуo ativa
    $conn = TTransaction::get();
    
    // executa a instruчуo SQL
    $result = $conn->Query($sql->getInstruction());
    
    // fecha a transaчуo, aplicando todas operaчѕes
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