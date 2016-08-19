<?php
 require_once 'init.php';
 include_once 'clientes.class.php';
 // pega os dados do formulário
 $nomeCliente = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
 $email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
 $dataCliente = isset($_POST['txtData']) ? $_POST['txtData'] : null;
 
 // validação simples se campos estão vazios
 
 if (empty($nomeCliente) || empty($dataCliente) || empty($email)){
    echo "Campos devem ser preenchidos!!";
    exit;
 }
 
 //FAZER VERIFICACAO 
 
 
 // instancia objeto aluno
 $cliente = new clientes($nomeCliente, $email, $dataCliente);

 // insere no BD
 $PDO = db_connect();
 $sql = "INSERT INTO clientes(nomeCliente, email, dataCliente) VALUES (:nomeCliente, :email, :dataCliente)";
 $stmt = $PDO->prepare($sql);
 $stmt->bindParam(':nomeCliente', $cliente->getNome());
 $stmt->bindParam(':email', $cliente->getEmail());
 $stmt->bindParam(':dataCliente', $cliente->getDataCliente());
 if($stmt->execute()){
    header ("Location:index.html");
 }else{
    echo "Erro ao cadastrar!!";
    print_r($stmt->errorInfo());
 }
?>