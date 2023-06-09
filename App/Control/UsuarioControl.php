<?php
    include_once "../Connection/Connection.php";
    include_once "../Model/usuario.class.php";
    include_once "../Dao/UsuarioDao.php";

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

    if(isset($_POST['logar'])){
        $usuario = ($_POST['usuarioUser']);
        $senha = ($_POST['senhaUser']);

        $user->setUsuario($usuario);
        $user->setSenha($senha);
        $userDao->autenticar($usuario, $senha);

        if ($userDao->autenticar($usuario, $senha)) {
            // usuário e senha existem no banco de dados
            session_start();
            $_SESSION["loggedin"] = true;
            header("Location: ../View/pesquisa_usuarios.php");
        } else {
            // usuário e/ou senha não existem no banco de dados

            header("Location: ../View/erroAut.php");
        }
    } else if(isset($_POST['cadastrar'])){
        $usuario = ($_POST['usuarioUser']);
        $senha = ($_POST['senhaUser']);
        $ativo = ($_POST['ativoUser']);
        $nome = ($_POST['nomeUser']);
        $aut = ($_POST['autorizacoes']);
        $aut = implode(', ', $_POST['autorizacoes']);

        $user->setUsuario($usuario);
        $user->setSenha($senha);
        $user->setAtivo($ativo);
        $user->setNome($nome);
        $user->setAutorizacoes($aut);
        
        $userDao->create($user);

        header("Location: ../View/pesquisa_usuarios.php");
    } else if(isset($_POST['editar'])) {
        $usuario = ($_POST['usuarioUser']);
        $senha = ($_POST['senhaUser']);
        $ativo = ($_POST['ativoUser']);
        $nome = ($_POST['nomeUser']);
        $aut = ($_POST['autorizacoes']);
        $aut = implode(', ', $_POST['autorizacoes']);

        $user->setUsuario($usuario);
        $user->setSenha($senha);
        $user->setAtivo($ativo);
        $user->setNome($nome);
        $user->setAutorizacoes($aut);

        $userDao->update($user);
        

    } else if(isset($_GET['del'])){
        $user->setId($_GET['del']);
        $userDao->delete($user);
        header("Location: ../View/pesquisa_usuarios.php");
        
    } else if(isset($_GET['logout'])){
        $userDao->logout();
        header("Location: ../../");
        
    } 

?>