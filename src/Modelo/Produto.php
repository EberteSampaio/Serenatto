<?php

class Produto
{

    private ?int    $id;
    private string  $tipo;
    private string  $nome;
    private string  $descricao;
    private string  $imagem;
    private float   $preco;

    public function __construct(?int $idProd, string $tipoProd, string $nomeProd, string $descricaoProd, float $precoProd, string $imagemProd = "logo-serenatto.png")
    {
        $this->setId($idProd);
        $this->setTipo($tipoProd);
        $this->setNome($nomeProd);
        $this->setDescricao($descricaoProd);
        $this->setImagem($imagemProd);
        $this->setPreco($precoProd);
    }

    
    public function getPrecoFormatado():string
    {
        return 'R$ '.number_format($this->getPreco(),2);
    }

    public function getImagemDiretorio():string
    {
        return "img/".$this->getImagem();
    }




    /*
        Métodos Getters e Setters
    */

    public function setId(?int $idProd)
    {
        $this->id = $idProd;
    }
    
    public function getId():int
    {
        return $this->id;
    }

    public function setTipo(string $tipoProd)
    {
        $this->tipo = $tipoProd;
    }
    
    public function getTipo():string
    {
        return $this->tipo;
    }

    public function setNome(string $nomeProd)
    {
        $this->nome = $nomeProd;
    }
    
    public function getNome():string
    {
        return $this->nome;
    }

    public function setDescricao(string $descricaoProd)
    {
        $this->descricao = $descricaoProd;
    }
    
    public function getDescricao():string
    {
        return $this->descricao;
    }

    public function setImagem(string $imagemProd)
    {
        $this->imagem = $imagemProd;
    }
    
    public function getImagem():string
    {
        return $this->imagem ;
    }

    public function setPreco(float $precoProd)
    {
        $this->preco = $precoProd;
    }
    
    public function getPreco():float
    {
        return number_format($this->preco,2) ;
    }



}
