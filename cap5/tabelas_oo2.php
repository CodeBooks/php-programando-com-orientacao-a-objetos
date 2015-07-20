<?php
// inclui as classes necessárias
include_once 'app.widgets/TElement.class.php';
include_once 'app.widgets/TImage.class.php';
include_once 'app.widgets/TTable.class.php';
include_once 'app.widgets/TTableRow.class.php';
include_once 'app.widgets/TTableCell.class.php';
include_once 'app.widgets/TParagraph.class.php';

// instancia objeto tabela com borda de 1 pixel
$tabela = new TTable;
$tabela->border = 1;

// acrescenta uma linha na tabela
$linha1 = $tabela->addRow();

// cria um objeto parágrafo
$paragrafo= new TParagraph('Este é o logo do GNOME');
$paragrafo->setAlign('left');

// adiciona célula contendo o objeto
$linha1->addCell($paragrafo);

// cria um objeto imagem
$imagem= new Timage('app.images/gnome.png');
$linha1->addCell($imagem);

// acrescenta uma linha na tabela
$linha2 = $tabela->addRow();

// cria um objeto parágrafo
$paragrafo= new TParagraph('Este é o logo do GIMP');
$paragrafo->setAlign('left');

// adiciona célula contendo o objeto
$linha2->addCell($paragrafo);

// cria um objeto imagem
$imagem= new Timage('app.images/gimp.png');

// adiciona célula contendo o objeto
$linha2->addCell($imagem);

// acrescenta uma linha na tabela
$linha3 = $tabela->addRow();

// acrescenta um célula que ocupará o espaço de duas
$celula = $linha3->addCell(new TParagraph('texto em duas colunas'));
$celula->colspan = 2;

// exibe a tabela
$tabela->show();
?>