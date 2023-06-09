<?php

    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['loggedin']) === true) {
      // O usuário está logado
      
    } else {
        // O usuário não está logado
        header("Location: ../../");
    }

    class UsuarioDao {

        public function create (Usuario $usuario){
            try{
                $q_user = "INSERT INTO usuarios (usuario, senha, ativo, nome) VALUES (:usuario,:senha,:ativo,:nome)";
                $r_user = Conexao::getConexao()->prepare($q_user);
                $r_user->bindValue(":usuario", $usuario->getUsuario());
                $r_user->bindValue(":senha", $usuario->getSenha());
                $r_user->bindValue(":ativo", $usuario->getAtivo());
                $r_user->bindValue(":nome", $usuario->getNome());

                $r_user->execute();

                $idUser = Conexao::getConexao()->lastInsertId();

                $q_aut = "INSERT INTO autorizacao (id_usuario, chave_autorizacao) VALUES (:idUser,:autorizacoes)";
                $r_aut = Conexao::getConexao()->prepare($q_aut);
                $r_aut->bindValue(":idUser", $idUser);
                $r_aut->bindvalue(":autorizacoes", $usuario->getAutorizacoes());

                $r_aut->execute();
            } catch(Exception $erro){
                print "Erro ao registrar usuario!<br>" . $erro . "<br>";
            }

        }

        public function update(Usuario $usuario) {
            try {
                $q_user = "UPDATE usuarios u 
                           INNER JOIN autorizacao a ON u.id = a.id 
                           SET u.usuario = :usuario, u.senha = :senha, u.ativo = :ativo, u.nome = :nome, a.chave_autorizacao = :autorizacoes
                           WHERE u.id = :id";
        
                $r_user = Conexao::getConexao()->prepare($q_user);
                $r_user->bindValue(":id", $usuario->getId());
                $r_user->bindValue(":usuario", $usuario->getUsuario());
                $r_user->bindValue(":senha", $usuario->getSenha());
                $r_user->bindValue(":ativo", $usuario->getAtivo());
                $r_user->bindValue(":nome", $usuario->getNome());
                $r_user->bindValue(":autorizacoes", $usuario->getAutorizacoes());
                $r_user->execute();
            } catch (Exception $e) {
                echo "Ocorreu um erro ao tentar fazer Update<br>" . $e->getMessage() . "<br>";
            }
        }
    
        public function delete(Usuario $usuario) {
            try {
                $sql = "DELETE FROM usuarios WHERE id = :id";
                $r_user = Conexao::getConexao()->prepare($sql);
                $r_user->bindValue(":id", $usuario->getId());
                return $r_user->execute();
            } catch (Exception $e) {
                echo "Erro ao Excluir usuário! <br> $e <br>";
            }
        }

        public function autenticar($usuario, $senha) {
            try {
                $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha";
                $r_user = Conexao::getConexao()->prepare($sql);
                $r_user->bindValue(":usuario", $usuario);
                $r_user->bindValue(":senha", $senha);
                $r_user->execute();
                $resultado = $r_user->fetchAll(PDO::FETCH_ASSOC);
                if (count($resultado) > 0) {
                    return true; // usuário e senha existem no banco de dados
                } else {
                    return false; // usuário ou senha não existem no banco de dados
                }
            } catch (Exception $e) {
                echo "Ocorreu uma falha ao tentar autenticar usuário.<br> $e <br>";
            }
        }

        public function logout()
        {
            if (isset($_SESSION)) {
                session_destroy();
            }
            
        }
    
        private function listaUsuarios($row) {
            $usuario = new Usuario();
            $usuario->setId($row['id']);
            $usuario->setUsuario($row['usuario']);
            $usuario->setSenha($row['senha']);
            $usuario->setAtivo($row['ativo']);
            $usuario->setNome($row['nome']);
            $usuario->setAutorizacoes($row['chave_autorizacao']);
            return $usuario;
        }
    }
?>