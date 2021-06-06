<?php
  session_start();
  function navbar(){
  $valor=  $_SESSION['emailUsuario'];
  $retorno= <<<HTML
  <nav>
    <h2>Menu de navegação</h2>
    <ul>
      <li><a href="http://vinivosh.atwebpages.com/clinica/index.php">Inicio</a></li>
      <li><a href="http://vinivosh.atwebpages.com/clinica/galeria.php">Galeria</a></li>
      <li><a href="http://vinivosh.atwebpages.com/clinica/cadastrarEndereco.php">Novo Endereço</a></li>
      <li class="apenasLoggedOff"><a href="http://vinivosh.atwebpages.com/clinica/login.php">Login</a></li>
      <li><a href="http://vinivosh.atwebpages.com/clinica/agendarCons.php">Agendar Consulta</a></li>
    </ul>
    <hr>
    <ul>
      <li class="apenasFunc"><a href="http://vinivosh.atwebpages.com/clinica/restrito/cadastroFunc.php">Cadastrar Funcionários</a></li>
      <li class="apenasFunc"><a href="http://vinivosh.atwebpages.com/clinica/restrito/cadastroPaci.php">Cadastrar Pacientes</a></li>
      <li class="apenasFunc"><a href="http://vinivosh.atwebpages.com/clinica/restrito/listarFunc.php">Listar Funcionários</a></li>
      <li class="apenasFunc"><a href="http://vinivosh.atwebpages.com/clinica/restrito/listarPaci.php">Listar Pacientes</a></li>
      <li class="apenasFunc"><a href="http://vinivosh.atwebpages.com/clinica/restrito/listarEnde.php">Listar Endereços</a></li>
      <li class="apenasFunc"><a href="http://vinivosh.atwebpages.com/clinica/restrito/listarCons.php">Listar Consultas</a></li>
      <li class="apenasMedi"><a href="http://vinivosh.atwebpages.com/clinica/restrito/listarMinh.php">Minhas Consultas</a></li>      
    </ul>
    <div id="logadoComo">
      <p class="apenasFunc">Logado como: $valor </p>
      <a class="apenasFunc mx-2" href="http://vinivosh.atwebpages.com/clinica/logout.php">Logout</a>
    </div>
  </nav>
  <hr>
  HTML;
  return $retorno;
  }
?>