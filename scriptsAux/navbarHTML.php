<?php
    session_start();
    function navbar(){
    $valor=  $_SESSION['emailUsuario'];
    $retorno= <<<HTML
    <nav>
        <h2>Menu de navegação</h2>
        <ul>
            <li><a href="http://vinivosh.atwebpages.com/trabalhoFinal/index.php">Inicio</a></li>
            <li><a href="http://vinivosh.atwebpages.com/trabalhoFinal/galeria.php">Galeria</a></li>
            <li><a href="http://vinivosh.atwebpages.com/trabalhoFinal/cadastrarEndereco.php">Novo Endereço</a></li>
            <li class="apenasLoggedOff"><a href="http://vinivosh.atwebpages.com/trabalhoFinal/login.php">Login</a></li>
            <li><a href="http://vinivosh.atwebpages.com/trabalhoFinal/agendarCons.php">Agendar Consulta</a></li><br class="apenasFunc"><hr>

            <li class="apenasFunc"><a href="http://vinivosh.atwebpages.com/trabalhoFinal/restrito/cadastroFunc.php">Cadastrar Funcionários</a></li>
            <li class="apenasFunc"><a href="http://vinivosh.atwebpages.com/trabalhoFinal/restrito/cadastroPaci.php">Cadastrar Pacientes</a></li>
            <li class="apenasFunc"><a href="http://vinivosh.atwebpages.com/trabalhoFinal/restrito/listarFunc.php">Listar Funcionários</a></li>
            <li class="apenasFunc"><a href="http://vinivosh.atwebpages.com/trabalhoFinal/restrito/listarPaci.php">Listar Pacientes</a></li>
            <li class="apenasFunc"><a href="http://vinivosh.atwebpages.com/trabalhoFinal/restrito/listarEnde.php">Listar Endereços</a></li>
            <li class="apenasFunc"><a href="http://vinivosh.atwebpages.com/trabalhoFinal/restrito/listarCons.php">Listar Consultas</a></li>
            <li class="apenasMedi"><a href="http://vinivosh.atwebpages.com/trabalhoFinal/restrito/listarMinh.php">Minhas Consultas</a></li> <br class="apenasFunc"><hr>

            <div id="logadoComo">
                <li class="apenasFunc">Logado como: $valor </li>
                <li class="apenasFunc mx-2"><a href="http://vinivosh.atwebpages.com/trabalhoFinal/logout.php">Logout</a></li>
            </div>
        </ul>
    </nav>
    <hr>
    HTML;
    return $retorno;
    }
?>