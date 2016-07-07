<?php
    require_once 'init.php';
    require_once 'clientes.class.php';
    // pega os dados do formulário
    $id = isset($_POST['id']) ? $_POST ['id'] : null;
    $nomeCliente = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
    $email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
    $dataCliente = isset($_POST['txtData']) ? $_POST['txtData'] : null;
    // validação simples se campos estão vazios
    if (empty($nomeCliente) || empty($dataCliente) || empty($email))
    {
        echo "Campos devem ser preenchidos!!";
        exit;
    }
    // instancia objeto cliente
    $cliente = new clientes($nomeCliente, $email, $dataCliente);
    // atualiza o BD
    $PDO = db_connect();
    $sql = "UPDATE clientes SET nomeCliente = :nomeCliente,  email= :email, dataCliente = :dataCliente
    WHERE idCliente = :id";
    $stmt = $PDO->prepare($sql);
    $stmt-> bindParam(':nomeCliente',$cliente->getNome());
    $stmt-> bindParam(':dataCliente',$cliente->getDataCliente());
    $stmt-> bindParam(':email',$cliente->getEmail());
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