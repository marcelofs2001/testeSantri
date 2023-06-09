<?php
    include_once "../Connection/Connection.php";
    
      if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['loggedin']) === true) {
      // O usuário está logado
      
    } else {
        // O usuário não está logado
        header("Location: ../../");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title>Santri - Cadastro Usuários</title>
  <link rel="stylesheet" href="static/css/w3.css">
  <link rel="stylesheet" href="static/css/santri.css">
  <link rel="stylesheet" href="static/css/toastr.css">
  <link rel="stylesheet" href="static/css-awesome/brands.css">
  <link rel="stylesheet" href="static/css-awesome/fontawesome.css">
  <link rel="stylesheet" href="static/css-awesome/regular.css">
  <link rel="stylesheet" href="static/css-awesome/solid.css">
  <link rel="stylesheet" href="static/css-awesome/svg-with-js.css">
  <link rel="stylesheet" href="static/css-awesome/v4-shims.css">
  <link rel="icon" type="image/x-icon" href="static/imagens/Favicon_Santri.png">

</head>

<body>
  <div class="w3-sidebar w3-center w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">

  <div class="w3-container w3-bar-item w3-large w3-theme">
    <h3>
      Santri Sistemas
    </h3>
  </div>
  <br>
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">&times; Fechar Navegação</button><br>
  <a href="" class="w3-bar-item w3-button">Cadastrar Usuários</a><br>
  <a href="pesquisa_usuarios.php" class="w3-bar-item w3-button">Pesquisar Usuários</a><br>

  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-round-large w3-pale-red w3-black">Sair</button>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-round-large w3-animate-top w3-card-4">
      <header class="w3-container w3-theme"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-round-large w3-display-topright">&times;</span>
        <h2>Deseja mesmo sair?</h2>
      </header>
      <div class="w3-container">
        <h2><br>
          <a class="w3-pale-red w3-round-large" href="../Control/UsuarioControl.php?logout">Sim</a>
          <a class="w3-pale-green w3-round-large" href="">  Não</a><br><br>
        </h2 >
      </div>
    </div>
  </div>
  <footer class="w3-container w3-left w3-bottom w3-theme">
    <h4>&copy Santri - Marcelo F.</h4>
  </footer>
  </div>
  <div id="main">

    <div class="w3-theme">
      <button id="openNav" class="w3-button w3-theme" onclick="w3_open()">&#9776;</button>
      <div class="w3-container">
        <h1>Cadastro de Usuários</h1>
      </div>
    </div>

    <div class="w3-container">
                     
      <form action="../Control/UsuarioControl.php" method="POST">
        <div>
          <div>
            <br>
            <b><label>Nome</label></b>
            <br>
            <input type="text" name="nomeUser" placeholder="Digite o nome completo" class="w3-input w3-block w3-border" required>
          </div>

          <div>
            <br>
            <b><label>Usuario</label></b>
            <input type="text" name="usuarioUser" placeholder="Digite o login para acessar o sistema" class="w3-input w3-block w3-border" required>
          </div>

          <div>
          <br>
            <b><label>Senha</label></b>
            <input type="password" placeholder="Digite a senha" name="senhaUser" class="w3-input w3-block w3-border" required>
          </div>

          <div>
            <br>
            <b><label>Ativo</label></b>
            <input type="text" name="ativoUser" placeholder="Digite 'S' para sim e 'N' para não"  class="w3-input w3-block w3-border" required>
          </div>
          <br><hr>
          
          <div>
            <Label>Autorizações do Usuário</Label><br>
          </div>
          <br>

          <ul> 
            <li id="opt_cadastrar_clientes"><input type="checkbox" name="autorizacoes[]" checked value="cadastrar_clientes"> <label>Cadastrar clientes</label></li>

            <li id="opt_excluir_clientes"><input type="checkbox" name="autorizacoes[]" value="excluir_clientes"> <label>Excluir clientes</label></li>

            <li id="opt_cadastrar_fornecedores"><input type="checkbox" name="autorizacoes[]" value="cadastrar_fornecedores"> <label>Cadastrar fornecedores</label></li>

            <li id="opt_excluir_fornecedores"><input type="checkbox" name="autorizacoes[]" value="excluir_fornecedores"> <label>Excluir fornecedores</label></li>

            <li id="opt_cadastrar_produtos"><input type="checkbox" name="autorizacoes[]" value="cadastrar_produtos"> <label>Cadastrar produtos</label></li>

            <li id="opt_alterar_preco_produtos"><input type="checkbox" name="autorizacoes[]" value="alterar_preco_produtos"> <label>Alterar preço de produtos</label></li>
          </ul>

          <button type="submit" name="cadastrar" class="w3-button w3-theme w3-margin-top w3-margin-bottom">Gravar</button>
          <a href="pesquisa_usuarios.php" class="w3-button w3-margin-top w3-margin-bottom w3-right">Cancelar</button>
        </div>  
      </form>
    </div>
  </div>

  <script>
      function w3_open() {
      document.getElementById("main").style.marginLeft = "25%";
      document.getElementById("mySidebar").style.width = "25%";
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("openNav").style.display = 'none';
    }
    function w3_close() {
      document.getElementById("main").style.marginLeft = "0%";
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("openNav").style.display = "inline-block";
    }
  </script>

    <br><br>
</body>
</html>