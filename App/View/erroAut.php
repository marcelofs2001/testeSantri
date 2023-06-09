<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>santri</title>

    <link rel="stylesheet" href="../View/static/css/w3.css">
    <link rel="stylesheet" href="../View/static/css/santri.css">
    <link rel="stylesheet" href="../View/static/css/toastr.css">

    <link rel="stylesheet" href="../View/static/css-awesome/brands.css">
    <link rel="stylesheet" href="../View/static/css-awesome/fontawesome.css">
    <link rel="stylesheet" href="../View/static/css-awesome/regular.css">
    <link rel="stylesheet" href="../View/static/css-awesome/solid.css">
    <link rel="stylesheet" href="../View/static/css-awesome/svg-with-js.css">
    <link rel="stylesheet" href="../View/static/css-awesome/v4-shims.css">

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
    <script src="../View/static/js/jquery.js"></script>

    <div id="login">
      <img id="logo-cliente" class="w3-margin-top" src="../View/static/imagens/logo_cliente.jpg"/>

      <div class="w3-panel w3-red w3-display-container">
        <span onclick="this.parentElement.style.display='none'"
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>Usuario ou senha incorretos!</h2>
      </div>
      <br>

      <h3 class="w3-center">
        <a href="../../">Fazer Login novamente</a>
      </h3>
      
      <div class="w3-center">
        <a href="http://www.santri.com.br">
          <img id="logo-santri" class="w3-margin-top" src="static/imagens/logo_santri.svg"/>
        </a>
      </div>
    </div>
  </body>
</html>