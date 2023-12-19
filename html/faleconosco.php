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
    <link rel="stylesheet" href="../css/stylefaleconosco1.css">
    <title>Fale Conosco - New Way</title>
</head>
<body>

    <header>
        <a href="loja.php" class="logo"><i class='bx bx-code-alt'></i>New Way E-Commerce</a>

        <ul class="navegação">
            <li><a href="quemsomos.php">Quem Somos</a></li>
            <li><a href="produtos.php">Produtos</a></li>
            <li><a href="#">Fale Conosco</a></li>
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

    <div class="box">
        <form action="mailto:brennogasparpinto@gmail.com" method="post" enctype="text/plain">
            <fieldset>
                <legend><b>Fale Conosco Por E-mail</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="txtNome" id="nome" class="inputUser" required>
                    <label class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="txtEmail" id="email" class="inputUser" required>
                    <label class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="txtCpf" id="cpf" class="inputUser" required>
                    <label class="labelInput">Assunto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="txtSenha" id="senha" class="inputUser" required>
                    <label class="labelInput">Texto</label>
                </div>
                <br><br>
                <input type="submit" value="Enviar" id="bt">
            </fieldset>
        </form>
    </div>
    
    <script>

const botaoMenu = document.querySelector('#botao-menu');
const menuLateral = document.querySelector('.menu-lateral');

botaoMenu.addEventListener('click', function() {
  menuLateral.classList.add('menu-lateral--aberto');
});

document.addEventListener('click', function(event) {
  if (!menuLateral.contains(event.target) && !botaoMenu.contains(event.target)) {
    menuLateral.classList.remove('menu-lateral--aberto');
  }
});

const meuBotao = document.getElementById("sairbt");
meuBotao.addEventListener("click", function() {
Swal.fire({
  title: 'Tem certeza que deseja sair?',
  icon: 'warning',
  showCancelButton: false,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sim, sair!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = "./login.php";
  }
})
});
    </script>

</body>
</html>