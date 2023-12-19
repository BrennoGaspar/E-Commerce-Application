<?php

    $codigo = $_POST["txtCodigo"] ;
    
    $endereco = "localhost" ;
    $banco = "New_Way_ECommerce" ;
    $usuario = "root" ;
    $senha = "" ;

    $conexao = new PDO( "mysql:host=$endereco;dbname=$banco" , $usuario , $senha ) ;

    $sql = "DELETE FROM produtos WHERE codigo=:codigo";

    $stm = $conexao->prepare($sql) ;
    $stm->bindValue(':codigo' , $codigo) ;
   
    $resultado = $stm->execute() ;

    if ($resultado) {
        Header("Location: produtospage.php?mensagemrem=<script>Swal.fire('Produto removido com sucesso!')</script>");
    } else {
        echo "Erro ao remover produto.";
    }

?>