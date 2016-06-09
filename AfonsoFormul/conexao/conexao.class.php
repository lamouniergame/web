<?php
	class MySql{
		var $host="localhost";
		var $user="root";
		var $password="root";
		var $database="CEFETMG";
		var $link;
		var $query;
		var $result;
		function connect(){
			$this->link = mysql_connect($this->host,$this->user,$this->password);
			if(!$this->link){
				echo "Falha na conexão<br>";
				echo "Erro".mysql_error();
				die();
			}else if(!mysql_select_db($this->database, $this->link)){
				echo "O Banco de Dados nao conseguiu ser aberto! <br>";
				echo "Erro".mysql_error();
				die();
			}
		}
		function disconnect(){
			return mysql_close($this->link); 
		}
		function executeQuery($query){
			$this->connect();
			$this->query = $query;
			if($this->result = mysql_query($this->query)){
				$this->disconnect();
				return $this->result;
			}else{
				echo "Ocorreu um erro".mysql_error();
				die();
				disconnect();			
			}
		}
		function inserirAluno($nome, $dataNasc, $foto){
			$sqlAluno = "insert into aluno(nome,dataNasc, foto) VALUES ('$nome', '$dataNasc', '$foto')";
			$this->executeQuery($sqlAluno);		
		}
	}
?>






















