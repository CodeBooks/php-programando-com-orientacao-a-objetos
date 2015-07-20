<?php
/*
 * classe TSqlSelect
 * Esta classe provъ meios para manipulaчуo de uma instruчуo de SELECT no banco de dados
 */
final class TSqlSelect extends TSqlInstruction
{
    private $columns;		   // array de colunas a serem retornadas.
    
    /*
     * mщtodo addColumn
     * adiciona uma coluna a ser retornada pelo SELECT
     * @param $column = coluna da tabela
     */
    public function addColumn($column)
    {
        // adiciona a coluna no array
        $this->columns[] = $column;
    }
    
    /*
     * mщtodo getInstruction()
     * retorna a instruчуo de SELECT em forma de string.
     */
    public function getInstruction()
    {
        // monta a instruчуo de SELECT
        $this->sql = 'SELECT ';
        
        // monta string com os nomes de colunas
        $this->sql .= implode(',', $this->columns);
        
        // adiciona na clсusula FROM o nome da tabela
        $this->sql .= ' FROM ' . $this->entity;
        
        // obtщm a clсusula WHERE do objeto criteria.
        if ($this->criteria)
        {
            $expression = $this->criteria->dump();
            if ($expression)
            {
                $this->sql .= ' WHERE ' . $expression;
            }
            
            // obtщm as propriedades do critщrio
            $order = $this->criteria->getProperty('order');
            $limit = $this->criteria->getProperty('limit');
            $offset= $this->criteria->getProperty('offset');
            
            // obtщm a ordenaчуo do SELECT
            if ($order)
            {
                $this->sql .= ' ORDER BY ' . $order;
            }
            if ($limit)
            {
                $this->sql .= ' LIMIT ' . $limit;
            }
            if ($offset)
            {
                $this->sql .= ' OFFSET ' . $offset;
            }
        }
        return $this->sql;
    }
}
?>