<?php
/* classe TButton
 * responsбvel por exibir um botгo
 */
class TButton extends TField
{
    private $action;
    private $label;
    private $formName;
    
    /**
     * mйtodo setAction
     * define a aзгo do botгo (funзгo a ser executada)
     * @param $action = aзгo do botгo
     * @param $label    = rуtulo do botгo
     */
    public function setAction($action, $label)
    {
        $this->action = $action;
        $this->label = $label;
    }
    
    /**
     * mйtodo setFormName
     * define o nome do formulбrio para a aзгo botгo
     * @param $name = nome do formulбrio
     */
    public function setFormName($name)
    {
        $this->formName = $name;
        
    }
    
    /**
    * mйtodo show()
    * exibe o botгo
    */
    public function show()
    {
        $url = $this->action->serialize();
        // define as propriedades do botгo
        $this->tag->name    = $this->name;    // nome da TAG
        $this->tag->type    = 'button';       // tipo de input
        $this->tag->value   = $this->label;   // rуtulo do botгo
        // se o campo nгo й editбvel
        if (!parent::getEditable())
        {
            $this->tag->disabled = "1";
            $this->tag->class = 'tfield_disabled'; // classe CSS
        }
        // define a aзгo do botгo
        $this->tag->onclick =	"document.{$this->formName}.action='{$url}'; ".
                                "document.{$this->formName}.submit()";
        // exibe o botгo
        $this->tag->show();
    }
}
?>