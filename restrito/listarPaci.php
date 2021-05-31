<?php

require_once "../conexaoMysql.php";
require_once "../autenticacao.php";
require_once "../scriptsAux/navbarHTML.php";

session_start();
$pdo = mysqlConnect();
exitWhenNotLogged($pdo);
$isLogged = checkLogged($pdo);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset ="UTF-8">
    <title>Lista de Pacientes</title>
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
     <h2>Listar Todos Pacientes</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>CEP</th>
                    <th>Logradouro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Peso</th>
                    <th>Altura</th>
                    <th>Tipo Sanguíneo</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = <<<SQL
                SELECT nome, sexo, email, telefone, cep, logradouro, cidade, estado, peso, altura, tiposanguineo
                FROM TF_pessoa PESS INNER JOIN TF_paciente PACI on PACI.codigo = PESS.codigo
                SQL;

                $stmt = $pdo->query($sql);

                while ($row = $stmt->fetch()){
                    // Tratando os dados que vieram de algum formulário que o usuário preencheu para evitar ataques XSS (não é necessário para os que vierakm de menus dropdown)
                    $nome = htmlspecialchars($row['nome']);
                    $email = htmlspecialchars($row['email']);
                    $telefone = htmlspecialchars($row['telefone']);
                    $cep = htmlspecialchars($row['cep']);
                    $logradouro = htmlspecialchars($row['logradouro']);
                    $cidade = htmlspecialchars($row['cidade']);
                    $peso = htmlspecialchars($row['peso']);
                    $altura = htmlspecialchars($row['altura']);
                    $tiposanguineo = htmlspecialchars($row['tiposanguineo']);

                    echo <<<HTML
                    <tr>
                        <td>$nome</td>                            
                        <td>{$row['sexo']}</td>
                        <td>$email</td>
                        <td>$telefone</td>
                        <td>$cep</td>
                        <td>$logradouro</td>
                        <td>$cidade</td>
                        <td>{$row['estado']}</td>
                        <td>$peso</td>
                        <td>$altura</td>
                        <td>$tiposanguineo</td>
                    </tr>
                    HTML;
                }
                ?>

            </tbody>
        </table>
    </main>

  </body>

  <script type="module">
        import {navbarDin} from "../scriptsAux/navbarDinamica.js"
         
        window.onload = () => {
            navbarDin("<?php echo json_encode($isLogged); ?>","<?php echo $_SESSION['tipoDeUsuario']; ?>")
        }
    </script>
</html>