<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Santri - Login</title>

    <link rel="stylesheet" href="App/View/static/css/w3.css">
    <link rel="stylesheet" href="App/View/static/css/santri.css">
    <link rel="stylesheet" href="App/View/static/css/toastr.css">

    <link rel="stylesheet" href="App/View/static/css-awesome/brands.css">
    <link rel="stylesheet" href="App/View/static/css-awesome/fontawesome.css">
    <link rel="stylesheet" href="App/View/static/css-awesome/regular.css">
    <link rel="stylesheet" href="App/View/static/css-awesome/solid.css">
    <link rel="stylesheet" href="App/View/static/css-awesome/svg-with-js.css">
    <link rel="stylesheet" href="App/View/static/css-awesome/v4-shims.css">
    <link rel="icon" type="image/x-icon" href="App/View/static/imagens/Favicon_Santri.png">
    <style>
      #login {
        max-width: 95%;
        margin: auto;
        width: 380px;
        margin-top: 5%;
      }

      #logo-cliente {
        max-width: 100%;
        margin: auto;
        width: 700px;    
      }

      #logo-santri {
        max-width: 50%;
        margin: auto;
        width: 380px;    
      }
    </style>

  </head>
  <body>
    <script src="App/View/static/js/jquery.js"></script>

    <div id="login">
      <img id="logo-cliente" class="w3-margin-top" src="App/View/static/imagens/logo_cliente.jpg"/>
      <form action="App/Control/UsuarioControl.php" method="POST">
        <input class="w3-input w3-border w3-margin-top" name="usuarioUser" type="text" placeholder="Digite seu usuário">
        <input class="w3-input w3-border w3-margin-top" name="senhaUser" type="password" placeholder="Digite sua senha">
        <button class="w3-button w3-theme w3-margin-top w3-block" name="logar" type="submit">Logar</button>
      </form>
      <br><br>
      
      <div class="w3-center">
        <a href="http://www.santri.com.br">
          <img id="logo-santri" class="w3-margin-top" src="App/View/static/imagens/logo_santri.svg"/>
        </a>
      </div>

    </div>
  </body>
</html>