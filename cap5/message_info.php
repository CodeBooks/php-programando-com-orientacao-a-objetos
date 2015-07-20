<?php
function __autoload($classe)
{
    if (file_exists("app.widgets/{$classe}.class.php"))
    {
        include_once "app.widgets/{$classe}.class.php";
    }
}

// exibe uma mensagem de informaзгo
new TMessage('info', 'Esta aзгo й inofensiva, isto й sу um lembrete');
?>