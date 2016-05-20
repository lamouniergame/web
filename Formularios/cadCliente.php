<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			echo "<h1>Os dados informados são:</h1>";
			$nome = $_POST["txtNome"];
			$ender = $_POST["textEndereco"];
			$cpf = $_POST["txtCPF"];
			$estado = $_POST["listEstados"];
			$dtNasc = $_POST["txtData"];
			$diaNasc = substr("$dtNasc",0,2);
			$mesNasc = substr("$dtNasc",3,-5);
			$anoNasc = substr("$dtNasc",6);
			$sexo = $_POST["sexo"];
			$cinema = $_POST["checkCinema"];
			$musica = $_POST["checkMusica"];
			$info = $_POST["checkInfo"];
			$login = $_POST["txtLogin"];
			$senha1 = $_POST["txtSenha1"];
			$senha2 = $_POST["txtSenha2"];
			
			$ver = true;
			$verData = true;
		
			
			if($nome == ""){
				echo "Nome incorreto<br>";
				$ver = false;
			}
			if($ender == ""){
				echo "Endereço incompleto<br>";
				$ver = false;
			}
			if($senha1 != $senha2){
				echo "Senha não confere<br>";
				$ver = false;
			}
			
			if($dtNasc == ""){
				$verData = false;
			}
			if(($mesNasc < 1) ||($mesNasc > 12)){
				$verData = false;
			}else if(($diaNasc < 1) || ($diaNasc > 31)){
				$verData = false;
			}else if(($mesNasc == 4) || ($mesNasc == 6) || ($mesNasc == 9) || ($mesNasc == 11) && ($diaNasc == 31)){
				$verData = false;
			}else if($mesNasc == 2){
			}
			
			$isleap = (($anoNasc % 4 == 0) && ($anoNasc % 100 != 0) || ($anoNasc % 400 == 0));
			if(($diaNasc > 29) || ($diaNasc == 29) && ($isleap == false)){
				$verData = false;
			}	
			
			
			if($verData == false){
				echo "<b>Data Inválida</b>";
			}
			
			if(empty($cpf)) {
				echo "<b>CPF Inválido</b>";
			}
 
			// Elimina possivel mascara
			$cpf = ereg_replace('[^0-9]', '', $cpf);
			$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
     
			// Verifica se o numero de digitos informados é igual a 11 
			if (strlen($cpf) != 11) {
				echo "<b>CPF Inválido</b>";
			}
			// Verifica se nenhuma das sequências invalidas abaixo 
			// foi digitada. Caso afirmativo, retorna falso
			else if ($cpf == '00000000000' || 
				$cpf == '11111111111' || 
				$cpf == '22222222222' || 
				$cpf == '33333333333' || 
				$cpf == '44444444444' || 
				$cpf == '55555555555' || 
				$cpf == '66666666666' || 
				$cpf == '77777777777' || 
				$cpf == '88888888888' || 
				$cpf == '99999999999') {
				echo "<b>CPF Inválido</b>";
				// Calcula os digitos verificadores para verificar se o
				// CPF é válido
		    }else{   
         
				for ($t = 9; $t < 11; $t++) {
					for ($d = 0, $c = 0; $c < $t; $c++){
						$d += $cpf{$c} * (($t + 1) - $c);
					}
					$d = ((10 * $d) % 11) % 10;
						if ($cpf{$c} != $d) {
							echo "<b>CPF Inválido</b>";
						}
				}
			}

			
			if($ver){
				echo "<table border='0' cellpadding='5'>";
				echo "<tr><td>Nome:</td><td><b>$nome</b></td></tr>";
				echo "<tr><td>CPF:</td><td><b>$cpf</b></td></tr>";
				echo "<tr><td>Endereco:</td><td><b>$ender</b></td></tr>";
				echo "<tr><td>Estado:</td><td><b>$estado</b></td></tr>";
				echo "<tr><td>Data de nascimento:</td><td><b>$dtNasc</b></td></tr>";
				echo "<tr><td>Sexo:</td><td><b>$sexo</b></td></tr>";
				echo "<tr><td>Login:</td><td><b>$login</b></td></tr>";
				echo "<tr><td>Senha:</td><td><b>$senha1</b></td></tr>";
				echo "<tr><td>Áreas de interesse:</td><td>";
				if($cinema){
					echo "<b>Cinema <br>";
				}
				if($musica){
					echo "Musica <br>";
				}
				if($info){
					echo "Informática<br>";
					echo "</b></td></tr></table>";
				}
			}
			
		?>
	</body>
</html>

