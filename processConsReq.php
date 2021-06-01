<?php
require "conexaoMysql.php";
$pdo = mysqlConnect();

$req = $_GET["req"] ?? "";
$esp = $_GET["esp"] ?? "";
$data = $_GET["data"] ?? "";
$med = $_GET["med"] ?? "";

if($req == 'esp'){ // Se o pedido for as especialidades…
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
}else if($req == 'med'){ // Se o pedido for os médicos…
    // Seleciona os médicos apenas da especialidade requerida
    $sql = <<<SQL
    SELECT m.codigo, p.nome
    FROM TF_medico m
    INNER JOIN TF_pessoa p on p.codigo = m.codigo
    WHERE m.especialidade = '$esp'
    SQL;

    try {
        $stmt = $pdo->query($sql);
        $response = [];

        while($row = $stmt->fetch()){
            $response[] = $row; // Adicionando cada especialidade na array de resposta…
        }
        
        // echo '$esp = ' . $esp . ' ' . 'row = ' . json_encode($row) . ' ' . json_encode($response);
        echo json_encode($response);

    } catch (Exception $e) {
        echo json_encode(null);
    }
}else if($req='hora'){
    // Seleciona os horários disponíveis do médico selecionado
    $sql = <<<SQL
    SELECT horario
    FROM TF_agenda
    WHERE codigomedico = '$med' and dataconsulta = '$data'
    SQL;

    try {
        $stmt = $pdo->query($sql);

        // A array com os horários disponíveis começa com todos os do funcionamento da clínica
        $response = ['08:00:00','09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00','17:00:00'];

        $row = $stmt->fetchColumn();
        while($row){
            // Agora cada horário já na agenda do médico é retirado da array de horários disponíveis
            $response = array_diff($response, array($row));            
            $row = $stmt->fetchColumn();
        }

        echo json_encode($response);

    } catch (Exception $e) {
        echo json_encode(null);
    }
}
?>