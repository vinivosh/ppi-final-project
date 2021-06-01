<?php
require "conexaoMysql.php";
$pdo = mysqlConnect();

$req = $_GET["req"] ?? "";

$sql = <<<SQL
SELECT distinct especialidade
FROM TF_medico
SQL;

try {
    $stmt = $pdo->query($sql);
    $response = [];

    while($row = $stmt->fetchColumn()){
        $response[] = $row; // Adicionando cada especialidade na array de resposta…
    }
    
    echo json_encode($response);

} catch (Exception $e) {
    echo json_encode(null);
}
?>