<?php
  require 'src/config.php';
  require 'src/Modelo/Produto.php';
  require 'src/Repositorio/ProdutoRepositorio.php';

  $Produtos = new ProdutoRepositorio($pdo);
  $todosProdutos = $Produtos->listaProdutos();



?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Serenatto - Admin</title>
</head>
<body>

<table>
        <thead>
          <tr>
            <th>Produto</th>
            <th>Tipo</th>
            <th>Descricão</th>
            <th>Valor</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($todosProdutos as $produto) : ?>
            <tr>
              <td><?= $produto->getTipo() ?></td>
              <td><?= $produto->getNome() ?></td>
              <td><?= $produto->getDescricao() ?></td>
              <td><?= $produto->getPrecoFormatado() ?></td>
              <td><a class="botao-editar" href="editar-produto.php?id=<?=$produto->getId()?>">Editar</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
          
</body>