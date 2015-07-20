<?php
try
{
    // instancia objeto PDO, conectando no Postgresql
    $conn = new PDO('pgsql:dbname=livro;user=postgres;password=;host=localhost');
    
    // executa uma instrução SQL de consulta
    $result = $conn->query("SELECT codigo, nome FROM famosos");
    if ($result)
    {
        // percorre os resultados via iteração
        foreach($result as $row)
        {
            // exibe os resultados
            echo	 $row['codigo'] . ' - ' .
                     $row['nome'] . "<br>\n";
        }
    }
    // fecha a conexão
    $conn = null;
}
catch (PDOException $e)
{
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}
?>