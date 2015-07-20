<?php
class ContaCorrente extends Conta
{
    public $TaxaTransferencia = 2.5;
    public $Limite;
    
    /* mщtodo construtor (sobrescrito)
     * agora, tambщm inicializa a variсvel $Limite
     */
    function __construct($Agencia, $Codigo, $DataDeCriacao, $Titular, $Senha, $Saldo, $Limite)
    {
        // chamada do mщtodo construtor da classe-pai.
        parent::__construct($Agencia, $Codigo, $DataDeCriacao, $Titular, $Senha, $Saldo);
        $this->Limite = $Limite;
    }
    
    /* mщtodo Retirar (sobrescrito)
     * verifica se a $quantia retirada estс dentro do limite.
     */
    function Retirar($quantia)
    {
        // imposto sobre movimentaчуo financeira
        $cpmf = 0.05;
        if ( ($this->Saldo + $this->Limite) >= $quantia )
        {
            // Executa mщtodo da classe-pai.
            parent::Retirar($quantia);
            // Debita o Imposto
            parent::Retirar($quantia * $cpmf);
        }
        else
        {
            echo "Retirada nуo permitida...\n";
            return false;
        }
        // retirada permitida
        return true;
    }
    
    final function Transferir($Conta, $Valor)
    {
        if ($this->Retirar($Valor))
        {
            $Conta->Depositar($Valor);
        }
        if ($this->Titular != $Conta->Titular)
        {
            $this->Retirar($this->TaxaTransferencia);
        }
    }
}
?>