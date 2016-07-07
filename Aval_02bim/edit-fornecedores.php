<?php
    require_once 'init.php';
    require_once 'fornecedores.class.php';
    // pega os dados do formulário
    $id = isset($_POST['id']) ? $_POST ['id'] : null;
    $nomeFornecedor = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
    $email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
    $dataFundacao = isset($_POST['txtData']) ? $_POST['txtData'] : null;
    // validação simples se campos estão vazios
    if (empty($nomeFornecedor) || empty($dataFundacao) || empty($email))
    {
        echo "Campos devem ser preenchidos!!";
        exit;
    }
    // instancia objeto forneceloiro
    $fornecedor = new fornecedores($nomeFornecedor, $email, $dataFundacao);
    // atualiza o BD
    $PDO = db_connect();
    $sql = "UPDATE fornecedores SET nomeFornecedor = :nomeFornecedor,  email= :email, dataFundacao = :dataFundacao
    WHERE idFornecedor = :id";
    $stmt = $PDO->prepare($sql);
    $stmt-> bindParam(':nomeFornecedor',$fornecedor->getNome());
    $stmt-> bindParam(':dataFundacao',$fornecedor->getDataFundacao());
    $stmt-> bindParam(':email',$fornecedor->getEmail());
    $stmt-> bindParam(':id',$id ,PDO :: PARAM_INT);
    if ($stmt->execute())
    {
        header('Location: index.html');
    }
    else
    {
        echo "Erro ao alterar";
        print_r($stmt->errorInfo());
    }
?>