<?php
    session_start();
    function navbar(){
    $valor=  $_SESSION['emailUsuario'];
    $retorno= <<<HTML
            <nav>
                <h2>Menu de navegação</h2>
                <ul>
                    <li><a href="./index.php">Inicio</a></li>
                    <li><a href="./galeria.php">Galeria</a></li>
                    <li><a href="./cadastrarEndereco.php">Novo Endereço</a></li>
                    <li class="apenasLoggedOff"><a href="./login.php">Login</a></li>
                    <li><a href="./agendarConsulta.php">Agendar Consulta</a></li><br>

                    <li class="apenasFunc"><a href="/restrito/cadastroFunc.php">Cadastrar Funcionários</a></li>
                    <li class="apenasFunc"><a href="/restrito/cadastroPaci.php">Cadastrar Pacientes</a></li>
                    <li class="apenasFunc"><a href="/restrito/listarFunc.php">Listar Funcionários</a></li>
                    <li class="apenasFunc"><a href="/restrito/listarPaci.php">Listar Pacientes</a></li>
                    <li class="apenasFunc"><a href="/restrito/listarEnde.php">Listar Endereços</a></li>
                    <li class="apenasFunc"><a href="/restrito/listarCons.php">Listar Consultas</a></li>
                    <li class="apenasMedi"><a href="/restrito/listarMinh.php">Minhas Consultas</a></li> <br>

                    <li class="apenasFunc">Logado como: $valor </li>
                    <li class="apenasFunc"><a href="./logout.php">Logout</a></li>

                </ul>
            </nav>
            <hr>
        HTML;
    return $retorno;
    }
?>