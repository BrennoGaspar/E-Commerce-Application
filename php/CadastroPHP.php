<?php

    $nome = $_POST["txtNome"] ;
    $email = $_POST["txtEmail"] ;
    $cpf = $_POST["txtCpf"] ;
    $senhaa = $_POST["txtSenha"] ;
    
    $endereco = "localhost" ;
    $banco = "New_Way_ECommerce" ;
    $usuario = "root" ;
    $senha = "" ;

    $conexao = new PDO( "mysql:host=$endereco;dbname=$banco" , $usuario , $senha ) ;

    $sql = "INSERT INTO usuarios (nome, email, cpf, senha, data_criacao) values (:nome , :email , :cpf, :senha, NOW())" ;

    $stm = $conexao->prepare($sql) ;
    $stm->bindValue(':nome' , $nome) ;
    $stm->bindValue(':cpf' , $cpf) ;
    $stm->bindValue(':email' , $email) ;
    $stm->bindValue(':senha' , $senhaa) ;

    $resultado = $stm->execute() ;

    if( $resultado ){

        Header("Location: ../html/login.php?mensagem=<script>Swal.fire('Dados cadastrados com sucesso!')</script>") ;

    }else{
        echo "Erro ao gravar!" ;
    }

?>