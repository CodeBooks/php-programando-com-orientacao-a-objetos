<?php
/**
 * classe TImage
 * classe para exibiчуo de imagens
 */
class TImage extends TElement
{
    private $source; // localizaчуo da imagem
    
    /**
     * mщtodo construtor
     * instancia objeto TImage
     * @param $source = localizaчуo da imagem
     */
    public function __construct($source)
    {
        parent::__construct('img');
        
        // atribui a localizaчуo da imagem
        $this->src = $source;
        $this->border = 0;
    }
}
?>