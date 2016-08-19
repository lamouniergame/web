<?php
    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
     /* SQL para contar o total de registros */
    $sql_count = "SELECT COUNT(*) AS total FROM clientes ORDER BY nomeCliente ASC";
    // SQL para selecionar os registros
    $sql = "SELECT idCliente, nomeCliente, email, dataCliente FROM clientes ORDER BY nomeCliente ASC";
    // conta o total de registros
    $stmt_count = $PDO->prepare($sql_count);
    $stmt_count->execute();
    $total = $stmt_count->fetchColumn();
    // seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>                                     
    <div class="conteudo">
        <p id="titulo"> CADASTRO DE CLIENTES </p>
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
                <?php while($cliente = $stmt->fetch(PDO::FETCH_ASSOC)): ?> 
                <tr>
                    <td><?php echo $cliente['nomeCliente'] ?></td>
                    <td><?php echo $cliente['email'] ?></td>
                    <td><?php echo dateConvert($cliente['dataCliente'])  ?></td>
                    <td> 
                        <a href="form-edit-clientes.php?id=<?php echo $cliente['idCliente'] ?>"> Editar
                        </a>
                        <a href="delete-clientes.php?id=<?php echo $cliente['idCliente'] ?>"
                           onclick="return confirm('Tem certeza que deseja excluir?');">  Excluir
                        </a>
                    </td>
                </tr>S
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p> Nenhum usuário registrado</p>
        <?php endif; ?>
        <br><input href="form-add-clientes.php" type="button" name="btn-novo" value="Novo" onclick="subst(this);">
        <input href="relatorio.php" type="button" value="Gerar Relatório" onclick="subst(this);">
        <!--<button type="button"><a class="botao_relatorio" href="relatorio.php">Gerar Relatório</a></button>-->         
    </div>
    







