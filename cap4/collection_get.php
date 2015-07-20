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
class Aluno extends TRecord
{
    const TABLENAME = 'aluno';
}
class Turma extends TRecord
{
    const TABLENAME = 'turma';
}
class Inscricao extends TRecord
{
    const TABLENAME = 'inscricao';
}

// obtém objetos do banco de dados
try
{
    // inicia transação com o banco 'pg_livro'
    TTransaction::open('pg_livro');
    
    // define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('/tmp/log6.txt'));
    
    // primeiro exemplo, lista todas turmas em andamento no turno Tarde #
    // cria um critério de seleção
    $criteria = new TCriteria;
    
    // filtra por turno e encerrada
    $criteria->add(new TFilter('turno',      '=', 'T'));
    $criteria->add(new TFilter('encerrada', '=', FALSE));
    
    // instancia um repositório para Turma
    $repository = new TRepository('Turma');
    
    // retorna todos objetos que satisfazem o critério
    $turmas = $repository->load($criteria);
    
    // verifica se retornou alguma turma
    if ($turmas)
    {
        echo "Turmas retornadas <br>\n";
        echo "================= <br>\n";
        
        // percorre todas turmas retornadas
        foreach ($turmas as $turma)
        {
            echo ' ID   : ' . $turma->id;
            echo ' Dia : ' . $turma->dia_semana;
            echo ' Sala : ' . $turma->sala;
            echo ' Turno: ' . $turma->turno;
            echo ' Professor:'. $turma->professor;
            echo "<br>\n";
        }
    }
    
    // segundo exemplo, lista todos aprovados da turma "1" #
    // instancia um critério de seleção
    $criteria = new TCriteria;
    $criteria->add(new TFilter('nota',       '>=',   7));
    $criteria->add(new TFilter('frequencia','>=',   75));
    $criteria->add(new TFilter('ref_turma', '=',     1));
    $criteria->add(new TFilter('cancelada', '=',    FALSE));
    
    // instancia um repositório para Inscricao
    $repository = new TRepository('Inscricao');
    
    // retorna todos objetos que satisfazem o critério
    $inscricoes = $repository->load($criteria);
    
    // verifica se retornou alguma inscrição
    if ($inscricoes)
    {
        echo "Inscrições retornadas <br>\n";
        echo "===================== <br>\n";
        
        // percorre todas inscrições retornadas
        foreach ($inscricoes as $inscricao)
        {
            echo ' ID    : ' . $inscricao->id;
            echo ' Aluno : ' . $inscricao->ref_aluno;
            
            // obtém o aluno relacionado à inscrição
            $aluno = new Aluno($inscricao->ref_aluno);
            echo ' Nome : ' . $aluno->nome;
            echo ' Rua : ' . $aluno->endereco;
            echo "<br>\n";
        }
    }
    
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