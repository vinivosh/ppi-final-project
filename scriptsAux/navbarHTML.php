<?php
    session_start();
    function navbar(){
    $valor=  $_SESSION['emailUsuario'];
    $retorno= <<<HTML
    <nav>
        <h2>Menu de navegação</h2>
        <ul>
            <li><a href="http://adibcecilio.atwebpages.com/ppi-final-project/index.php">Inicio</a></li>
            <li><a href="http://adibcecilio.atwebpages.com/ppi-final-project/galeria.php">Galeria</a></li>
            <li><a href="http://adibcecilio.atwebpages.com/ppi-final-project/cadastrarEndereco.php">Novo Endereço</a></li>
            <li class="apenasLoggedOff"><a href="http://adibcecilio.atwebpages.com/ppi-final-project/login.php">Login</a></li>
            <li><a href="http://adibcecilio.atwebpages.com/ppi-final-project/agendarConsulta.php">Agendar Consulta</a></li><br class="apenasFunc"><hr>

            <li class="apenasFunc"><a href="http://adibcecilio.atwebpages.com/ppi-final-project/restrito/cadastroFunc.php">Cadastrar Funcionários</a></li>
            <li class="apenasFunc"><a href="http://adibcecilio.atwebpages.com/ppi-final-project/restrito/cadastroPaci.php">Cadastrar Pacientes</a></li>
            <li class="apenasFunc"><a href="http://adibcecilio.atwebpages.com/ppi-final-project/restrito/listarFunc.php">Listar Funcionários</a></li>
            <li class="apenasFunc"><a href="http://adibcecilio.atwebpages.com/ppi-final-project/restrito/listarPaci.php">Listar Pacientes</a></li>
            <li class="apenasFunc"><a href="http://adibcecilio.atwebpages.com/ppi-final-project/restrito/listarEnde.php">Listar Endereços</a></li>
            <li class="apenasFunc"><a href="http://adibcecilio.atwebpages.com/ppi-final-project/restrito/listarCons.php">Listar Consultas</a></li>
            <li class="apenasMedi"><a href="http://adibcecilio.atwebpages.com/ppi-final-project/restrito/listarMinh.php">Minhas Consultas</a></li> <br class="apenasFunc"><hr>

            <li class="apenasFunc">Logado como: $valor </li>
            <li class="apenasFunc"><a href="http://adibcecilio.atwebpages.com/ppi-final-project/logout.php">Logout</a></li>

        </ul>
    </nav>
    <hr>
    HTML;
    return $retorno;
    }
?>