<?php
/*
 * função __autoload()
 * carrega uma classe quando ela é necessária,
 * ou seja, quando ela é instancia pela primeira vez.
 */
function __autoload($classe)
{
    $pastas = array('app.widgets', 'app.ado');
    foreach ($pastas as $pasta)
    {
        if (file_exists("{$pasta}/{$classe}.class.php"))
        {
            include_once "{$pasta}/{$classe}.class.php";
        }
    }
}

// Active Record para tabela Livro
class Livro extends TRecord
{
    const TABLENAME = 'livro';
}

class LivrosForm extends TPage
{
    private $form;
    function __construct()
    {
        parent::__construct();
        
        // instancia o formulário
        $this->form = new TForm;
        $this->form->setName('form_livros');
        
        // instancia o painél
        $panel= new TPanel(400,300);
        $this->form->add($panel);
        
        // coloca o campo id no formulário
        $panel->put(new TLabel('ID'), 10, 10);
        $panel->put($id = new TEntry('id'), 100,10);
        $id->setSize(100);
        $id->setEditable(FALSE);
        
        // coloca a imagem de um livro
        $panel->put(new TImage('book.png'), 320, 20);
        
        // coloca o campo título no formulário
        $panel->put(new TLabel('Título'), 10, 40);
        $panel->put($titulo = new TEntry('titulo'), 100,40);
        
        // coloca o campo autor no formulário
        $panel->put(new TLabel('Autor'), 10, 70);
        $panel->put($autor = new TEntry('autor'), 100,70);
        
        // coloca o campo tema no formulário
        $panel->put(new TLabel('Tema'), 10, 100);
        $panel->put($tema= new TCombo('tema'), 100,100);
        
        // cria um vetor com as opções da combo tema
        $items= array();
        $items['1'] = 'Administração';
        $items['2'] = 'Informática';
        $items['3'] = 'Economia';
        $items['4'] = 'Matemática';
        
        // adiciona os itens na combo
        $tema->addItems($items);
        
        // coloca o campo editora no formulário
        $editora = new TEntry('editora');
        $panel->put(new TLabel('Editora'), 10,130);
        $panel->put($editora, 100, 130);
        
        // coloca o campo ano no formulário
        $panel->put(new TLabel('Ano'), 210, 130);
        $panel->put($ano    = new TEntry('ano'), 260, 130);
        $editora->setSize(100);
        $ano->setSize(40);
        
        // coloca o campo resumo no formulário
        $panel->put(new TLabel('Resumo'), 10, 160);
        $panel->put($resumo = new TText('resumo'), 100, 160);
        
        // cria uma ação
        $panel->put($acao = new TButton('action1'), 320, 240);
        $acao->setAction(new TAction(array($this, 'onSave')), 'Salvar');
        
        // define quais são os campos do formulário
        $this->form->setFields(array($id, $titulo, $autor, $tema, $editora, $ano, $resumo, $acao));
        parent::add($this->form);
    }
    
    /*
     * método onSave
     * obtém os dados do formulário e salva na base de dados
     */
    function onSave()
    {
        try
        {
            // inicia transação com o banco 'pg_livro'
            TTransaction::open('pg_livro');
            
            // obtém dados
            $livro = $this->form->getData('Livro');
            
            // armazena registro
            $livro->store();
            
            // joga os dados de volta ao formulário
            $this->form->setData($livro);
            
            // define o formulário como não-editável
            $this->form->setEditable(FALSE);
            
            // finaliza a transação
            TTransaction::close();
            new TMessage('info', 'Dados armazenados com sucesso');
        }
        catch (Exception $e) // em caso de exceção
        {
            // exibe a mensagem gerada pela exceção
            new TMessage('error', '<b>Erro</b>' . $e->getMessage());
            
            // desfaz todas alterações no banco de dados
            TTransaction::rollback();
        }
    }
    
    /**
     * método onEdit
     * carrega os dados do registro no formulário
     * @param $param = parâmetros passados via URL ($_GET)
     */
    function onEdit($param)
    {
        try
        {
            // inicia transação com o banco 'pg_livro'
            TTransaction::open('pg_livro');
            
            // obtém o livro pelo ID
            $livro= new Livro($param['id']);
            
            // joga os dados no formulário
            $this->form->setData($livro);
            
            // finaliza a transação
            TTransaction::close();
        }
        catch (Exception $e) // em caso de exceção
        {
            // exibe a mensagem gerada pela exceção
            new TMessage('error', '<b>Erro</b>' . $e->getMessage());
            
            // desfaz todas alterações no banco de dados
            TTransaction::rollback();
        }
    }
}

// instancia e exibe a página
$page = new LivrosForm;
$page->show();
?>