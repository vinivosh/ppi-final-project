<?php
require "conexaoMysql.php";
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

$passHash = password_hash($senha, PASSWORD_DEFAULT);

try{
    // Usando prepared statements para evitar ataques de SQL injection, já que os dados inseridos vieram de um formulário preenchido
    $sql = <<<SQL
    INSERT INTO T7E3_cadastros (email, passHash)
    VALUES (?, ?)
    SQL;

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email, $passHash]);
}catch (Exception $e){
    if ($e->errorInfo[1] === 1062) exit('Dados duplicados: ' . $e->getMessage());
    else exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
?>