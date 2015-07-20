<?php
/**
 * classe TTableRow
 * reponsсvel pela exibiчуo de uma linha de uma tabela
 */
class TTableRow extends TElement
{
    /**
     * mщtodo construtor
     * instancia uma nova linha
     */
    public function __construct()
    {
        parent::__construct('tr');
    }
    
    /**
     * mщtodo addCell
     * agrega um novo objeto cщlula (TTableCell) р linha
     * @param $value = conteњdo da cщlula
     */
    public function addCell($value)
    {
        // instancia objeto cщlula
        $cell = new TTableCell($value);
        parent::add($cell);
        
        // retorna o objeto instanciado
        return $cell;
    }
}
?>