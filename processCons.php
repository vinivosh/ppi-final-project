<?php
require "conexaoMysql.php";
$pdo = mysqlConnect();

// $especialidade = $_POST["especialidade"] ?? "";
// O nome do médico é exibido no formulário, mas o value é o código dele na verdade!
$codigoMedico = $_POST["medico"] ?? ""; 
$dataConsulta = $_POST["dataConsulta"] ?? "";
$horaConsulta = $_POST["horaConsulta"] ?? "";
$nome = $_POST["nome"] ?? "";
$sexo = $_POST["sexo"] ?? "";
$email = $_POST["email"] ?? "";

$email = trim($email);
$nome = trim($nome);

// Usando prepared statements para evitar ataques de SQL injection, já que os dados inseridos vieram de um formulário preenchido
$sql = <<<SQL
INSERT INTO TF_agenda (dataconsulta, horario, nome, sexo, email, codigomedico)
VALUES (?,?,?,?,?,?)
SQL;

try {
    // $pdo->beginTransaction();
    $stmt = $pdo->prepare($sql);

    if (!$stmt->execute([
        $dataConsulta, $horaConsulta, $nome, $sexo, $email, $codigoMedico
    ])) throw new Exception('Falha na inserção de consulta…');
    // $pdo->commit();
    
    header("location: agendarCons.php?sucesso=true");
    exit();
    } 
    catch (Exception $e) {
    // $pdo->rollBack();
    if ($e->errorInfo[1] === 1062){
        header("location: agendarCons.php?sucesso=false");
        exit('Dados duplicados: ' . $e->getMessage());
    }
    else{
        header("location: agendarCons.php?sucesso=false");
        exit('Falha ao cadastrar a consulta: ' . $e->getMessage());
    }
    }
?>