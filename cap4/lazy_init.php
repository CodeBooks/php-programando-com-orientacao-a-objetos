<?php
/*
 * classe Pessoa
 */
class Pessoa
{
    private $nome;        // nome da pessoa
    private $cidadeID; // ID da cidade
    
    /*
     * método construtor
     * instancia o objeto, define alguns atributos
     * @param $nome       = nome da pessoa
     * @param $cidadeID = código da cidade
     */
    function __construct($nome, $cidadeID)
    {
        $this->nome     = $nome;
        $this->cidadeID = $cidadeID;
    }
    
    /*
     * método __get
     * intercepta a obtenção de propriedades
     * @param $propriedade = nome da propriedade
     */
    function __get($propriedade)
    {
        if ($propriedade == 'cidade');
        {
            return new Cidade($this->cidadeID);
        }
    }
}

/*
 * classe Cidade
 */
class Cidade
{
    private $id;
    private $nome; // nome da cidade
    
    /*
     * método construtor
     * instancia o objeto
     * @param $id = ID da cidade
     */
    function __construct($id)
    {
        $data[1] = 'Porto Alegre';
        $data[2] = 'São Paulo';
        $data[3] = 'Rio de Janeiro';
        $data[4] = 'Belo Horizonte';
        
        // atribui o id
        $this->id = $id;
        
        // define seu nome
        $this->setNome($data[$id]);
    }
    
    /*
     * método setNome
     * define o nome da cidade
     * @param $nome = nome da cidade
     */
    function setNome($nome)
    {
        $this->nome = $nome;
    }
    
    /*
     * método getNome
     * retorna o nome da cidade
     */
    function getNome()
    {
        return $this->nome;
    }
}

// instancia dois objetos Pessoa
$maria = new Pessoa('Maria da Silva', 1);
$pedro = new Pessoa('Perdo Cardoso', 2);

// exibe o nome da cidade de cada Pessoa
echo $maria->cidade->getNome() . "<br>\n";
echo $pedro->cidade->getNome() . "<br>\n";

// exibe o atributo cidade
print_r($maria->cidade);
?>