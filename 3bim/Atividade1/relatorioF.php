<?php
  include 'funcoes.php';
  spl_autoload_register(function ($class_name)
  {
	if(file_exists('ado/'.$class_name.'.class.php')){
		include 'ado/'.$class_name.'.class.php';
	}
	if(file_exists('html/'.$class_name.'.class.php'))
		include 'html/'.$class_name.'.class.php';
  });
  //CRIA A PÁGINA  
  
  $html = new TElement('html');
  $html->lang = 'pt-br';
  $head = new TElement('head');
  $html->add($head); //adiciona ao html
  $meta = new TElement('meta');
  $meta->charset = 'utf-8';
  $head->add($meta);
	
  $body = new TElement('body');
  $body->bgcolor = '#ffffff';
  $html->add($body);
  
  $conteudo = new TElement('div');
  $conteudo->class="conteudo";
  $body->add($conteudo);
  
  // define a consulta SQL
  $sql = "SELECT idFornecedor, nomeFornecedor, email, dataFundacao FROM fornecedores";
  try
  {
    // abre a conexão com a base BD_CEFETMG
    $conn = TConnection::open('config/my_config.ini');
    // executa a instrução SQL
    $result = $conn->query($sql);
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
	 $dados[] = array($row['idFornecedor'], $row['nomeFornecedor'], $row['email'], dateConvert($row['dataFundacao']));
    }
    //fecha a conexão
    $conn = null;
  } catch (Exception $e) {
    // exibe a mensagem de erro
    print "Erro! " . $e->getMessage() . "<br/>";
  }
  
  
  $tabela = new TTable;
  //define algumas propriedades
  $tabela->width = 600;
  $tabela->border = 1;
  //instancia uma linha para o cabeçalho
  $cabecalho = $tabela->addRow();
  //define a cor de fundo
  $cabecalho->bgcolor = '#a0a0a0';
  //adiciona células
  $cabecalho->addCell('Id');
  $cabecalho->addCell('Nome');
  $cabecalho->addCell('E-Mail');
  $cabecalho->addCell('Data');

  $j=0;
  $total = 0;
  //percorre os dados
  foreach($dados as $pessoa){
	
    // verifica qual cor utilizará para o fundo
    $bgcolor = ($j % 2) == 0 ? '#d0d0d0' : '#ffffff';
    // adiciona uma linha para os dados
    $linha = $tabela->addRow();
    $linha->bgcolor = $bgcolor;
    // adiciona as células
    $linha->addCell($pessoa[0]);
    $linha->addCell($pessoa[1]);
    $linha->addCell($pessoa[2]);
    $x = $linha->addCell($pessoa[3]);
    $x->align = 'right';

    $total += $pessoa[3];
    $j++;
  }
  

  // exibe a tabela
  //$tabela->show();
  $body->add($tabela);
  $html->show();
 
?>
