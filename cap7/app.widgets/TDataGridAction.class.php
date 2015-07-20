<?php
/**
 * class TDataGridAction
 * representa uma aзгo de uma listagem
 */
class TDataGridAction extends TAction
{
    private $image;
    private $label;
    private $field;
    
    /**
     * mйtodo setImage()
     * atribui uma imagem а aзгo
     * @param $image = local do arquivo de imagem
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
    
    /**
     * mйtodo getImage()
     * retorna a imagem da aзгo
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * mйtodo setLabel()
     * define o rуtulo de texto da aзгo
     * @param $label = rуtulo de texto da aзгo
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }
    
    /**
     * mйtodo getLabel()
     * retorna o rуtulo de texto da aзгo
     */
    public function getLabel()
    {
        return $this->label;
    }
    
    /**
     * mйtodo setField()
     * define o nome do campo do banco de dados que serб passado juntamente com a aзгo
     * @param $field = nome do campo do banco de dados
     */
    public function setField($field)
    {
        $this->field = $field;
    }
    
    /**
     * mйtodo getField()
     * retorna o nome do campo de dados definido pelo mйtodo setField()
     */
    public function getField()
    {
        return $this->field;
    }
}
?>