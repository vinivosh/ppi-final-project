<?php

require_once "conexaoMysql.php";
require_once "autenticacao.php";
require_once "scriptsAux/navbarHTML.php";
session_start();
$pdo = mysqlConnect();
$isLogged = checkLogged($pdo);


if($_SERVER["REQUEST_METHOD"] == "POST"){
  require "conexaoMysql.php";
  $pdo = mysqlConnect();
  $cep = $logradouro = $cidade = $estado = "";
  if(isset($_POST["cep"]))
    $cep = $_POST["cep"];
  if(isset($_POST["logradouro"]))
    $logradouro = $_POST["logradouro"];
  if(isset($_POST["cidade"]))
    $cidade = $_POST["cidade"];    
  if(isset($_POST["estado"]))
    $estado = $_POST["estado"];

  try {

    $sql = <<<SQL
    INSERT INTO TF_endereco_aux (cep, logradouro, cidade, estado)
    VALUES (?, ?, ?, ?)
    SQL;

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cep, $logradouro, $cidade, $estado]);

    header("Location: cadastrarEndereco.php?sucesso=true");

    exit();
  } 
  catch (Exception $e) { 
    if ($e->errorInfo[1] === 1062)
      exit('Dados duplicados: ' . $e->getMessage());
    else
      exit('Falha ao cadastrar os dados: ' . $e->getMessage());
  }
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset ="UTF-8">
    <title>Cadastro de Enderecos</title>
    <meta name="autor" content="Adib Cecilio Prado Domingos, Vinícius Henrique Almeida Praxedes e Yan Damasceno Dias">
    <meta name="description" content="description">
    <link rel="stylesheet" href="mainStyle.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <header><h1 class="mb-0">Clinica dos Lolzeiros</h1>
      <?php echo navbar()?> <!-- Navbar completa -->
    </header>
	
	<div class="container">
		<form action="cadastrarEndereco.php" method="post">
		<div class="row">
			<div class="col-sm-4"><label for="cep" class="form-label">CEP</label><input type="text" class="form-control" id="cep" name="cep"></div>
			<div class="col-sm-4"><label for="logradouro" class="form-label">Logradouro</label><input type="text" class="form-control" id="logradouro" name="logradouro"></div>
			<div class="col-sm-6"><label for="cidade" class="form-label">Cidade</label><input type="text" class="form-control" id="cidade" name="cidade"></div>
			<div class="col-sm-6">
        <label for="estado" class="form-label">Estado</label>
        <select id="estado" class="form-select" name="estado">
          <option>AC</option><option>AL</option><option>AP</option>
          <option>AM</option><option>BA</option><option>CE</option>
          <option>DF</option><option>ES</option><option>GO</option>
          <option>MA</option><option>MT</option><option>MS</option>
          <option>MG</option><option>PA</option><option>PB</option>
          <option>PR</option><option>PE</option><option>PI</option>
          <option>RJ</option><option>RN</option><option>RS</option>
          <option>RO</option><option>RR</option><option>SC</option>
          <option>SP</option><option>SE</option><option>TO</option>
        </select>
			</div>
	        <div class="col-12"><button type="submit" class="btn btn-outline-primary btn-lg">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
					<path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
					<path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
				  </svg>
				Enviar</button></div>		
            
		</div>	

	</form>
	</div> 
	
  </body>

  <script type="module">
         console.log("entrou no js")
         import {navbarDin} from "./scriptsAux/navbarDinamica.js"
         window.onload = () => {
             console.log("entrou no onload")
             navbarDin("<?php echo json_encode($isLogged); ?>","<?php echo $_SESSION['tipoDeUsuario']; ?>")
        }
    </script>
</html>