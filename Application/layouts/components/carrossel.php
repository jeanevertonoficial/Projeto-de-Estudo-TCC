<?php

use src\doctrine\Entity\ProdutoBanner;
use src\doctrine\infra\EntityManegeFactory;

$entityManeger = (new EntityManegeFactory())
    ->getEntityManege();
$this->repositorioDeProdutos = $entityManeger
    ->getRepository(ProdutoBanner::class);

$produtoslist = $this->repositorioDeProdutos->findAll();

$caminho = '../img/banner/';

$banner = ProdutoBanner::class;

// buscar total de banner cadastrado
$dql = "SELECT COUNT(a) FROM $banner a";
$dql = $entityManeger->createQuery($dql);
$totalDeBanner = $dql->getSingleScalarResult();
?>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
        $qnt_slide = $totalDeBanner;
        $cont_marc = 0;
        while ($cont_marc < $qnt_slide) {
            echo "<button 
                    type='button' 
                    data-bs-target='#carouselExampleIndicators' 
                    data-bs-slide-to='$cont_marc' class='ative'
                    aria-current='true'>
                </button>";
            $cont_marc++;
        }
        ?>
    </div>
    <div class="carousel-inner">
        <?php
        $cont_slide = 0;
        foreach ($produtoslist as $produto): $img = $caminho . $produto->getNome();

            $active = "";

            if ($cont_slide == 0) {
                $active = "active";
            }
            ?>
            <div class="carousel-item <?= $active ?>">
                <img src="<?= $img ?>" class="d-block w-100" alt="<?= $produto->getNome() ?>">
            </div>
        <?php
        $cont_slide++;
        endforeach;
        ?>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true">
            </span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<style>

    .carousel-inner {
        height: 350px !important;
    }

    .carousel-item {
        position: relative;
    }

    .carousel-control-prev {
        justify-content: start !important;
        opacity: 0 !important;
    }

    .carousel-control-next {
        justify-content: end !important;
        opacity: 0 !important;
    }

    .carousel-control-prev:hover, .carousel-control-next:hover {
        opacity: 1 !important;
    }

    .carousel-control-prev-icon, .carousel-control-next-icon {
        padding: 35px 15px;
        color: #444444;
        box-shadow: 5px 10px 25px rgba(19, 19, 19, 0.36);
    }

</style>