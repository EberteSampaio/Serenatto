<?php

    require 'src/config.php';
    require 'src/Modelo/Produto.php';
    require 'src/Repositorio/ProdutoRepositorio.php';

    $produtoRepositorio = new ProdutoRepositorio($pdo);
    $produtoRepositorio->deletarProduto($_POST['id']);

    header("Location:admin.php");