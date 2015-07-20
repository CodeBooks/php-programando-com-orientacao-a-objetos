<?php
// constrói matriz com os dados
$dados[] = array(1, 'Maria do Rosário', 'http://www.maria.com.br',  1200);
$dados[] = array(2, 'Pedro Cardoso',    'http://www.pedro.com.br',   800);
$dados[] = array(3, 'João de Barro',    'http://www.joao.com.br',   1500);
$dados[] = array(3, 'Joana Pereira',    'http://www.joana.com.br',   700);
$dados[] = array(3, 'Erasmo Carlos',    'http://www.erasmo.com.br', 2500);

// abre tabela
echo '<table border=1 width=600>';

// exibe linha com o cabeçalho
echo '<tr bgcolor="#a0a0a0">';
echo '<td> Código   </td>';
echo '<td> Nome     </td>';
echo '<td> Site     </td>';
echo '<td> Salário </td>';
echo '</tr>';

$i = 0;
$total = 0;

// percorre os dados
foreach ($dados as $pessoa)
{
    // verifica qual cor utilizar para o fundo
    $bgcolor = ($i % 2) == 0 ? '#d0d0d0' : '#ffffff';
    
    // imprime a linha
    echo "<tr bgcolor='$bgcolor'>";
    
    // exibe o código
    echo "<td>{$pessoa[0]}</td>";
    
    // exibe o nome
    echo "<td>{$pessoa[1]}</td>";
    
    // exibe o site
    echo "<td>{$pessoa[2]}</td>";
    
    // exibe o salário
    echo "<td align='right'>{$pessoa[3]}</td>";
    echo '</tr>';
    $total += $pessoa[3]; // soma o salário
    $i++;
}

// exibe células vazias mescladas
echo '<tr>';
echo '<td colspan=3>Total</td>';

// exibe linha com totalizador
echo '<td align="right" bgcolor="#a0a0a0">';
echo $total;
echo '</td>';
echo '</tr>';

// finaliza a tabela
echo '</table>';
?>