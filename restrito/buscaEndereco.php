<?php
require_once "../conexaoMysql.php";

$pdo = mysqlConnect();
$cep = $_GET["cep"] ?? '';

class Endereco
{
  public $logradouro;
  public $estado;
  public $cidade;

  function __construct($logradouro, $estado, $cidade)
  {
    $this->logradouro = $logradouro;
    $this->estado = $estado; 
    $this->cidade = $cidade;
  }
}

// Utilizando prepared statements para proteção contra um ataque de injeção SQL, já que o campo "cep" foi obtido de um fomulário preenchido pelo usuário
$sql = <<<SQL
    SELECT logradouro, estado, cidade
    FROM TF_endereco_aux
    WHERE cep = ?
    SQL;

$stmt = $pdo->prepare($sql);
$stmt->execute([$cep]);

$row = $stmt->fetch();

$endereco = new Endereco($row['logradouro'], $row['estado'], $row['cidade']);

echo json_encode($endereco);