<?php
/*
 * classe ProdutoGateway
 * implementa Table Data Gateway com Data Transfer Object
 */
class ProdutoGateway
{
    /*
     * mйtodo insert
     * insere dados na tabela de Produtos
     * @param $object = objeto a ser inserido
     */
    function insert(Produto $object)
    {
        // cria instruзгo SQL de insert
        $sql = "INSERT INTO Produtos (id, descricao, estoque, preco_custo)" .
               " VALUES ('$object->id', '$object->descricao', ".
               "'$object->estoque', '$object->preco_custo')";
               
        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        // executa instruзгo SQL
        $conn->exec($sql);
        unset($conn);
    }
    
    /*
     * mйtodo update
     * altera os dados na tabela de Produtos
     * @param $object = objeto a ser alterado
     */
    function update(Produto $object)
    {
        // cria instruзгo SQL de UPDATE
        $sql = "UPDATE produtos set ".
               "   descricao    = '$object->descricao', " .
               "   estoque      = '$object->estoque', ".
               "   preco_custo = '$object->preco_custo' ".
               "   WHERE id     = '$object->id'";
        
        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        // executa instruзгo SQL
        $conn->exec($sql);
        unset($conn);
    }
    
    /*
     * mйtodo getObject
     * busca um registro da tabela de produtos
     * @param $id = ID do produto
     */
    function getObject($id)
    {
        // cria instruзгo SQL de SELECT
        $sql = "SELECT * FROM produtos where id='$id'";
        
        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        // executa consulta SQL
        $result = $conn->query($sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        unset($conn);
        return $data;
    }
}
class Produto
{
    public $id;
    public $descricao;
    public $estoque;
    public $preco_custo;
}

// instancia objeto ProdutoGateway
$gateway = new ProdutoGateway;
$vinho = new Produto;
$vinho->id           = 4;
$vinho->descricao    = 'Vinho';
$vinho->estoque      = 10;
$vinho->preco_custo  = 15;

// insere o objeto no banco de dados
$gateway->insert($vinho);

// exibe o objeto de cуdigo 4
print_r($gateway->getObject(4));
$vinho->descricao = 'Vinho Cabernet';

// atualiza o objeto no banco de dados
$gateway->update($vinho);

// exibe o objeto de cуdigo 4
print_r($gateway->getObject(4));
?>