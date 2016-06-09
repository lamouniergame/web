<!DOCTYPE html>

<html lang="pt-br">

<head>
	<title>Envio de dados</title>
	<meta charset="utf-8">
</head>

<body>

	<?php
		
		echo "<h1>Os dados informados são:</h1>";
		$camposOK = true;
		$nome = $_POST["txtNome"];
		$arquivo = $_FILES["txtFoto"];
		$dtNasc = $_POST["txtData"];
		if($nome == "") {
			echo "Nome em branco <br>";
			$camposOK = false;
		}
		$data = explode("/","$dtNasc");
		$dia = (int)$data[0];
		$mes = (int)$data[1];
		$ano = (int)$data[2];
		
		if ( ( $mes == 1) || ( $mes == 3) || ( $mes == 5) || ( $mes == 7) || ( $mes == 8) || ( $mes == 10) || ( $mes == 12) ){
			if ( ( $dia < 1) || ( $dia > 31) ) {
				echo "Data incorreta.<br>";
				$camposOK = false;
			}
		} else if ( ( $mes == 4) || ( $mes == 6) || ( $mes == 9) || ( $mes == 11) ){
			if ( ( $dia < 1) || ( $dia > 30) ) {
				echo "Data incorreta.<br>";
				$camposOK = false;
			}
		} else if ( $mes == 2) {
			if ( ((( $ano % 4) == 0) && (( $ano % 100) != 0) ) || (( $ano % 400) == 0) ) {
				if ( ( $dia < 1) || ( $dia > 29) ) {
					echo "Data incorreta.<br>";
					$camposOK = false;
				}
			} else {
				if ( ( $dia < 1) || ( $dia > 28) ) {
					echo "Data incorreta.<br>";
					$camposOK = false;
				}
			}
		} else {
			echo "Data incorreta.<br>";
			$camposOK = false;
			}

		if($arquivo['error']!= 0 || $arquivo['size']== 0) {
			echo "Erro no envio do arquivo <br>";
			$camposOK = false;
		}
		if($arquivo['size']> 100000) {
			echo "Tamanho maior que o permitido <br>";
			$camposOk = false;
		}
		if($arquivo['type']!= "image/gif" && $arquivo['type']!= "image/jpg" &&
		   $arquivo['type']!= "image/png" && $arquivo['type']!= "image/jpeg"){
			echo "Tipo de arquivo não permitido <br>";
			$camposOK = false;
		}

		 $file_src = '../tmp/'.$_FILES['txtFoto']['name'];
		
		if(!move_uploaded_file($_FILES['txtFoto']['tmp_name'],$file_src)) {
			echo "Erro ao mover o arquivo <br>";
			$camposOK = false;
		}		
		
		
		
		if($camposOK){
			echo "<table border='0' cellpading='5'>";
			echo "<tr><td>Foto: </td><td><img height='120' src='$file_src' ></td></tr>";
			echo "<tr><td>Nome: </td><td><b>$nome</b></td></tr>";
			echo "<tr><td>Data de Nascimento: </td><td><b>$dtNasc</b></td></tr>";
		}		
		
	?>

</body>

</html>
