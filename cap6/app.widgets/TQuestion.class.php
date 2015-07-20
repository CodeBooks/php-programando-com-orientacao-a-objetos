<?php
/**
 * classe TQuestion
 * Exibe perguntas ao usuсrio
 */
class TQuestion
{
    /**
     * mщtodo construtor
     * instancia objeto TQuestion
     * @param $message = pergunta ao usuсrio
     * @param $action_yes = aчуo para resposta positiva
     * @param $action_no = aчуo para resposta negativa
     */
    function __construct($message, TAction $action_yes, TAction $action_no)
    {
        $style = new TStyle('tquestion');
        $style->position     = 'absolute';
        $style->left         = '30%';
        $style->top          = '30%';
        $style->width        = '300';
        $style->height       = '150';
        $style->border_width = '1px';
        $style->color         = 'black';
        $style->background    = '#DDDDDD';
        $style->border        = '4px solid #000000';
        $style->z_index       = '10000000000000000';
        
        // converte os nomes de mщtodos em URL's
        $url_yes = $action_yes->serialize();
        $url_no = $action_no->serialize();
        
        // exibe o estilo na tela
        $style->show();
        
        // instancia o painel para exibir o diсlogo
        $painel = new TElement('div');
        $painel->class = "tquestion";
        
        // cria um botуo para a resposta positiva
        $button1 = new TElement('input');
        $button1->type = 'button';
        $button1->value = 'Sim';
        $button1->onclick="javascript:location='$url_yes'";
        
        // cria um botуo para a resposta negativa
        $button2 = new TElement('input');
        $button2->type = 'button';
        $button2->value = 'Nуo';
        $button2->onclick="javascript:location='$url_no'";
        
        // cria uma tabela para organizar o layout
        $table = new TTable;
        $table->align = 'center';
        $table->cellspacing = 10;
        
        // cria uma linha para o эcone e a mensagem
        $row=$table->addRow();
        $row->addCell(new TImage('app.images/question.png'));
        $row->addCell($message);
        
        // cria uma linha para os botѕes
        $row=$table->addRow();
        $row->addCell($button1);
        $row->addCell($button2);
        
        // adiciona a tabela ao painщl
        $painel->add($table);
        
        // exibe o painщl
        $painel->show();
    }
}
?>