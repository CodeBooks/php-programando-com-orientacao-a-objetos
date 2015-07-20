<?php
/**
 * classe TTable
 * responsсvel pela exibiчуo de tabelas
 */
class TTable extends TElement
{
    /**
     * mщtodo construtor
     * instancia uma nova tabela
     */
    public function __construct()
    {
        parent::__construct('table');
    }
    
    /**
     * mщtodo addRow
     * agrega um novo objeto linha (TTableRow) na tabela
     */
    public function addRow()
    {
        // instancia objeto linha
        $row = new TTableRow;
        
        // armazena no array de linhas
        parent::add($row);
        return $row;
    }
}
?>