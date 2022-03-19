<?php

use src\doctrine\Entity\Produtos;
use src\doctrine\infra\EntityManegeFactory;

$entityManeger = (new EntityManegeFactory())
    ->getEntityManege();
$this->repositorioDeProdutos = $entityManeger
    ->getRepository(Produtos::class);

$tabela = Produtos::class;

// filter para limpar e apontar para a variavel sem lixo
$nome = filter_input(
    INPUT_GET,
    'pesquisa',
    FILTER_SANITIZE_STRING
);

$produtoslist = $this->repositorioDeProdutos->findAll();



$dql = "SELECT * FROM $tabela WHERE 
                          'nome', 
                          'titulo_produto', 
                           'descricao', 
                           'categoria', 
                           'subcategoria', 
                           'marcas'
                           OR nome LIKE '%$nome%' 
                           OR titulo_produto LIKE '%$nome%'
                           OR descricao LIKE '%$nome%'
                           OR categoria LIKE '%$nome%'
                           OR subcategoria LIKE '%$nome%'
                           OR marcas LIKE '%$nome%'
                           ";

$busca = $entityManeger->createQuery($dql);



$caminho = 'arquivos/';
/*
    if ($busca == 'undefined' || $busca == '') {
        $busca = $this->repositorioDeProdutos->findAll();
    } elseif($busca) {
        $produtoslist = $this->repositorioDeProdutos->findBy([
            'nome' => $busca,
        ]);
    }
*/
   // var_dump($nome); exit();
foreach ($busca as $produto): $img = $caminho . $produto->getNome();

    if ($produto->getDesconto() >= 5) {
        $mostrar_desconto = $produto->getDesconto();
        $mostrar = "block";
    } else {
        $mostrar_desconto = '';
        $mostrar = 'none';
    }

    //  $preco_desc =  $produto->getPreco() * ($produto->getDesconto()  / 100);

    ?>

    <div class="card">
        <div class="over-desconto">
            <span class="span-desconto" style="display: <?= $mostrar ?>">
                <div class="div-desc"> <?= $mostrar_desconto ?>%</div>
                <div class="div-desc"> de <br>desconto</div>
            </span>
            <div class="imagem">
                <img class="imagem-produto" src="<?= $img ?>" alt="foto">
            </div>
        </div>

        <h2 class="titulo-produto"><?= $produto->getTituloProduto() ?>
        </h2>
        <div class="preco">Preço $
            <div class="valor"><br></div>
            <div class="valor"><?= $produto->getPreco() ?></div>
        </div>

        <a class="link-compra" href="/loja-compra?id=<?= $produto->getId() ?>">
            <button class="button-produto">
                Comprar
            </button>
        </a>
        <p class="codigo">Codigo: <?= $produto->getId() ?></p>
    </div>

<?php endforeach; ?>
