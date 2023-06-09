<?php
  include_once "../Connection/Connection.php";
  include_once "../Dao/usuarioDao.php";
  include_once "../Model/usuario.class.php";

  if (!isset($_SESSION)) {
    session_start();
  }


  if (isset($_SESSION['loggedin']) === true) {
    // O usuário está logado
    
  } else {
      // O usuário não está logado
      header("Location: ../../");
  }

  $user = new Usuario();
  $userDao = new UsuarioDao();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Santri - Pesquisa Usuários</title>

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

    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
      }

      tr:nth-child(even) {background-color: #f2f2f2;}
    </style>

  </head>
<body>
  <script src="static/js/jquery.js"></script>
  <script src="static/js/script.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

  <div class="w3-sidebar w3-center w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">

    <div class="w3-container w3-bar-item w3-large w3-theme">
      <h3>
        Santri Sistemas
      </h3>
    </div>
    <br>
    <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">&times; Fechar Navegação</button><br>
    <a href="cadastro_usuarios.php" class="w3-bar-item w3-button">Cadastrar Usuários</a><br>
    <a href="#" class="w3-bar-item w3-button">Pesquisar Usuários</a><br>

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
        <h1>Pesquisa de Usuários</h1>
      </div>
    </div>

    <div id="lista_usuarios" class="w3-margin">
      <div>
        <input class="w3-input w3-border w3-margin-top" id="pesquisaNome" type="text" name="buscar" id="buscar" placeholder="Digite um nome">

        <a href="cadastro_usuarios.php" class="w3-button w3-theme w3-margin-top w3-right">Cadastrar novo usuário</a>
      </div>
    </div>

    <div>
        <div id="resultado"></div>
    </div>
  </div>
  <div>

</body>
</html>

<script type="text/javascript">

  $(document).ready(function() {
  $('#pesquisaNome').keyup(function() {
    var nome = $(this).val();
    buscarNome(nome);
  });

  function buscarNome(nome) {
    $.ajax({
      url: "../Dao/proc_pesquisa.php",
      method: "POST",
      data: { nome: nome },
      success: function(data) {
        $('#resultado').html(data);
      }
    });
  }
});

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