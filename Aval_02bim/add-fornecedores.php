<?php
 require_once 'init.php';
 include_once 'fornecedores.class.php';
 // pega os dados do formulário
 $nomeFornecedor = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
 $email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
 $dataFundacao = isset($_POST['txtData']) ? $_POST['txtData'] : null;
 
 // validação simples se campos estão vazios
 
 if (empty($nomeFornecedor) || empty($dataFundacao) || empty($email)){
    echo "Campos devem ser preenchidos!!";
    exit;
 }
 
 //FAZER VERIFICACAO 
 
 
 // instancia objeto aluno
 $fornecedor = new fornecedores($nomeFornecedor, $email, $dataFundacao);

 // insere no BD
 $PDO = db_connect();
 $sql = "INSERT INTO fornecedores(nomeFornecedor, email, dataFundacao) VALUES (:nomeFornecedor, :email, :dataFundacao)";
 $stmt = $PDO->prepare($sql);
 $stmt->bindParam(':nomeFornecedor', $fornecedor->getNome());
 $stmt->bindParam(':email', $fornecedor->getEmail());
 $stmt->bindParam(':dataFundacao', $fornecedor->getDataFundacao());
 if($stmt->execute()){
    header ("Location:index.html");
 }else{
    echo "Erro ao cadastrar!!";
    print_r($stmt->errorInfo());
 }
?>