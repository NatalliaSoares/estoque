<?php 
    require_once "../config.php";
    global $db;

    $produtos = array();

    $sql="SELECT produtos.id, produtos.nome, produtos.data_entrada, produtos.data_saida, produtos.data_validade, produtos.qtd, categorias.nome AS nome_categoria FROM produtos INNER JOIN categorias ON produtos.id_categoria = categorias.id";
    $sql = $db -> prepare($sql);
    $sql->execute();

    if($sql -> rowCount() > 0){
        $produtos = $sql -> fetchAll();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Produtos</title>
</head>
<body>
    <section class="container fundo">
        <?php require_once "../menu.php" ?>
        <h1>Produtos</h1>
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Data de entrada</th>
                        <th>Data de saída</th>
                        <th>Data de validade</th>
                        <th>Quantidade</th>
                        <th>Opções</th>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos as $produto):?>
                            <tr>
                                <td><?php echo $produto['id'] ?></td>
                                <td><?php echo $produto['nome'] ?></td>
                                <td><?php echo $produto['nome_categoria'] ?></td>
                                <td><?php echo $produto['data_entrada'] ?></td>
                                <td><?php echo $produto['data_saida'] ?></td>
                                <td><?php echo $produto['data_validade'] ?></td>
                                <td><?php echo $produto['qtd'] ?></td>

                                <td><a href="editar.php?id=<?php echo $produto['id'] ?>" class="btn btn-warning">Editar</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>
</html>