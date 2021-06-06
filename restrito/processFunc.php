<?php
require "../conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$sexo = $_POST["sexo"] ?? "";
$email = $_POST["email"] ?? "";
$telefone = $_POST["telefone"] ?? "";
$cep = $_POST["cep"] ?? "";
$logradouro = $_POST["logradouro"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estado"] ?? "";
$dataContrato = $_POST["dataContrato"] ?? "";
$salario = $_POST["salario"] ?? "";
$senha = $_POST["senha"] ?? "";
$especialidade = $_POST["especialidade"] ?? "";
$crm = $_POST["crm"] ?? "";
$email = trim($email);
$cep = trim($cep);

$senhahash = password_hash($senha,PASSWORD_DEFAULT);
// Usando prepared statements para evitar ataques de SQL injection, já que os dados inseridos vieram de um formulário preenchido
$sqlpessoa = <<<SQL
INSERT INTO TF_pessoa (nome,sexo,email,telefone,cep,logradouro,cidade,estado)
VALUES (?,?,?,?,?,?,?,?)
SQL;

$sqlfunc = <<<SQL
INSERT INTO TF_funcionario (codigo,datacontrato,salario,hash_senha)
VALUES (?,?,?,?)
SQL;

$sqlmed = <<<SQL
INSERT INTO TF_medico (codigo,especialidade,crm)
VALUES (?,?,?)
SQL;

try {
  $pdo->beginTransaction();

  $stmtp = $pdo->prepare($sqlpessoa);
  if (!$stmtp->execute([
    $nome,$sexo,$email,$telefone,
    $cep,$logradouro,$cidade,$estado
  ])) throw new Exception('Falha na inserção de pessoa');
  
  $codigopessoa = $pdo->lastInsertId();
  
  $stmtf = $pdo->prepare($sqlfunc);
  if (!$stmtf->execute([
    $codigopessoa, $dataContrato, $salario, $senhahash
  ])) throw new Exception('Falha na inserção de funcionário');
  
  $stmtm = $pdo->prepare($sqlmed);
  if($crm != NULL && $crm != '') {
    if (!$stmtm->execute([
      $codigopessoa, $especialidade, $crm
      ])) throw new Exception('Falha na inserção de médico');
      
  }
  $pdo->commit();
  
  header("Location: cadastroFunc.php?sucesso=true");
  exit();
  } 
  catch (Exception $e) {
  $pdo->rollBack();
  if ($e->errorInfo[1] === 1062){
    header("Location: cadastroFunc.php?sucesso=false");
    exit('Dados duplicados: ' . $e->getMessage());
  }

  else{
    header("Location: cadastroFunc.php?sucesso=false");
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
  }
  }

?>