<?php

require_once "conexaoMysql.php";
require_once "autenticacao.php";
require_once "scriptsAux/navbarHTML.php";
require_once "scriptsAux/footerHTML.php";

session_start();
$pdo = mysqlConnect();
$isLogged = checkLogged($pdo);
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
    <header><h1 class="mb-0">Clinica dos Lolzeiros</h1>
       <?php echo navbar()?> <!-- Navbar completa -->
    </header>
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
            <img src="images/clinicalol.jpg" alt="clinicalol" width="900" height="500" class="center">
        </div>
    </main> 
<?php echo footer()?> <!-- footer completa -->
    

    <script type="module">
         console.log("entrou no js")
         import {navbarDin} from "./scriptsAux/navbarDinamica.js"
         window.onload = () => {
             console.log("entrou no onload")
             navbarDin("<?php echo json_encode($isLogged); ?>","<?php echo $_SESSION['tipoDeUsuario']; ?>")
        }
    </script>
</body>
</html>