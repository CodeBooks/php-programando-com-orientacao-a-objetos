<?php
/*
 * função __autoload()
 * carrega uma classe quando ela é necessária,
 * ou seja, quando ela é instancia pela primeira vez.
 */
function __autoload($classe)
{
    if (file_exists("app.ado/{$classe}.class.php"))
    {
        include_once "app.ado/{$classe}.class.php";
    }
}

/*
 * classe Aluno, filha de TRecord
 * persiste um Aluno no banco de dados
 */
class Aluno extends TRecord
{
    const TABLENAME = 'aluno';
}

/*
 * classe Curso, filha de TRecord
 * persiste um Curso no banco de dados
 */
class Curso extends TRecord
{
    const TABLENAME = 'curso';
}

// exclui objetos da base de dados
try
{
    // inicia transação com o banco 'pg_livro'
    TTransaction::open('pg_livro');
    
    // define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('/tmp/log5.txt'));
    
    // armazena esta frase no arquivo de LOG
    TTransaction::log("** Apagando da primeira forma");
    
    // carrrega o objeto
    $aluno = new Aluno(1);
    
    // delete o objeto
    $aluno->delete();
    
    // armazena esta frase no arquivo de LOG
    TTransaction::log("** Apagando da segunda forma");
    
    // instancia o modelo
    $modelo= new Aluno;
    
    // delete o objeto
    $modelo->delete(2);
    
    // finaliza a transação
    TTransaction::close();
    echo "Exclusão realizada com sucesso <br>\n";
}
catch (Exception $e) // em caso de exceção
{
    // exibe a mensagem gerada pela exceção
    echo '<b>Erro</b>' . $e->getMessage();
    
    // desfaz todas alterações no banco de dados
    TTransaction::rollback();
}
?>