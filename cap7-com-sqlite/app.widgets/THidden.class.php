<?php
/**
 * classe THidden
 * classe para construção de campos escondidos
 */
class THidden extends TField
{
    /**
     * método show()
     * exibe o widget na tela
     */
    public function show()
    {
        // atribui as propriedades da TAG
        $this->tag->name = $this->name;     // nome da TAG
        $this->tag->value = $this->value;   // valor da TAG
        $this->tag->type = 'hidden';        // tipo de input
        $this->tag->style = "width:{$this->size}"; // tamanho em pixels
        
        // exibe a tag
        $this->tag->show();
    }
}
?>