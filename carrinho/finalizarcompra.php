<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="finalizarcomprastyle12.css">
    <title>Finalizar Compra - New Way</title>
</head>
<body>

<header>
        <a href="../html/loja.php" class="logo"><i class='bx bx-code-alt'></i>New Way E-Commerce</a>

        <ul class="navegação">
            <li><a href="../html/quemsomos.php">Quem Somos</a></li>
            <li><a href="../html/produtos.php">Produtos</a></li>
            <li><a href="../html/faleconosco.php">Fale Conosco</a></li>
        </ul><!--navegação-->

        <div class="header-icons">
            <i class='bx bx-cart'></i>
            <div id="menu"><i class='bx bx-menu' id="botao-menu"></i></div>

            <div class="menu-lateral">
              <ul>

              <?php
              session_start();
              $user = $_SESSION['user'];
              $endereco = "localhost" ;
              $banco    = "New_Way_ECommerce" ;
              $usuario  = "root" ;
              $senha    = "" ;
              $conexao = new PDO( "mysql:host=$endereco;dbname=$banco" , $usuario  , $senha  ) ;
              $sql = "SELECT * FROM usuarios WHERE nome=:nome" ;
              $stm = $conexao->prepare($sql) ;
              $stm->bindValue(':nome', $user);
              $stm->execute() ;
              $dados = $stm->fetch(PDO::FETCH_ASSOC) ;
              ?>

                  <div class="infos">
                  <li class="foto"><img src="../imgs/fotouser.png" alt="" width='60vw' height='60vh'></li>
                  <li class="nome"><?php echo $dados['nome'] ?></li>
                  <li class="email"><?php echo $dados['email'] ?></li>
                  <li class="cpf"><?php echo $dados['cpf'] ?></li>
                  </div>

                  <div class="redes_sociais">
                    <a href="https://api.whatsapp.com/send?phone=5511950612743" class="whatsapp"><i class='bx bxl-whatsapp'>WhatsApp</i></a>
                    <a href="https://facebook.com" class="facebook"><i class='bx bxl-facebook-square'>Instagram</i></a>
                    <a href="https://instagram.com" class="instagram"><i class='bx bxl-instagram'>Facebook</i></a>
                  </div>

                  <li class="sair"><a id="sairbt" href="#"><i class='bx bx-exit'>Sair</i></a></li>

              </ul>
            </div>

        </div><!--header-icons-->
    </header>


<?php
    // Verificar se os parâmetros 'produto' e 'qtde' foram passados na URL
    if (isset($_GET['produto']) && isset($_GET['qtde'])) {
        $id = $_GET['produto'];
        $qtd = $_GET['qtde'];

        $endereco = "localhost";
        $banco = "New_Way_ECommerce";
        $usuario = "root";
        $senha = "";

        try {
            $conexao = new PDO("mysql:host=$endereco;dbname=$banco", $usuario, $senha);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT * FROM produtos WHERE codigo=:id';
            $stm = $conexao->prepare($sql);
            $stm->bindValue(':id', $id);
            $stm->execute();
            $ln = $stm->fetch(PDO::FETCH_ASSOC);

            if ($ln) {
                $nome = $ln['nome'];
                $preco = number_format($ln['preco'], 2, ',', '.');
                $subtotal = $ln['preco'] * $qtd;
                $sub = number_format($subtotal, 2, ',', '.');
                $idProd = $ln['codigo'];

                echo '<div class="tudo">
                <div class="box"><form name="forms">
                <fieldset>
                    <legend><b>Finalizar Compra</b></legend>
                    <br>
                    <div class="inputBox">
                        <input size="16" type="number" name="CC" id="CC" class="inputUser" required>
                        <label class="labelInput">Número do Cartão</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="Titular" id="Titular" class="inputUser" required>
                        <label class="labelInput">Nome do Titular</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="Vencimento" id="Vencimento" class="inputUser" required>
                        <label class="labelInput">Data de Vencimento</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input size="3" type="number" name="CVC" id="CVC" class="inputUser" required>
                        <label class="labelInput">CVC</label>
                    </div>
                    <br><br>
                    <input type="submit" value="Confirmar Compra" id="bt">
                </fieldset>
                </form></div>
                <div class="notas">
                    <table>
                        <tr>
                            <td>Produto: '.$nome.'</td>
                        </tr>
                        <tr>
                            <td>Preço: '.$preco.'</td>
                        </tr>
                        <tr>
                            <td>Quantidade: '.$qtd.'</td>
                        </tr>  
                        <tr>
                            <td>Total: '.$sub.'</td>
                        </tr>  
                    </table>
                </div>
                </div>';
            } else {
                echo "Produto não encontrado.";
            }
        } catch (PDOException $e) {
            echo "Erro de conexão com o banco de dados: " . $e->getMessage();
        }
    } else {
        echo "Parâmetros 'produto' e 'qtde' são obrigatórios.";
    }
?>

</body>
</html>