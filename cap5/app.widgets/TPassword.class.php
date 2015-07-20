<?php
/**
 * classe TPassword
 * classe para construчуo de campos de digitaчуo de senhas
 */
class TPassword extends TField
{
    /**
     * mщtodo show()
     * exibe o widget na tela
     */
    public function show()
    {
        // atribui as propriedades da TAG
        $this->tag->name = $this->name; // nome da TAG
        $this->tag->value = $this->value; // valor da TAG
        $this->tag->type = 'password';          // tipo do input
        $this->tag->style = "width:{$this->size}";		 // tamanho em pixels
        
        // se o campo nуo щ editсvel
        if (!parent::getEditable())
        {
            $this->tag->readonly = "1";
            $this->tag->class = 'tfield_disabled';		           // classe CSS
        }
        // exibe a tag
        $this->tag->show();
    }
}
?>