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
    <title>Carrinho - New Way</title>
    <link rel="stylesheet" href="carrinhopage12.css">
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



    //carrinho (la encima nao funciona)
    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
    }

    //adiciona produto
    if(isset($_GET['acao'])){
        if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){ 
                $_SESSION['carrinho'][$id] = 1;
            } else {
                $_SESSION['carrinho'][$id] += 1;
            }
        }

        if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'] [$id])){
                unset($_SESSION['carrinho'] [$id]);
            }
        }
        
        if($_GET['acao'] == 'up'){
           $prod = $_REQUEST['prod'];
            
            if(is_array($prod)){
                foreach($_POST['prod'] as $id => $qtd){
                    $id = intval($id);
                    $qtd = intval($qtd);
                    if(!empty($qtd)){
                        $_SESSION['carrinho'] [$id] = $qtd;
            } else {
                unset($_SESSION['carrinho'] [$id]);
            }
            }
        }
    }
}
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

<div class="geral">
    <form name="form1" action="carrinhohtml.php" method='get'>
    <div class="tabela-cart">
        <table>
            <thead>
                <tr>
                    <td>Produto</td>
                    <td>Quantidade</td>
                    <td>Preço</td>
                    <td>SubTotal</td> 
                    <td>Ação</td>
                </tr>

                <?php
                    if(count($_SESSION['carrinho']) == 0){
                        echo '<tr><td colspan="5">Não há produtos adicionados ao carrinho!</td></tr>';
                    } else {
                        foreach($_SESSION['carrinho'] as $id => $qtd){

                            $endereco = "localhost" ;
                            $banco    = "New_Way_ECommerce" ;
                            $usuario  = "root" ;
                            $senha    = "" ;
                            $conexao = new PDO( "mysql:host=$endereco;dbname=$banco" , $usuario  , $senha  ) ;

                            $sql = 'SELECT * FROM produtos WHERE codigo=:id';
                            $stm = $conexao->prepare($sql) ;
                            $stm->bindValue(':id', $id);
                            $stm->execute();
                            $ln = $stm->fetch(PDO::FETCH_ASSOC);

                            $nome = $ln['nome'];
                            $preco = number_format($ln['preco'], 2, ',', '.');
                            $qtd = number_format($qtd);
                            $subtotal = $ln['preco'] * $qtd;
                            $sub = number_format($subtotal, 2, ',', '.');
                            $idProd = $ln['codigo'];

                            echo '<tr>
                            <td><input type="text" name="prod" id="dado" value="'.$nome.'" readonly><br/></td>
                            <td><input type="text" name="qtde" id="dado" value="'.$qtd.'"><br/></td>
                            <td><input type="text" name="preco" id="dado" value="'.$preco.'" readonly><br/></td>
                            <td><input type="text" name="subtotal" id="dado" value="'.$sub.'" readonly><br/></td>
                            <td><i class="bx bx-x"><a id="dado" href="?acao=del&id='.$id.'">Remover</a></i><br/></td>
                        </tr>';
                        }
                    }
                ?>

            </thead>
        </table>
    </div>

    <div class="mudar">
        <tfoot>
            <tr>
                <td colspan='5'> <input type="button" value='Atualizar Carrinho' onClick="atualizar()"></td>
            <tr>
                <td colspan='5'><a href="../html/produtos.php">Continuar Comprando</a></td>
        </tfoot>
    </div>
    </form>

    <div class="finalizar">
    <?php //echo "<a href='finalizarcompra.php?produto=".$id."&qtde=' + document.form1.qtde.value'>Finalizar Compra</a>"; ?>
    </div>
</div>
</body>
</html>
<script>
    function atualizar() {
    var subtotal = 0;
    subtotal = parseFloat(document.form1.preco.value) * parseFloat(document.form1.qtde.value);
    document.form1.subtotal.value = subtotal;
    
    // Atualize o link "Finalizar Compra"
    var linkFinalizarCompra = document.querySelector(".finalizar a");
    linkFinalizarCompra.href = 'finalizarcompra.php?produto=<?php echo $id; ?>&qtde=' + document.form1.qtde.value;
    
    //alert("valor:" + document.form1.preco.value);
    //alert("qtde:" + document.form1.qtde.value);
    //alert("subtotal:" + subtotal);
}
</script>