<?php
/*
 * função __autoload()
 * carrega uma classe quando ela é necessária,
 * ou seja, quando ela é instancia pela primeira vez.
 */
function __autoload($classe)
{
    if (file_exists("app.widgets/{$classe}.class.php"))
    {
        include_once "app.widgets/{$classe}.class.php";
    }
}

class PessoasList extends TPage
{
    private $datagrid;
    public function __construct()
    {
        parent::__construct();
        
        // instancia objeto DataGrid
        $this->datagrid = new TDataGrid;
        
        // instancia as colunas da DataGrid
        $codigo   = new TDataGridColumn('codigo',   'Código',   'left',    50);
        $nome     = new TDataGridColumn('nome',     'Nome',     'left',   180);
        $endereco = new TDataGridColumn('endereco', 'Endereço', 'left',   140);
        $telefone = new TDataGridColumn('fone',     'Fone',     'center', 100);
        
        // adiciona as colunas à DataGrid
        $this->datagrid->addColumn($codigo);
        $this->datagrid->addColumn($nome);
        $this->datagrid->addColumn($endereco);
        $this->datagrid->addColumn($telefone);
        
        // instancia duas ações da DataGrid
        $action1 = new TDataGridAction(array($this, 'onDelete'));
        $action1->setLabel('Deletar');
        $action1->setImage('ico_delete.png');
        $action1->setField('codigo');
        
        $action2 = new TDataGridAction(array($this, 'onView'));
        $action2->setLabel('Visualizar');
        $action2->setImage('ico_view.png');
        $action2->setField('nome');
        
        // adiciona as ações à DataGrid
        $this->datagrid->addAction($action1);
        $this->datagrid->addAction($action2);
        
        // cria o modelo da DataGrid, montando sua estrutura
        $this->datagrid->createModel();
        
        // adiciona a DataGrid à página
        parent::add($this->datagrid);
    }
    
    function show()
    {
        $this->datagrid->clear();
        
        // adiciona um objeto padrão à DataGrid
        $item = new StdClass;
        $item->codigo   = '1';
        $item->nome     = 'Daline DallOglio';
        $item->endereco = 'Rua Conceição';
        $item->fone     = '1111-1111';
        $this->datagrid->addItem($item);
        
        // adiciona um objeto padrão à DataGrid
        $item = new StdClass;
        $item->codigo   = '2';
        $item->nome     = 'William Scatola';
        $item->endereco = 'Rua Conceição';
        $item->fone     = '2222-2222';
        $this->datagrid->addItem($item);
        
        // adiciona um objeto padrão à DataGrid
        $item = new StdClass;
        $item->codigo   = '3';
        $item->nome     = 'Sâmara Petter';
        $item->endereco = 'Rua Oliveira';
        $item->fone     = '3333-3333';
        $this->datagrid->addItem($item);
        
        // adiciona um objeto padrão à DataGrid
        $item = new StdClass;
        $item->codigo   = '4';
        $item->nome     = 'Ana Amélia Petter';
        $item->endereco = 'Rua Oliveira';
        $item->fone     = '4444-4444';
        $this->datagrid->addItem($item);
        parent::show();
    }
    
    /*
     * função onDelete()
     * executada quando o usuário clicar no botão excluir
     */
    function onDelete($param)
    {
        // obtém o parâmetro e exibe mensagem
        $key=$param['key'];
        new TMessage('error', "O registro $key <br> não pode ser excluído");
    }
    
    /*
     * função onView()
     * executada quando o usuário clicar no botão visualizar
     */
    function onView($param)
    {
        // obtém o parâmetro e exibe mensagem
        $key=$param['key'];
        new TMessage('info', "O nome é: <br> $key");
    }
}
$page = new PessoasList;
$page->show();
?>