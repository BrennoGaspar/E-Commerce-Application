<?php

    $nome = $_POST["txtNome"] ;
    $descricao = $_POST["txtDescricao"] ;
    $preco = $_POST["txtPreco"] ;
    
    $endereco = "localhost" ;
    $banco = "New_Way_ECommerce" ;
    $usuario = "root" ;
    $senha = "" ;

    $conexao = new PDO( "mysql:host=$endereco;dbname=$banco" , $usuario , $senha ) ;

    $file_tmp = $_FILES['file']['tmp_name'];

    $file_name = $_FILES['file']['name'];

    $file_type = $_FILES['file']['type'];

    $file_data = addslashes(file_get_contents($file_tmp));

    $sql = "INSERT INTO produtos (nome, descricao, preco, nome_foto, tipo, conteudo) VALUES (:nome , :descricao , :preco, '$file_name', '$file_type', '$file_data')";

    $stm = $conexao->prepare($sql) ;
    $stm->bindValue(':nome' , $nome) ;
    $stm->bindValue(':descricao' , $descricao) ;
    $stm->bindValue(':preco' , $preco) ;

    $resultado = $stm->execute() ;

    if ($resultado) {
        Header("Location: produtospage.php?mensagemadd=<script>Swal.fire('Produto adicionado com sucesso!')</script>");
    } else {
        echo "Erro ao adicionar produtos.";
    }

?>