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

// instancia objeto Aluno
$fabio = new Aluno;

// define algumas propriedades
$fabio->nome     = 'Fábio Locatelli';
$fabio->endereco = 'Rua Merlin';
$fabio->telefone = '(51) 2222-1111';
$fabio->cidade   = 'Lajeado';

// clona o objeto $fabio
$julia = clone $fabio;

// altera algumas propriedades
$julia->nome     = 'Júlia Haubert';
$julia->telefone = '(51) 2222-2222';
try
{
    // inicia transação com o banco 'pg_livro'
    TTransaction::open('pg_livro');
    
    // define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('/tmp/log4.txt'));
    
    // armazena o objeto $fabio
    TTransaction::log("** persistindo o aluno \$fabio");
    $fabio->store();
    
    // armazena o objeto $julia
    TTransaction::log("** persistindo o aluno \$julia");
    $julia->store();
    
    // finaliza a transação
    TTransaction::close();
    echo "clonagem realizada com sucesso <br>\n";
}
catch (Exception $e) // em caso de exceção
{
    // exibe a mensagem gerada pela exceção
    echo '<b>Erro</b>' . $e->getMessage();
    
    // desfaz todas alterações no banco de dados
    TTransaction::rollback();
}
?>