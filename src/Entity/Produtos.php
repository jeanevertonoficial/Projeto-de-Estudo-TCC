<?php

namespace src\doctrine\Entity;

/**
 * @Entity
 */
class Produtos
{
    /**
     * @Id
     * @GeneratedValue
     * @column(type="integer")
     */
    private $id;
    /**
     * @column(type="string")
     */
    private $nome;
    /**
     * @column(type="string")
     */
    private $descricao;
    /**
     * @column(type="float")
     */
    private  $preco;
    /**
     * @column(type="string")
     */
    private $titulo_produto;
    /**
     * @column(type="string")
     */
    private  $imagem_produto;
    /**
     * @column(type="string")
     */
    private $categoria;
    /**
     * @column(type="string")
     */
    private $subcategoria;
    /**
     * @column(type="float")
     */
    private $desconto;
    /**
     * @column (type="string")
     */
    private $marcas;


    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;

    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }

    public function getTituloProduto(): string
    {
        return $this->titulo_produto;
    }

    public function setTituloProduto(string $titulo_produto): void
    {
        $this->titulo_produto = $titulo_produto;
    }

    public function getImagemProduto()
    {
        return $this->imagem_produto;
    }

    public function setImagemProduto($imagem_produto): void
    {
        $this->imagem_produto = $imagem_produto;
    }

    public function getCategoria(): string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): void
    {
        $this->categoria = $categoria;
    }

    public function getSubcategoria(): string
    {
        return $this->subcategoria;
    }

    public function setSubcategoria(string $subcategoria): void
    {
        $this->subcategoria = $subcategoria;
    }

    public function getDesconto(): float
    {
        return $this->desconto;
    }

    public function setDesconto(float $desconto): void
    {
        $this->desconto = $desconto;
    }

    public function getMarcas(): string
    {
        return $this->marcas;
    }

    public function setMarcas(string $marcas): void
    {
        $this->marcas = $marcas;
    }


}
