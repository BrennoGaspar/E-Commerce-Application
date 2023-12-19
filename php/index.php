<?php

    $nome = $_POST["txtNome"] ;
    $senhaa = $_POST["txtSenha"] ;
    
    $endereco = "localhost" ;
    $banco = "New_Way_ECommerce" ;
    $usuario = "root" ;
    $senha = "" ;

    $conexao = new PDO( "mysql:host=$endereco;dbname=$banco" , $usuario , $senha ) ;

    $sql = "SELECT * FROM usuarios WHERE nome=:nome AND senha=:senha" ;

    $stm = $conexao->prepare($sql) ;
    $stm->bindValue(':nome' , $nome) ;
    $stm->bindValue(':senha' , $senhaa) ;

    $stm->execute();

    if( $dados = $stm->fetch(PDO::FETCH_ASSOC) ){

        session_start();
        $_SESSION['user'] = $nome;
        header('Location: ../html/loja.php') ;
        exit;

    }else{

        header("Location: ../html/login.php?mensagem=<script>Swal.fire('Login e/ou Senha inválidos!')</script>");

    }

    if( $nome == "admin" && $senhaa == "admin"){
        header('Location: ../admin/adminpage.html') ;
    }

?>