<?php 
require_once "config.php";

?>

<div class="menu">
    <a href="<?php echo $url?>registros.php">
        <div class="botao-menu">    
                <img src="<?php echo $url?>img/lista.png" alt="Registros">
        </div>
    </a>
    <a href="<?php echo $url ?>novo-usuario.php">
        <div class="botao-menu">    
            <img src="<?php echo $url?>img/novo-usuario.png" alt="Cadastrar Usuário">
        </div>
    </a>
    <a href="<?php echo $url?>novo-produto.php">
        <div class="botao-menu">    
                <img src="<?php echo $url?>img/novo-produto.png" alt="Registros">
        </div>
    </a>
    <a href="<?php echo $url ?>produtos/listar.php">
        <div class="botao-menu">    
            <img src="<?php echo $url?>img/maca.png" alt="Pesquisar">
        </div>
    </a>  
    <a href="<?php echo $url ?>nova-categoria.php">
        <div class="botao-menu">    
            <img src="<?php echo $url?>img/nova-categoria.png" alt="Categorias">
        </div>
    </a>
    <a href="<?php echo $url ?>busca.php">
        <div class="botao-menu">    
            <img src="<?php echo $url?>img/busca.png" alt="Pesquisar">
        </div>
    </a>    
</div>