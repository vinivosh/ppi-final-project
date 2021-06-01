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
    <title> Galeria</title>
    <meta name="description" content="Adib Cecilio Prado Domingos e o autor">
    <link rel="stylesheet" href="mainStyle.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     <style>

        table{ margin-left: auto;  margin-right: auto;}
        img{
			width: 225pt;
			height: 150pt;
			border-radius: 15pt;
			padding:10pt;
            border:1pt solid white;
		}
</style> 
</head>

<body>
    <header><h1 class="mb-0">Clinica dos Lolzeiros</h1>
        <?php echo navbar()?> <!-- Navbar completa -->
    </header>
<main>
        <h2> Galeria de Fotos</h2>
        <hr>
        <div>
            <table>
                <tr>
                    <td><img src="images/clinica1.jpeg" alt="clinica1" width="300" height="200"></td>
                    <td><img src="images/clinica2.jpeg" alt="clinica2" width="300" height="200"></td>
                </tr>
                <tr>
                    <td><img src="images/clinica3.jpeg" alt="clinica3" width="300" height="200"></td>
                    <td><img src="images/clinica4.jpeg" alt="clinica4" width="300" height="200"></td>
                </tr>
                <tr>
                    <td><img src="images/clinica5.jpeg" alt="clinica5" width="300" height="200"></td>
                    <td><img src="images/clinica6.jpeg" alt="clinica6" width="300" height="200"></td>
                </tr>
            </table>    
            <hr>
            <!-- <div class="mapa">
                <iframe width="500" height="500" src="https://maps.google.com/?q=49.277428703380835,-123.10399289313456&output=svembed" allowfullscreen>
            </div> -->
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