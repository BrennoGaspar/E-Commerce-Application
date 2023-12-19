
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro - New Way</title>

    <link rel="stylesheet" href="../css/cadastro1.css">
</head>
<body>

            <?php 
            if(isset($_REQUEST["mensagem"])){
                echo ($_REQUEST["mensagem"]) ;
            } 
            ?>

    <div class="box">
        <form name="form1" method="POST" action="../php/CadastroPHP.php">
            <fieldset>
                <legend><b>Cadastro Clientes</b></legend>
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
                    <input type="email" name="txtEmail" id="email" class="inputUser" required>
                    <label class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="txtCpf" id="cpf" class="inputUser" required>
                    <label class="labelInput">CPF</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="txtSenha" id="senha" class="inputUser" required>
                    <label class="labelInput">Senha</label>
                </div>
                <br><br>
                <input type="submit" value="Cadastrar" id="bt">
            </fieldset>
        </form>
    </div>
</body>
</html>