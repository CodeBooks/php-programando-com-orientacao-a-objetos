<?php
// abre conexão com o MySQL
$conn = mysql_connect('localhost', 'root', 'mysql');

// seleciona o banco de dados ativo
mysql_select_db('livro', $conn);

// define a consulta que será realizada
$query = 'SELECT codigo, nome FROM famosos';

// envia consulta ao banco de dados
$result = mysql_query($query, $conn);
if ($result)
{
    // percorre resultados da pesquisa
    while ($row = mysql_fetch_assoc($result))
    {
        echo $row['codigo'] . ' - ' . $row['nome'] . "<br>\n";
    }
}
// fecha a conexão
mysql_close($conn);
?>