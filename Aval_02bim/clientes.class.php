<?php
    class clientes{
        private $nome;
        private $email;
        private $dataCliente;
    
        public function __construct($nome, $email, $dataCliente){
            $this->setNome($nome);
            $this->setDataCliente($dataCliente);
            $this->setEmail($email);
        }
        
        public function getNome(){
            return $this->nome;
        }
        
        public function setNome($nome){
            $this->nome = $nome;
        }
        
        public function getDataCliente(){
            return $this->dataCliente;
        }
        
        public function setDataCliente($dataCliente){
            $data = (explode('/', $dataCliente));
            $this->dataCliente = "$data[2]-$data[1]-$data[0]";
        }
        
        public function getEmail(){
            return $this->email;
        }
        
        public function setEmail($email){
            $this->email = $email;
        }
    }
?>