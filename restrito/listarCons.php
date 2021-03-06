<?php

require_once "../conexaoMysql.php";
require_once "../autenticacao.php";
require_once "../scriptsAux/navbarHTML.php";
require_once "../scriptsAux/footerHTML.php";

session_start();
$pdo = mysqlConnect();
exitWhenNotLogged($pdo);
$isLogged = checkLogged($pdo);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset ="UTF-8">
  <title>Lista de Funcionário</title>
  <meta name="autor" content="Adib Cecilio Prado Domingos, Vinícius Henrique Almeida Praxedes e Yan Damasceno Dias">
  <meta name="description" content="description">
  <link rel="stylesheet" href="../mainStyle.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
  <header><h1 class="mb-0">Clinica dos Lolzeiros</h1>
    <?php echo navbar()?> <!-- Navbar completa -->
  </header>
  
  <main>
    <h2> Listagem de todas as consultas</h2>
    
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Data da Consulta</th>
          <th>Horario</th>
          <th>Paciente</th>
          <th>Sexo do Paciente</th>
          <th>Email do Paciente</th>
          <th>Medico</th>
          <th>Especialidade do Medico</th>
          <th>CRM do Medico</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $sql = <<<SQL
        SELECT ag.dataconsulta, ag.horario, ag.nome as NomePaciente, ag.sexo as SexoPaciente, ag.email as EmailPaciente,
        p.nome as NomeMedico,m.especialidade as EspecialidadeMedico,m.crm
        from TF_agenda ag
        inner join TF_pessoa p on p.codigo = ag.codigomedico
        inner join TF_medico m on m.codigo = ag.codigomedico
        SQL;

        $stmt = $pdo->query($sql);
        // $stmt->execute([$codigo]);

        while ($row = $stmt->fetch()){
          // Tratando o email da tabela para evitar ataques XSS, já que é um campo produzido pelo usuário através do formulário
          $dataconsulta = htmlspecialchars($row['dataconsulta']);
          $horario = htmlspecialchars($row['horario']);
          $NomePaciente = htmlspecialchars($row['NomePaciente']);
          $EmailPaciente = htmlspecialchars($row['EmailPaciente']);
          $NomeMedico = htmlspecialchars($row['NomeMedico']);
          $EspecialidadeMedico = htmlspecialchars($row['EspecialidadeMedico']);
          $crm = htmlspecialchars($row['crm']);
          
          echo <<<HTML
          <tr>
            <td>$dataconsulta</td>
            <td>$horario</td>
            <td>$NomePaciente</td>
            <td>{$row['SexoPaciente']}</td>
            <td>$EmailPaciente</td>
            <td>$NomeMedico</td>
            <td>$EspecialidadeMedico</td>
            <td>$crm</td>
          </tr>
          HTML;
        }
        ?>

      </tbody>
    </table>
  </main>
  <?php echo footer()?> <!-- footer completa -->

  <script type="module">
    import {navbarDin} from "../scriptsAux/navbarDinamica.js"
     
    window.onload = () => {
      navbarDin("<?php echo json_encode($isLogged); ?>","<?php echo $_SESSION['tipoDeUsuario']; ?>")
    }
  </script>
</body>
</html>