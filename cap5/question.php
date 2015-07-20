<?php
function __autoload($classe)
{
    if (file_exists("app.widgets/{$classe}.class.php"))
    {
        include_once "app.widgets/{$classe}.class.php";
    }
}

/*
 * classe Pagina
 * demonstra o funcionamento de um diсlogo de questуo
 */
class Pagina extends TPage
{
    private $panel;
    
    /**
     * mщtodo construtor
     * instancia uma nova pсgina
     */
    function __construct()
    {
        parent::__construct();
        
        // cria um novo painel
        $this->panel = new TPanel(400,200);
        
        // coloca um novo texto na coluna:10 linha:10
        $this->panel->put(new TParagraph('Responda a questуo'), 10, 10);
        
        // cria duas aчѕes
        $action1 = new TAction(array($this, 'onYes'));
        $action2 = new TAction(array($this, 'onNo'));
        
        // exibe a pergunta ao usuсrio
        new TQuestion('Deseja realmente excluir o registro?', $action1, $action2);
        
        // adiciona o painel р janela
        parent::add($this->panel);
    }
    
    /**
     * mщtodo onYes
     * executado caso o usuсrio responda SIM para pergunta
     */
    function onYes()
    {
        $this->panel->put(new TParagraph('Vocъ escolheu a opчуo sim'), 10, 40);
    }
    
    /**
     * mщtodo onYes
     * executado caso o usuсrio responda NУO para pergunta
     */
    function onNo()
    {
        $this->panel->put(new TParagraph('Vocъ escolheu a opчуo nуo'), 10, 40);
    }
}

// instancia a pсgina
$pagina = new Pagina;

// exibe a pсgina
$pagina->show();
?>