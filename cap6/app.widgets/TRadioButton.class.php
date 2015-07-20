<?php
/**
 * classe TRadioButton
 * classe para construчуo de rсdio
 */
class TRadioButton extends TField
{
    /**
     * mщtodo show()
     * exibe o widget na tela
     */
    public function show()
    {
        // atribui as propriedades da TAG
        $this->tag->name = $this->name;
        $this->tag->value = $this->value;
        $this->tag->type = 'radio';
        
        // se o campo nуo щ editсvel
        if (!parent::getEditable())
        {
            // desabilita a TAG input
            $this->tag->readonly = "1";
            $this->tag->class = 'tfield_disabled';		 // classe CSS
        }
        // exibe a tag
        $this->tag->show();
    }
}
?>