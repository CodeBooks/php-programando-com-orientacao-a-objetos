<?php
# interface Aluno
interface IAluno
{
    function getNome();
    function setNome($nome);
    function setResponsavel(Pessoa $responsavel);
}
# Classe Aluno
class Aluno implements IAluno
{
    private $nome;
    
    # atribui o nome do aluno
    function setNome($nome)
    {
        $this->nome = $nome;
    }
    
    # retorna o nome do aluno
    function getNome()
    {
        return $this->nome;
    }
}

# instancia novo Aluno
$joaninha = new Aluno;

# chama métodos quaisquer
$joaninha->setNome('Joana Maranhao');
echo $joaninha->getNome();
?>