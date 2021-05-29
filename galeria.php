<?php

require_once "conexaoMysql.php";
require_once "autenticacao.php";
require_once "scriptsAux/navbarHTML.php";
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
     <!-- <style>

        table{ margin-left: auto;  margin-right: auto;}
        img{
			width: 225pt;
			height: 150pt;
			border-radius: 15pt;
			padding:10pt;
            border:1pt solid white;
		}
        main{		 
        text-align: center;border:1pt solid; padding: 1pt;border-color: white;
         position: absolute;
		 left:50%;
		 transform: translate(-50%,0%);
         border-radius: 15pt; 

</style>  -->
</head>

<body>
    <header><h1>Site do Adib</h1>
        <?php echo navbar()?> <!-- Navbar completa -->
    </header>
    <main>
        <h2> Galeria de Fotos</h2>
        <hr>
        <div>
        <table>
            <tr>
                <td><img src="images/canada1.jpg" alt="canada1" width="300" height="200"></td>
                <td><img src="images/canada2.jpg" alt="canada1" width="300" height="200"></td>
            </tr>
            <tr>
                <td><img src="images/canada3.jpg" alt="canada1" width="300" height="200"></td>
                <td><img src="images/canada4.jpg" alt="canada1" width="300" height="200"></td>
            </tr>
            <tr>
                <td><img src="images/canada5.jpg" alt="canada1" width="300" height="200"></td>
                <td><img src="images/canada6.jpg" alt="canada1" width="300" height="200"></td>
            </tr>
        </table>    
        <hr>
        <div class="mapa">
            <iframe width="500" height="500"
                src="https://maps.google.com/?q=49.277428703380835,-123.10399289313456&output=svembed"
                allowfullscreen>  </iframe>
            </div>
        </div>
    </main>

    <script type="module">
         console.log("entrou no js")
         import {navbarDin} from "./scriptsAux/navbarDinamica.js"
         window.onload = () => {
             console.log("entrou no onload")
             navbarDin("<?php echo json_encode($isLogged); ?>","<?php echo $_SESSION['tipoDeUsuario']; ?>")
        }
    </script>
</body>