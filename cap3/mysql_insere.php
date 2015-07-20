<?php
// abre conexão com o MySQL
$conn = mysql_connect('localhost', 'root', 'mysql');

// seleciona o banco de dados ativo
mysql_select_db('livro', $conn);

// insere vários registros
mysql_query("INSERT INTO famosos (codigo, nome) VALUES (1, 'Érico Veríssimo')", $conn);
mysql_query("INSERT INTO famosos (codigo, nome) VALUES (2, 'John Lennon')",     $conn);
mysql_query("INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Gandhi')",  $conn);
mysql_query("INSERT INTO famosos (codigo, nome) VALUES (4, 'Ayrton Senna')",    $conn);
mysql_query("INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chaplin')", $conn);
mysql_query("INSERT INTO famosos (codigo, nome) VALUES (6, 'Anita Garibaldi')", $conn);
mysql_query("INSERT INTO famosos (codigo, nome) VALUES (7, 'Mário Quintana')",  $conn);

// fecha a conexão
mysql_close($conn);
?>