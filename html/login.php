<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - New Way</title>

    <link rel="stylesheet" href="../css/login.css">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

<div class="mensagem"> 
            <?php 
            if(isset($_REQUEST["mensagem"])){
                echo ($_REQUEST["mensagem"]) ;
            } 
            ?>
        </div>

    <div class="box">
    <form name="formlogin" method="POST" action="../php/index.php" >
            <fieldset>
                <legend><b>Login - Clientes</b></legend>
                <br>
                <div class="imagemform">
                    <img src="../imgs/foto-logo-nw.png">
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="txtNome" id="nome" class="inputUser" required>
                    <label class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="txtSenha" id="senha" class="inputUser" required>
                    <label class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="botoes">
                <input type="submit" value="Logar" id="bt">
                <a href="CadastroIndex.php" id="btCadastro">Cadastrar-se</a>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>