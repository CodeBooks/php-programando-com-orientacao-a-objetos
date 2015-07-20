<?php
// abre conexão com Postgres
$conn = pg_connect("host=localhost port=5432 dbname=livro user=postgres password=");

// define consulta que será realizada
$query = 'SELECT codigo, nome FROM famosos';

// envia consulta ao banco de dados
$result = pg_query($conn, $query);
if ($result)
{
    // percorre resultados da pesquisa
    while ($row = pg_fetch_assoc($result))
    {
        echo $row['codigo'] . ' - ' . $row['nome'] . "<br>\n";
    }
}
// fecha a conexão
pg_close($conn);
?>