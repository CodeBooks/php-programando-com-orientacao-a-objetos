<?php
// inclui as classes necessсrias
include_once 'app.widgets/TStyle.class.php';
include_once 'app.widgets/TElement.class.php';
include_once 'app.widgets/TPanel.class.php';
include_once 'app.widgets/TImage.class.php';
include_once 'app.widgets/TParagraph.class.php';

// instancia novo painel
$painel = new TPanel(400,300);

// coloca objeto parсgrafo na posiчуo 10,10
$texto = new TParagraph('isso щ um teste, x:10,y:10');
$painel->put($texto, 10,10);

// coloca objeto parсgrafo na posiчуo 200,200
$texto = new TParagraph('outro teste, x:200,y:200');
$painel->put($texto, 200,200);

// coloca objeto imagem na posiчуo 10,180
$texto = new TImage('app.images/gnome.png');
$painel->put($texto, 10,180);

// coloca objeto imagem na posiчуo 240,10
$texto = new TImage('app.images/gimp.png');
$painel->put($texto, 240,10);
$painel->show();
?>