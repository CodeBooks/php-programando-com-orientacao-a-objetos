<?php
function getNome($codigo)
{
	   // verifica a passagem do parâmetro
	   if (!$codigo)
	   {
		      throw new SoapFault('Client','Parâmetro não preenchido');
	   }
	   // conecta ao banco de dados
	   $id = @pg_connect("dbname=livro user=postgres");
	   if (!$id)
		      throw new SoapFault("Server", "Conexão não estabelecida");
	   // realiza consulta ao banco de dados
	   $result = pg_query($id, "select * from pessoa where id = '$codigo'");
	   $matriz = pg_fetch_all($result);
	   if ($matriz == null)
		      throw new SoapFault("Server", "Cliente não encontrado");
	   // retorna os dados
	   return $matriz[0];
}
// instancia servidor SOAP
$server = new SoapServer("exemplo.wsdl", array('encoding'=>'ISO-8859-1'));
$server->addFunction("getNome");
$server->handle();
?>

