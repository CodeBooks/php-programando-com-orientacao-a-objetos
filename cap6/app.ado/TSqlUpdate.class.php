<?php
/*
 * classe TSqlUpdate
 * Esta classe provъ meios para manipulaчуo de uma instruчуo de UPDATE no banco de dados
 */
final class TSqlUpdate extends TSqlInstruction
{
    private $columnValues;
    
    /*
     * mщtodo setRowData()
     * Atribui valores р determinadas colunas no banco de dados que serуo modificadas
     * @param $column = coluna da tabela
     * @param $value = valor a ser armazenado
     */
    public function setRowData($column, $value)
    {
        // verifica se щ um dado escalar (string, inteiro,...)
        if (is_scalar($value))
        {
            if (is_string($value) and (!empty($value)))
            {
                // adiciona \ em aspas
                $value = addslashes($value);
                // caso seja uma string
                $this->columnValues[$column] = "'$value'";
            }
            else if (is_bool($value))
            {
                // caso seja um boolean
                $this->columnValues[$column] = $value ? 'TRUE': 'FALSE';
            }
            else if ($value!=='')
            {
                // caso seja outro tipo de dado
                $this->columnValues[$column] = $value;
            }
            else
            {
                // caso seja NULL
                $this->columnValues[$column] = "NULL";
            }
        }
    }
    
    /*
     * mщtodo getInstruction()
     * retorna a instruчуo de UPDATE em forma de string.
     */
    public function getInstruction()
    {
        // monsta a string de UPDATE
        $this->sql = "UPDATE {$this->entity}";
        // monta os pares: coluna=valor,...
        if ($this->columnValues)
        {
            foreach ($this->columnValues as $column => $value)
            {
                $set[] = "{$column} = {$value}";
            }
        }
        $this->sql .= ' SET ' . implode(', ', $set);
        // retorna a clсusula WHERE do objeto $this->criteria
        if ($this->criteria)
        {
            $this->sql .= ' WHERE ' . $this->criteria->dump();
        }
        return $this->sql;
    }
}
?>