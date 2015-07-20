<?php
class Aplicacao
{
    /* método Estático
     * lê o arquivo readme.txt
     */
    static function Sobre()
    {
        $fd = fopen('readme.txt', 'r');
        while ($linha = fgets($fd, 200))
        {
            echo $linha . '<br>';
        }
    }
}
echo "Informações sobre a aplicação:<br>\n";
echo "=============================:<br>\n";
Aplicacao::Sobre();
?>