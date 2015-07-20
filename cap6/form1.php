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

// instancia um formulário
$form = new TForm('form_email');

// instancia uma tabela
$table = new TTable;

// adiciona a tabela ao formulário
$form->add($table);

// cria os campos do formulário
$nome      = new TEntry('nome');
$email     = new TEntry('email');
$titulo    = new TEntry('titulo');
$mensagem = new TText('mensagem');

// adiciona uma linha para o campo nome
$row=$table->addRow();
$row->addCell(new TLabel('Nome:'));
$row->addCell($nome);

// adiciona uma linha para o campo email
$row=$table->addRow();
$row->addCell(new TLabel('Email:'));
$row->addCell($email);

// adiciona uma linha para o campo título
$row=$table->addRow();
$row->addCell(new TLabel('Título:'));
$row->addCell($titulo);

// adiciona uma linha para o campo mensagem
$row=$table->addRow();
$row->addCell(new TLabel('Mensagem:'));
$row->addCell($mensagem);

// cria dois botões de ação para o formuláriop
$action1=new TButton('action1');
$action2=new TButton('action2');

// define as ações dos botões
$action1->setAction(new TAction('onSend'), 'Enviar');
$action2->setAction(new TAction('onView'), 'Visualizar');

// adiciona uma linha para as ações do formulário
$row=$table->addRow();
$row->addCell($action1);
$row->addCell($action2);

// define quais são os campos do formulário
$form->setFields(array($nome, $email, $titulo, $mensagem, $action1, $action2));

/*
 * função onView
 * visualiza os dados do formulário
 */
function onView()
{
    global $form;
    
    // obtém os dados do formulário
    $data = $form->getData();
    
    // atribui os dados de volta ao formulário
    $form->setData($data);
    
    // cria uma janela
    $window = new TWindow('Dados do Form');
    
    // define posição e tamanho em pixels
    $window->setPosition(300, 70);
    $window->setSize(300,150);
    
    // monta o texto a ser exibido
    $output = "Nome:     {$data->nome}\n";
    $output.= "Email:    {$data->email}\n";
    $output.= "Título:   {$data->titulo}\n";
    $output.= "Mensagem: \n{$data->mensagem}";
    
    // cria um objeto de texto
    $text = new TText('texto', 300);
    $text->setSize(290,120);
    $text->setValue($output);
    
    // adiciona o objeto à janela
    $window->add($text);
    $window->show();
}

/*
 * função onSend
 * exibe mensagem "Enviando dados..."
 */
function onSend()
{
    global $form;
    
    // obtém os dados do formulário
    $data = $form->getData();
    
    // atribui os dados de volta ao formulário
    $form->setData($data);
    
    // torna o formulário não-editável
    $form->setEditable(FALSE);
    
    // exibe mensagem ao usuário
    new TMessage('info', 'Enviando dados...');
}
$page = new TPage;
$page->add($form);
$page->show();
?>