<?php

require_once "conexaoMysql.php";
require_once "autenticacao.php";

session_start();
$pdo = mysqlConnect();
$isLogged = checkLogged($pdo);

// echo json_encode($isLogged);
// echo json_encode($_SESSION['emailUsuario']);
// echo json_encode($_SESSION['tipoDeUsuario']);
// echo json_encode($_SESSION['loginString']);


// $_SESSION['tipoDeUsuario']

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset ="UTF-8">
    <title> Clínica dos Lolzeiros</title>
    <meta name="autor" content="Adib Cecilio Prado Domingos, Vinícius Henrique Almeida Praxedes e Yan Damasceno Dias">
    <meta name="description" content="description">
    <link rel="stylesheet" href="mainStyle.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <header><h1 class="mb-0">Clinica dos Lolzeiros</h1></header>

    <nav>
        <h2>Menu de navegação</h2>
        <ul>
            <li><a href="/index.php">Inicio</a></li>
            <li><a href="/galeria.php">Galeria</a></li>
            <li><a href="/novoEndereco.php">Novo Endereço</a></li>
            <li><a href="/login.php">Login</a></li>
            <li><a href="/agendarConsulta.php">Agendar Consulta</a></li><br>

            <li class="apenasFunc"><a href="/restrito/cadastroFunc.php">Cadastrar Funcionários</a></li>
            <li class="apenasFunc"><a href="/restrito/cadastroPaci.php">Cadastrar Pacientes</a></li>
            <li class="apenasFunc"><a href="/restrito/listarFunc.php">Listar Funcionários</a></li>
            <li class="apenasFunc"><a href="/restrito/listarPaci.php">Listar Pacientes</a></li>
            <li class="apenasFunc"><a href="/restrito/listarEnde.php">Listar Endereços</a></li>
            <li class="apenasFunc"><a href="/restrito/listarCons.php">Listar Consultas</a></li>
            <li class="apenasMedi"><a href="/restrito/listarMinh.php">Minhas Consultas</a></li>
        </ul>
    </nav>
    <hr>
    
    <main>  
        <div class="container">
            <article>
                <h2>Sobre a Clinica</h2>
                <hr>
                <h3>Objetivos</h3>
                <ul>
                <li>A Clinica dos Lolzeiros auxilia viciados em jogos digitais a reabilitarem sua vida social e perceberem que a vida não é somente um jogo.</li>
                <li>Buscamos melhorar o relacionamento dos dependentes com seus familiares.</li>
                <li>Visamos reduzir o stress que o viciado passa no dia-a-dia.</li>
                </ul>
                <hr>
            </article>

            <article>
                <h3>Valores</h3>
                <ul>
                    <li>Acreditamos que qualquer pessoa independente do grau do vício em jogos irá obter uma melhoria na qualidade de vida ao longo do tratamento.</li>
                    <li>Prezamos muito a privacidade de qualquer indivíduo, portanto não se sinta intimidado para participar do nosso tratamento!</li>
                </ul>
            </article>
            
            <hr>
            <img src="images/clinicalol.jpg" alt="canada1" width="900" height="500" class="center">
        </div>
    </main> 

    <script type="text/javascript">
        window.onload = () => {
            let isLogged = "<?php echo json_encode($isLogged); ?>"
            // console.log('Está logado? ' + isLogged)
            // console.log("<?php echo $_SESSION['tipoDeUsuario']; ?>")

            // Modifica a navbar de acordo com o tipo de usuário logado
            if (isLogged){                
                if ("<?php echo $_SESSION['tipoDeUsuario']; ?>" == 'medico'){
                    let apenasMedi = document.querySelectorAll('.apenasMedi')
                    apenasMedi.forEach((item) => item.style.display = 'inline')
                    apenasMedi = document.querySelectorAll('.apenasFunc')
                    apenasMedi.forEach((item) => item.style.display = 'inline')
                    
                }else if ("<?php echo $_SESSION['tipoDeUsuario']; ?>" == 'funcionario'){
                    let apenasFunc = document.querySelectorAll('.apenasFunc')
                    apenasFunc.forEach((item) => item.style.display = 'inline')
                }
            }
        }
    </script>
</body>
</html>