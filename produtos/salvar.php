<?php
require_once "../config.php";
global $db;

$nome = $_POST['nome'];
$id_categoria = $_POST['id_categoria'];
$data_validade = $_POST['data_validade'];
$qtd = $_POST['qtd'];
$id = $_POST['id'];

if(isset($_POST['nome'])){
    $sql = "UPDATE produtos SET nome = :nome, id_categoria = :id_categoria, data_validade = :data_validade, qtd = :qtd WHERE id = :id";
    $sql = $db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":id_categoria", $id_categoria);
    $sql->bindValue(":data_validade", $data_validade);
    $sql->bindValue(":qtd", $qtd);

    $sql->execute();

    header("Location: listar.php?id=$id");
}else{

}

?>