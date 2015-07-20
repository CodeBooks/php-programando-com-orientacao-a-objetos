<?php
// inclui as classes necessárias
include_once 'app.widgets/TElement.class.php';
include_once 'app.widgets/TImage.class.php';

// instancia objeto imagem
$gnome = new TImage('app.images/gnome.png');

// exibe objeto imagem
$gnome->show();

// instancia objeto imagem
$gimp= new TImage('app.images/gimp.png');

// exibe objeto imagem
$gimp->show();
?>