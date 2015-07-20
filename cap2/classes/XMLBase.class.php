<?php
class XMLBase
{
    function toXml()
    {
        $retorno = '<' . get_class($this) . '>' . "\n";
        $propriedades = get_object_vars($this);
        foreach ($propriedades as $propriedade => $valor)
        {
            $retorno .= "\t<$propriedade> $valor </$propriedade>\n";
        }
        $retorno .= '</' . get_class($this) . '>' . "\n";
        return $retorno;
    }
}
?>