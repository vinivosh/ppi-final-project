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
    <h2>Listar Endereços</h2>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>CEP</th>
          <th>Logradouro</th>
          <th>Cidade</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $sql = <<<SQL
        SELECT cep, logradouro, cidade, estado from TF_endereco_aux
        SQL;

        $stmt = $pdo->query($sql);
        // $stmt->execute([$codigo]);

        while ($row = $stmt->fetch()){
          // Tratando o email da tabela para evitar ataques XSS, já que é um campo produzido pelo usuário através do formulário
          $cep = htmlspecialchars($row['cep']);
          $logradouro = htmlspecialchars($row['logradouro']);
          $cidade = htmlspecialchars($row['cidade']);

          echo <<<HTML
          <tr>
            <td>$cep</td>
            <td>$logradouro</td>
            <td>$cidade</td>
            <td>{$row['estado']}</td>
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