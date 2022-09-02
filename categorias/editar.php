<?php
    require_once "../config.php";
    global $db;

    $categoria = array();

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM categorias WHERE id = :id";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $categoria = $sql->fetch();
        }else{
            header("Location: ../nova-categoria.php");
            exit;
        }

    }else{
        header("Location: ../nova-categoria.php");
        exit;
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
    <title>Editar</title>
</head>
<body>
    <div class="container fundo">
        <?php require_once "../menu.php"?>
        <div class="container">
            <fieldset>
                <legend>Editar Categoria</legend>
                <form method= 'POST' action="salvar.php">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo $categoria['nome'] ?>">
                    </br>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            </fieldset>
        </div>
    </div>
</body>
</html>