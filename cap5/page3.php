<?php
function __autoload($classe)
{
    if (file_exists("app.widgets/{$classe}.class.php"))
    {
        include_once "app.widgets/{$classe}.class.php";
    }
}

/**
 * método onProdutos()
 * executado quando o usuário clicar no link "Produtos"
 * @param $get = variável $_GET
 */
function onProdutos($get)
{
    echo "Nesta seção você vai conhecer os produtos da nossa empresa
    Temos desde pintos, frangos, porcos, bois, vacas e todo tipo de animal
    que você pode imaginar na nossa fazenda.";
}

/**
 * método onContato()
 * executado quando o usuário clicar no link "Contato"
 * @param $get = variável $_GET
 */
function onContato($get)
{
    echo "Para entrar em contato com nossa empresa,
    ligue para 0800-1234-5678 ou mande uma carta endereçada para
    Linha alto coqueiro baixo, fazenda recanto escondido.";
}

/**
 * método onEmpresa()
 * executado quando o usuário clicar no link "Empresa"
 * @param $get = variável $_GET
 */
function onEmpresa($get)
{
    echo "Aqui na fazenda recanto escondido fazemos eco-turismo,
    você vai poder conhecer nossas instalações,
    tirar leite diretamente da vaca, recolher os ovos do galinheiro e o mais
    importante, vai poder limpar as instalações dos suínos, o que é o auge
    do passeio. Não deixe de conhecer nossa fazenda, temos lindas cabanas
    equipadas com cama de casal, fogão a lenha e banheiro.";
}

// exibe alguns links
echo "<a href='?method=onProdutos'>Produtos</a><br>";
echo "<a href='?method=onContato'>Contato</a><br>";
echo "<a href='?method=onEmpresa'>Empresa</a><br>";

// interpreta a página
$pagina = new TPage;
$pagina->show();
?>