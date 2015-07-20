<?php
/*
 * função __autoload()
 * carrega as classes necessárias sob demanda
 */
function __autoload($class)
{
    include_once("app.widgets/{$class}.class.php");
}

// instancia um objeto TWindow nas coordenadas 20,20 contendo um texto
$janela1 = new TWindow('janela1');
$janela1->setPosition(20,20);
$janela1->setSize(200,200);
$janela1->add(new TParagraph('conteúdo da janela 1'));
$janela1->show();

// instancia um objeto TWindow nas coordenadas 300,20 contendo uma imagem
$janela2 = new TWindow('janela2');
$janela2->setPosition(300,20);
$janela2->setSize(200,200);
$janela2->add(new TImage('app.images/gimp.png'));
$janela2->show();

// instancia um objeto painel
// coloca dentro do painel um texto e uma imagem
$painel = new TPanel(210,130);
$painel->put(new TParagraph('<b>texto1</b>'), 20,20);
$painel->put(new TImage('app.images/gnome.png'), 80, 20);

// instancia um objeto TWindow nas coordenadas 140,120 contendo um painel
$janela3 = new TWindow('janela3');
$janela3->setPosition(140,120);
$janela3->setSize(220,160);
$janela3->add($painel);
$janela3->show();
?>