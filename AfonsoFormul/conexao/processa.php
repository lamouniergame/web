<?php
	include_once 'aluno.class.php';
	include_once 'conexao.class.php';
	
	$dadosOK = true;
	$arquivo = $_FILES['txtFoto'];
	if($arquivo['error'] != 0){
		$dadosOK = false;
		echo "Erro no upload do arquivo! <br>";	
	}else if ($arquivo['size'] > 100000){
		echo "Tamanho do arquivo incorreto! <br>";
		$dadosOK = false;	
	}else{
		if(($arquivo['type'] != "image/gif") &&
		($arquivo['type'] != "image/jpg") &&
		($arquivo['type'] != "image/jpeg") &&
		($arquivo['type'] != "image/png") &&
		($arquivo['type'] != "image/bmp")){
			echo "Tipo de arquivo invalido <br>";
			$dadosOK = false;
		}else{
			$file_src = '../tmp'.$_FILES['txtFoto']['name'];
			if(!move_uploaded_file($_FILES['txtFoto']['tmp_name'], $file_src)){
				echo "Erro ao mover o arquivo <br>";
				$dadosOK = false;			
			}
		}
		if($dadosOK){
			$mysqlimg = addslashes(fread(fopen($file_src, "rb"),$arquivo['size']));
			$aluno = new Aluno($_POST['txtNome'],$_POST['txtData'],$mysqlimg);	
			$MySQL = new MySQL;		
			
			try{
				$MySQL->inserirAluno($aluno->getNome(),$aluno->getDataNasc(),$aluno->getFoto());
				echo "Dados gravados com sucesso! <br>";		
			}catch(Exception $e){
				echo "Erro ao inserir: ". $e->getMessage() . "<br>";			
			}
		}
	}
?>
