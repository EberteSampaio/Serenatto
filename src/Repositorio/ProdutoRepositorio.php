<?php


class ProdutoRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->setPDO($pdo);
    }

    public function formarObjeto($dados){
        return new Produto($dados['id'],
                $dados['tipo'], 
                $dados['nome'],
                $dados['descricao'],
                $dados['preco'],
                $dados['imagem']
    );
    }
    public function opcoesCafe(): array
    {
        $sql = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco;";
        $statemant = $this->pdo->query($sql);
        $produtosCafe = $statemant->fetchAll(PDO::FETCH_ASSOC);

        $dadosCafe = array_map(function ($cafe) {
            return new Produto(
                $cafe['id'],
                $cafe['tipo'],
                $cafe['nome'],
                $cafe['descricao'],
                $cafe['preco'],
                $cafe['imagem']
            );
        }, $produtosCafe);

        return $dadosCafe;
    }

    public function opcoesAlmoco(): array
    {
        $sql = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco;";
        $statemant = $this->pdo->query($sql);
        $produtosAlmoco = $statemant->fetchAll(PDO::FETCH_ASSOC);

        $dadosAlmoco = array_map(function ($almoco) {
            return new Produto(
                $almoco['id'],
                $almoco['tipo'],
                $almoco['nome'],
                $almoco['descricao'],
                $almoco['preco'],
                $almoco['imagem']

            );
        }, $produtosAlmoco);

        return $dadosAlmoco;
    }

    public function listaProdutos(): array
    {
        $sql = "SELECT * FROM produtos ORDER BY preco;";
        $statemant = $this->pdo->query($sql);
        $todosProdutos = $statemant->fetchAll(PDO::FETCH_ASSOC);

        $dadosProdutos = array_map(function ($produtos) {
            return new Produto(
                $produtos['id'],
                $produtos['nome'],
                $produtos['tipo'],
                $produtos['descricao'],
                $produtos['preco'],
                $produtos['imagem']
            );
        }, $todosProdutos);

        return $dadosProdutos;
    }

    public function deletarProduto(int $id)
    {

        $sql = "DELETE FROM produtos WHERE id = :id;";
        $statemant = $this->pdo->prepare($sql);
        $statemant->bindValue(':id', $id);
        $statemant->execute();
    }

    public function cadastrarProduto(Produto $produto)
    {

        $sql = "INSERT INTO produtos (tipo,nome, descricao, imagem, preco) VALUES (:tipo, :nome, :descricao, :imagem, :preco);";
        $statemant = $this->pdo->prepare($sql);
        $statemant->bindValue(':tipo', $produto->getTipo());
        $statemant->bindValue(':nome', $produto->getNome());
        $statemant->bindValue(':descricao', $produto->getDescricao());
        $statemant->bindValue(':imagem', $produto->getImagem());
        $statemant->bindValue(':preco', $produto->getPreco());
        $statemant->execute();

    }

    public function alterarProduto( Produto $dados)
    {

        $sql = "UPDATE produtos SET tipo = :tipo, nome = :nome, descricao = :descricao, imagem = :imagem, preco = :preco  WHERE id = :id;";
        $statemant = $this->pdo->prepare($sql);
        $statemant->bindValue(':id', $dados->getId());
        $statemant->bindValue(':tipo', $dados->getTipo());
        $statemant->bindValue(':nome',$dados->getNome());
        $statemant->bindValue(':descricao', $dados->getDescricao());
        $statemant->bindValue(':imagem', $dados->getImagem());
        $statemant->bindValue(':preco', $dados->getPreco());
        
        $statemant->execute();
        
  
    }


    public function buscarProduto(int $id)
    {

        $sql = "SELECT * FROM produtos WHERE id = :id;";
        $statemant = $this->pdo->prepare($sql);
        $statemant->bindValue(':id', $id);
        $statemant->execute();

        $buscaProduto = $statemant->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($buscaProduto);
    }

    public function setPDO(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}
