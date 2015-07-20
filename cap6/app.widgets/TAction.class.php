<?php
/**
 * classe TAction
 * encapsula uma aчуo
 */
class TAction
{
    private $action;
    private $param;
    
    /**
     * mщtodo __construct()
     * instancia uma nova aчуo
     * @param $action = mщtodo a ser executado
     */
    public function __construct($action)
    {
        $this->action = $action;
    }
    
    /**
     * mщtodo setParameter()
     * acrescenta um parтmetro ao mщtodo a ser executdao
     * @param $param = nome do parтmetro
     * @param $value = valor do parтmetro
     */
    public function setParameter($param, $value)
    {
        $this->param[$param] = $value;
    }
    
    /**
     * mщtodo serialize()
     * transforma a aчуo em uma string do tipo URL
     */
    public function serialize()
    {
        // verifica se a aчуo щ um mщtodo
        if (is_array($this->action))
        {
            // obtщm o nome da classe
            $url['class'] = get_class($this->action[0]);
            // obtщm o nome do mщtodo
            $url['method'] = $this->action[1];
        }
        else if (is_string($this->action)) // щ uma string
        {
            // obtщm o nome da funчуo
            $url['method'] = $this->action;
        }
        // verifica se hс parтmetros
        if ($this->param)
        {
            $url = array_merge($url, $this->param);
        }
        // monta a URL
        return '?' . http_build_query($url);
    }
}
?>