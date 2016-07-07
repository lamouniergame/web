<?php
    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
     /* SQL para contar o total de registros */
    $sql_count = "SELECT COUNT(*) AS total FROM fornecedores ORDER BY nomeFornecedor ASC";
    // SQL para selecionar os registros
    $sql = "SELECT idFornecedor , nomeFornecedor , email , dataFundacao FROM fornecedores ORDER BY nomeFornecedor ASC";
    // conta o total de registros
    $stmt_count = $PDO->prepare($sql_count);
    $stmt_count->execute();
    $total = $stmt_count->fetchColumn();
    // seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>
    <div class="conteudo">
        <p id="titulo"> CADASTRO DE FORNECEDORES </p>
        <p>Total de usuários: <?php echo $total ?></p>
        <?php if($total > 0): ?>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while($fornecedor = $stmt->fetch(PDO::FETCH_ASSOC)): ?> 
                <tr>
                    <td><?php echo $fornecedor['nomeFornecedor'] ?></td>
                    <td><?php echo $fornecedor['email'] ?></td>
                    <td><?php echo dateConvert($fornecedor['dataFundacao'])  ?></td>
                    <td> 
                        <a href="form-edit-fornecedores.php?id=<?php echo $fornecedor['idFornecedor'] ?>"> Editar
                        </a>
                        <a href="delete-fornecedores.php?id=<?php echo $fornecedor['idFornecedor'] ?>"
                           onclick="return confirm('Tem certeza que deseja excluir?');">  Excluir
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p> Nenhum usuário registrado</p>
        <?php endif; ?>
        <br><input href="form-add-fornecedores.php" type="button" name="btn-novo" value="Novo" onclick="subst(this )">
    </div>