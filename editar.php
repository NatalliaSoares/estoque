<?php
    require_once "config.php";
    $id=$_GET['id'];    
    global $db;
    $info = array();
    $sql="SELECT * FROM usuarios WHERE id = :id";
    $sql = $db->prepare($sql);
    $sql->bindValue(":id",$id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $info = $sql->fetch();
    }else{
        echo "<h1>Usuario nao existe</h1>";
        exit;
    }

    if($_POST){
        $nome=$_POST['nome'];
        $sobrenome=$_POST['sobrenome'];
        $usuario=$_POST['usuario'];
        $senha=$_POST['senha'];

        $sql="UPDATE usuarios SET nome=:nome, sobrenome=:sobrenome, usuario=:usuario, senha=:senha WHERE id=:id";
        $sql=$db->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":sobrenome", $sobrenome);
        $sql->bindValue(":usuario", $usuario);
        $sql->bindValue(":senha", $senha);
        $sql->bindValue(":id", $id);
        $sql->execute();
        if($sql){
            header('Location: editar.php?id=' . $id);
        }
    }
    
?>


<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Editar Usuário</title>
</head>
<body>
    <section class="container fundo">
        <?php require_once "menu.php" ?>
        <div class="container">
            <fieldset>
                <legend>Editar Usuário</legend>
                <form method= 'POST'>
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo utf8_encode($info['nome'])?>">
                    <label>Sobrenome</label>
                    <input type="text" class="form-control" name="sobrenome" value="<?php echo utf8_encode($info['sobrenome'])?>">
                    <label>Usuário</label>
                    <input type="text" class="form-control" name="usuario" value="<?php echo utf8_encode($info['usuario'])?>">
                    <label>Senha</label>
                    <input type="text" class="form-control" name="senha" value="<?php echo $info['senha']?>">
                    <br/>
                    <a href="registros.php" class="btn btn-warning">Voltar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            </fieldset>
        </div>
    </section>
</body>
</html>