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

/* cria as classes Active Record
   para manipular os registros das tabelas correspondentes */
class Turma extends TRecord
{
    const TABLENAME = 'turma';
}
class Inscricao extends TRecord
{
    const TABLENAME = 'inscricao';
}

// deleta objetos do banco de dados
try
{
    // inicia transação com o banco 'pg_livro'
    TTransaction::open('pg_livro');
    
    // define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('/tmp/log9.txt'));
    
    // primeiro exemplo, exclui todas turmas da tarde
    TTransaction::log("** exclui as turmas da tarde");
    
    // instancia um critério de seleção turno = 'T'
    $criteria = new TCriteria;
    $criteria->add(new TFilter('turno', '=', 'T'));
    
    // instancia repositório de Turmas
    $repository = new TRepository('Turma');
    
    // retorna todos objetos que satisfazem o critério
    $turmas = $repository->load($criteria);
    
    // verifica se retornou alguma turma
    if ($turmas)
    {
        // percorre todas turmas retornadas
        foreach ($turmas as $turma)
        {
            // exclui a turma
            $turma->delete();
        }
    }
    
    // segundo exemplo, exclui as inscrições do aluno "1"
    TTransaction::log("** exclui as inscrições do aluno '1'");
    
    // instancia critério de seleção de dados ref_aluno ='1'
    $criteria = new TCriteria;
    $criteria->add(new TFilter('ref_aluno', '=', 1));
    
    // instancia repositório de Inscrição
    $repository = new TRepository('Inscricao');
    
    // exclui todos objetos que satisfaçam este critério de seleção
    $repository->delete($criteria);
    echo "registros excluídos com sucesso <br>\n";
    
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