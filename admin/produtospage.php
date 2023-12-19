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
  <link rel="stylesheet" href="produtospage1.css">
    <title>Produtos - New Way</title>
</head>
<body>

<?php 
            if(isset($_REQUEST["mensagemrem"])){
                echo ($_REQUEST["mensagemrem"]) ;
            } 
            if(isset($_REQUEST["mensagemadd"])){
              echo ($_REQUEST["mensagemadd"]) ;
          } 
            ?>

    <header id='header'>
        <a href="adminpage.html" class="logo"><i class='bx bx-code-alt'></i>New Way E-Commerce</a>

        <ul class="navegação">
            <li><a href="#">Produtos</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
        </ul><!--navegação-->

        <div class="header-icons">
            <div id="menu"><i class='bx bx-menu' id="botao-menu"></i></div>

            <div class="menu-lateral">
              <ul>  
                  <li class="sair"><a id="sairbt" href="#"><i class='bx bx-exit'> Sair</i></a></li>
              </ul>
            </div>

        </div><!--header-icons-->
    </header>

    <section>
       
    <div class="botoes">
    <i class='bx bx-message-alt-add'><a href="addpage.html">Adicionar Produtos</a></i>
    <i class='bx bx-message-alt-x'><a href="rempage.html">Remover Produtos</a></i>
    </div>

    <br><br>

    <div class="main">

  <?php
   
   $endereco = "localhost" ;
   $banco    = "New_Way_ECommerce" ;
   $usuario  = "root" ;
   $senha    = "" ;

   $conexao = new PDO( "mysql:host=$endereco;dbname=$banco" , $usuario  , $senha  ) ;
  
   $sql = "SELECT * FROM produtos" ;
   $stm = $conexao->prepare($sql) ;
   $resultado = $conexao->query($sql);

   while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="box">';
    echo '<form name="formprodutos">';
    echo '<fieldset>';
            echo '<br>';
          echo '<div class="imagemform">';
            echo "<a href='visualizar.php?codigo=" . $linha["codigo"] . "'><img src='data:image/jpeg;base64,".base64_encode( $linha['conteudo'] )."'/></a>";
          echo '</div>';
            echo '<br>';
              echo '<label class="labelInput">Código do produto: ' . $linha["codigo"] . '</label>';
            echo '<br><br>';
              echo '<label class="labelInput">' . $linha["nome"] . '</label>';
            echo '<br><br>';
               echo '<label class="labelInput">R$' . $linha["preco"] . '</label>';
            echo '<br><br>';
              echo '<button id="bt" onClick="Comprar()">Comprar</a>';
    echo '</fieldset>';
    echo '</form>';
    echo '</div>';
    echo '<br>';
   }

?>

    </div><!--main-->
  </section>

<script>

      (function () {
         var menu = document.getElementById('header');
          window.addEventListener('scroll', function () {
              if (window.scrollY > 0) menu.classList.add('menuFixo'); // > 0 ou outro valor desejado
              else menu.classList.remove('menuFixo');
         });
      })();

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

        //outro

        function slider (anything){
            document.querySelector ('.one') .src = anything;
        };

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
    window.location.href = "../html/login.php";
  }
})
});

</script>
    
</body>
</html>