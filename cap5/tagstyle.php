<?php
// inclui as classes
include_once 'app.widgets/TElement.class.php';
include_once 'app.widgets/TStyle.class.php';

// cria um estilo
$style = new TStyle('estilo_texto');
$style->color       = '#FF0000';
$style->font_family = 'Verdana';
$style->font_size   = '20pt';
$style->font_weight= 'bold';
$style->show();

// instancia um parágrafo
$texto= new TElement('p');
$texto->align = 'center';
$texto->add('Sport Club Internacional');

// define o estilo do parágrafo
$texto->class = 'estilo_texto';
$texto->show();
?>