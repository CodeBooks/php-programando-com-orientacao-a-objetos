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

// obtém objetos do banco de dados
try
{
    // inicia transação com o banco 'pg_livro'
    TTransaction::open('pg_livro');
    
    // define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('/tmp/log2.txt'));
    
    // exibe algumas mensagens na tela
    echo "obtendo alunos<br>\n";
    echo "==============<br>\n";
    
    // obtém o aluno de ID 1
    $aluno= new Aluno(1);
    echo 'Nome     : ' . $aluno->nome     . "<br>\n";
    echo 'Endereço : ' . $aluno->endereco . "<br>\n";
    
    // obtém o aluno de ID 2
    $aluno= new Aluno(2);
    echo 'Nome     : ' . $aluno->nome     . "<br>\n";
    echo 'Endereço : ' . $aluno->endereco . "<br>\n";
    
    // obtém alguns cursos
    echo "<br>\n";
    echo "obtendo cursos<br>\n";
    echo "==============<br>\n";
    
    // obtém o curso de ID 1
    $curso= new Curso(1);
    echo 'Curso : ' . $curso->descricao . "<br>\n";
    
    // obtém o curso de ID 2
    $curso= new Curso(2);
    echo 'Curso : ' . $curso->descricao . "<br>\n";
    
    // finaliza a transação
    TTransaction::close();
}
catch (Exception $e) // em caso de exceção
{
    // exibe a mensagem gerada pela exceção
    echo '<b>Erro</b>' . $e->getMessage();
    
    // desfaz todas alterações no banco de dados
    TTransaction::rollback();
}
?>