<?php
class Contato
{
    public $Nome;
    public $Telefone;
    public $Email;
    
    # grava informações de contato
    function SetContato($Nome, $Telefone, $Email)
    {
        $this->Nome = $Nome;
        $this->Telefone = $Telefone;
        $this->Email = $Email;
    }
    
    # obtém informações de contato
    function GetContato()
    {
        return "Nome: {$this->Nome}, Telefone: {$this->Telefone}, Email: {$this->Email}";
    }
}
?>