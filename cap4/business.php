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
    
    /*
     * método Inscrever
     * cria uma inscrição para este aluno
     * @param $turma = número da turma
     */
    function Inscrever($turma)
    {
        // instancia uma inscrição
        $inscricao = new Inscricao;
        
        // define algumas propriedades
        $inscricao->ref_aluno = $this->id;
        $inscricao->ref_turma = $turma;
        
        // persiste a inscrição
        $inscricao->store();
    }
}

/*
 * classe Inscricao, filha de TRecord
 * persiste uma Inscricao no banco de dados
 */
class Inscricao extends TRecord
{
    const TABLENAME = 'inscricao';
}

// insere novos objetos no banco de dados
try
{
    // inicia transação com o banco 'pg_livro'
    TTransaction::open('pg_livro');
    
    // define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('/tmp/log12.txt'));
    
    // armazena esta frase no arquivo de LOG
    TTransaction::log("** inserindo o aluno \$carlos");
    
    // instancia um aluno novo
    $carlos= new Aluno;
    $carlos->nome     = "Carlos Ranzi";
    $carlos->endereco = "Rua Francisco Oscar";
    $carlos->telefone = "(51) 1234-5678";
    $carlos->cidade   = "Lajeado";
    
    // persiste o objeto aluno
    $carlos->store();
    
    // armazena esta frase no arquivo de LOG
    TTransaction::log("** inscrevendo o aluno nas turmas");
    
    // executa o método Inscrever (na turma 1 e 2)
    $carlos->Inscrever(1);
    $carlos->Inscrever(2);
    
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