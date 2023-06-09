<?php

    class Usuario {
        private $id;
        private $usuario;
        private $senha;
        private $ativo;
        private $nome;
        private $autorizacoes;
        
        public function getId(){
            return $this->id;
        
        }

        public function setId($id): self {
            $this->id = $id;
            return $this;
        }

        public function getAutorizacoes() {
            return $this->chave_autorizacao;
        }

        public function setAutorizacoes($autorizacoes): self{
            $this->chave_autorizacao = $autorizacoes;
            return $this;
        }
            
        public function getUsuario() {
            return $this->usuario;
        }

        public function setUsuario($usuario): self {
            $this->usuario = $usuario;
            return $this;
        }

        public function getSenha() {
            return $this->senha;
        }
        
        public function setSenha($senha): self {
            $this->senha = $senha;
            return $this;
        }

        public function getNome() {
            return $this->nome;
        }
        
        public function setNome($nome): self {
            $this->nome = $nome;
            return $this;
        }

        public function getAtivo() {
            return $this->ativo;
        }
        
        public function setAtivo($ativo): self {
            $this->ativo = $ativo;
            return $this;
        }
}

?>