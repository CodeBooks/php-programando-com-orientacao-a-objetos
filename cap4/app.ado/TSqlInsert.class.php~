<?php
/*
 * classe TSqlInsert
 * Esta classe provъ meios para manipulaчуo de uma instruчуo de INSERT no banco de dados
 */
final class TSqlInsert extends TSqlInstruction
{
    private $columnValues;
    
    /*
     * mщtodo setRowData()
     * Atribui valores р determinadas colunas no banco de dados que serуo inseridas
     * @param $column = coluna da tabela
     * @param $value = valor a ser armazenado
     */
    public function setRowData($column, $value)
    {
        // verifica se щ um dado escalar (string, inteiro, ...)
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
     * mщtodo setCriteria()
     * nуo existe no contexto desta classe, logo, irс lanчar um erro ser for executado
     */
    public function setCriteria($criteria)
    {
        // lanчa o erro
        throw new Exception("Cannot call setCriteria from " . __CLASS__);
    }
    
    /*
     * mщtodo getInstruction()
     * retorna a instruчуo de INSERT em forma de string.
     */
    public function getInstruction()
    {
        $this->sql = "INSERT INTO {$this->entity} (";
        // monta uma string contendo os nomes de colunas
        $columns = implode(', ', array_keys($this->columnValues));
        // monta uma string contendo os valores
        $values = implode(', ', array_values($this->columnValues));
        $this->sql .= $columns . ')';
        $this->sql .= " values ({$values})";
        return $this->sql;
    }
}
?>