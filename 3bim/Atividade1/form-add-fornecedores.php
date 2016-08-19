<?php
    require 'init.php';
?>
<div class="conteudo">
<html lang="pt-br">
    <head>
        <title>Envio de dados</title>
        <meta charset="utf-8">
        <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
        <script>
            $(document).ready(function(){
            $("#data").mask("99/99/9999");
            });
        </script>
    </head>
    <body>
        <form method ="post" name="formCadastro" action ="add-fornecedores.php" enctype="multipart/form-data">
        <h1>Cadastro de Fornecedores</h1>
            <table width="100%">
                <tr>
                    <th width="18%">Nome</th>
                    <td width="82%"><input type="text" name="txtNome"></td>
                 </tr>
                <tr>
                    <th>Data Fundação</th>
                    <td><input type="text" id="calendario" name="txtData"  readonly></td>
                    <img src="images/calendario.png" id="calendario1" onclick="ativa()">
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="text" name="txtEmail"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="btnEnviar" value="Cadastrar"></td>
                    <td><input type="reset" name="btnLimpar" value="Limpar"></td>
                </tr>
            </table>
        </form>
    </body>    
</html>
</div>