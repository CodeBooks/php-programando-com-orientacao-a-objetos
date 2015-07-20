<?php
// instancia cliente SOAP
$client = new SoapClient("exemplo.wsdl", array('encoding'=>'ISO-8859-1'));
try
{
	   // realiza chamada remota de método
	   $retorno = $client->getNome(1);

	   // imprime os dados de retorno
	   echo '<table border=1 width=300>';
	   echo '<tr bgcolor="#c0c0c0"><td>Coluna </td> <td> Conteúdo </td></tr>';
	   echo '<tr><td>Código   </td> <td>' . $retorno['id']       . '</td></tr>';
	   echo '<tr><td>Nome     </td> <td>' . $retorno['nome']     . '</td></tr>';
	   echo '<tr><td>Endereço </td> <td>' . $retorno['endereco'] . '</td></tr>';
	   echo '<tr><td>Data Nas.</td> <td>' . $retorno['datanasc'] . '</td></tr>';
	   echo '</table>';
}
catch (SoapFault $excecao)	   // ocorrência de erro
{
	   echo "Erro: ";
	   echo "<b> {$excecao->faultstring} </b>";
}
?>

