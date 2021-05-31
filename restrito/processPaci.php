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
$peso = $_POST["peso"] ?? "";
$altura = $_POST["altura"] ?? "";
$tiposanguineo = $_POST["tiposanguineo"] ?? "";
$email = trim($email);
$cep = trim($cep);

$senhahash = password_hash($senha,PASSWORD_DEFAULT);


try{
    // Usando prepared statements para evitar ataques de SQL injection, já que os dados inseridos vieram de um formulário preenchido
    $sqlpessoa = <<<SQL
    INSERT INTO TF_pessoa (nome,sexo,email,telefone,cep,logradouro,cidade,estado)
    VALUES (?,?,?,?,?,?,?,?)
    SQL;

    $sqlpac = <<<SQL
    INSERT INTO TF_paciente (codigo,peso,altura,tiposanguineo)
    VALUES (?,?,?,?)
    SQL;

    try {
        $pdo->beginTransaction();

        $stmtp = $pdo->prepare($sqlpessoa);
        if (!$stmtp->execute([
          $nome,$sexo,$email,$telefone,
          $cep,$logradouro,$cidade,$estado
        ])) throw new Exception('Falha na inserção de pessoa');
      
        $codigopessoa = $pdo->lastInsertId();
        
        $stmtpac = $pdo->prepare($sqlpac);
        if (!$stmtpac->execute([
          $codigopessoa, $peso, $altura, $tiposanguineo
        ])) throw new Exception('Falha na inserção de paciente');
        
        $pdo->commit();
      
        header("location: ../index.php");
        exit();
      } 
      catch (Exception $e) {
        $pdo->rollBack();
        if ($e->errorInfo[1] === 1062)
          exit('Dados duplicados: ' . $e->getMessage());
        else
          exit('Falha ao cadastrar os dados: ' . $e->getMessage());
      }
}catch (Exception $e){
    if ($e->errorInfo[1] === 1062) exit('Dados duplicados: ' . $e->getMessage());
    else exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
?>