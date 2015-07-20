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

// cria o formulário
$form = new TForm('form_pessoas');

// cria a tabela para organizar o layout
$table = new TTable;
$table->border = 1;
$table->bgcolor ='#f2f2f2';

// adiciona a tabela no formulário
$form->add($table);

// cria um rótulo de texto para o título
$titulo = new TLabel('Exemplo de Formulário');
$titulo->setFontFace('Arial');
$titulo->setFontColor('red');
$titulo->setFontSize(18);

// adiciona uma linha à tabela
$row=$table->addRow();
$titulo = $row->addCell($titulo);
$titulo->colspan = 2;

// cria duas outras tabelas
$table1 = new TTable;
$table2 = new TTable;

// cria uma série de campos de entrada de dados
$codigo      = new TEntry('codigo');
$nome        = new TEntry('nome');
$endereco    = new TEntry('endereco');
$telefone    = new TEntry('telefone');
$cidade      = new TCombo('cidade');
$items= array();
$items['1'] = 'Porto Alegre';
$items['2'] = 'Lajeado';
$cidade->addItems($items);

// ajusta o tamanho destes campos
$codigo->setSize(70);
$nome->setSize(140);
$endereco->setSize(140);
$telefone->setSize(140);
$cidade->setSize(140);

// cria uma série de rótulos de texto
$label1=new TLabel('Código');
$label2=new TLabel('Nome');
$label3=new TLabel('Cidade');
$label4=new TLabel('Endereço');
$label5=new TLabel('Telefone');

// adiciona linha na tabela para o código
$row=$table1->addRow();
$row->addCell($label1);
$row->addCell($codigo);

// adiciona linha na tabela para o nome
$row=$table1->addRow();
$row->addCell($label2);
$row->addCell($nome);

// adiciona linha na tabela para a cidade
$row=$table1->addRow();
$row->addCell($label3);
$row->addCell($cidade);

// adiciona linha na tabela para o endereço
$row=$table2->addRow();
$row->addCell($label4);
$row->addCell($endereco);

// adiciona linha na tabela para o telefone
$row=$table2->addRow();
$row->addCell($label5);
$row->addCell($telefone);

// adiciona as tabelas lado-a-lado da tabela principal
$row=$table->addRow();
$row->addCell($table1);
$row->addCell($table2);

// exibe o formulário
$form->show();
?>