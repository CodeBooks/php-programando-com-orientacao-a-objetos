<?php
function __autoload($classe)
{
    if (file_exists("app.widgets/{$classe}.class.php"))
    {
        include_once "app.widgets/{$classe}.class.php";
    }
}

class Pagina extends TPage
{
    private $table;
    private $content;
    
    /**
     * método __construct()
     * instancia uma nova página
     */
    function __construct()
    {
        parent::__construct();
        
        // cria uma tabela
        $this->table = new TTable;
        
        // define algumas propriedades para tabela
        $this->table->border = 1;
        $this->table->width = 500;
        $this->table->style = 'border-collapse:collapse';
        
        // adiciona uma linha na tabela
        $row = $this->table->addRow();
        $row->bgcolor ='#d0d0d0';
        
        // cria três ações
        $action1 = new TAction(array($this, 'onProdutos'));
        $action2 = new TAction(array($this, 'onContato'));
        $action3 = new TAction(array($this, 'onEmpresa'));
        
        // cria três links
        $link1 = new TElement('a');
        $link2 = new TElement('a');
        $link3 = new TElement('a');
        
        // define a ação dos links
        $link1->href = $action1->serialize();
        $link2->href = $action2->serialize();
        $link3->href = $action3->serialize();
        
        // define o rótulo de texto dos links
        $link1->add('Produtos');
        $link2->add('Contato');
        $link3->add('Empresa');
        
        // adiciona os links na linha
        $row->addCell($link1);
        $row->addCell($link2);
        $row->addCell($link3);
        
        // cria uma linha para conteúdo
        $this->content = $this->table->addRow();
        
        // adiciona a tabela na página
        parent::add($this->table);
    }
    
    /**
     * método onProdutos()
     * executado quando o usuário clicar no link "Produtos"
     * @param $get = variável $_GET
     */
    function onProdutos($get)
    {
        $texto = "Nesta seção você vai conhecer os produtos da nossa empresa
        Temos desde pintos, frangos, porcos, bois, vacas e todo tipo de animal
        que você pode imaginar na nossa fazenda.";
        
        // adiciona o texto na linha de conteúdo da tabela
        $celula = $this->content->addCell($texto);
        $celula->colspan = 3;
        
        // cria uma janela
        $win = new TWindow('Promoção');
        
        // define posição e tamanho
        $win->setPosition(200,100);
        $win->setSize(240,100);
        
        // adiciona texto na janela
        $win->add('Temos cogumelos recém colhidos e também ovos de codorna fresquinhos');
        // exibe a janela
        $win->show();
    }
    
    /**
     * método onContato()
     * executado quando o usuário clicar no link "Contato"
     * @param $get = variável $_GET
     */
    function onContato($get)
    {
        $texto = "Para entrar em contato com nossa empresa,
        ligue para 0800-1234-5678 ou mande uma carta endereçada para
        Linha alto coqueiro baixo, fazenda recanto escondido.";
        // adiciona o texto na linha de conteúdo da tabela
        $celula = $this->content->addCell($texto);
        $celula->colspan = 3;
    }
    
    /**
     * método onEmpresa()
     * executado quando o usuário clicar no link "Empresa"
     * @param $get = variável $_GET
     */
    function onEmpresa($get)
    {
        $texto = "Aqui na fazenda recanto escondido fazemos eco-turismo,
        você vai poder conhecer nossas instalações,
        tirar leite diretamente da vaca, recolher os ovos do galinheiro e o mais
        importante, vai poder limpar as instalações dos suínos, o que é o auge
        do passeio. Não deixe de conhecer nossa fazenda, temos lindas cabanas
        equipadas com cama de casal, fogão a lenha e banheiro";
        
        // adiciona o texto na linha de conteúdo da tabela
        $celula = $this->content->addCell($texto);
        $celula->colspan = 3;
    }
}
// instancia nova página
$pagina = new Pagina;

// exibe a página juntamente com seu conteúdo e interpreta a URL
$pagina->show();
?>