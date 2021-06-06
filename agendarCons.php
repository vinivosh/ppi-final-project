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
  <title>Agendamento de Consulta</title>
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

  <main class="container g-1">
  <h2>Agendamento de Consulta</h2>
  
    <form class="row g-2" action="processCons.php" method="POST">
      
      <!-- Especialidade -->
      <div class="col-md-6 form-floating">
      <select class="form-select" name="especialidade" id="especialidade">
        <!-- Opções adicionadas dinamicamente com JS e AJAX -->
      </select>
      <label for="especialidade"> Especialidade médica desejada </label>
      </div>

      <!-- Nome do médico -->
      <div class="col-md-6 form-floating">
      <select class="form-select" name="medico" id="medico">
        <!-- Opções adicionadas dinamicamente com JS e AJAX -->
      </select>
      <label for="medico"> Nome do médico </label>
      </div>

      <!-- Data da consulta -->
      <div class="col-md-6 form-floating">
        <input type="date" class="form-control" name="dataConsulta" id="dataConsulta">
        <label for="dataConsulta"> Data da consulta </label>
      </div>

      <!-- Hora da consulta -->
      <div class="col-md-6 form-floating">
      <select class="form-select" name="horaConsulta" id="horaConsulta">
        <!-- Opções adicionadas dinamicamente com JS e AJAX -->
      </select>
      <label for="horaConsulta"> Hora da consulta </label>
      </div>

      <!-- Nome -->
      <div class="col-md-5 form-floating">
        <input type="text" class="form-control" placeholder="" required id="nome" name="nome">
        <label for="nome" class="verificacao"> Nome </label>
      </div>

      <!-- E-mail -->
      <div class="col-md-5 form-floating">
        <input type="email" class="form-control" placeholder="" required name="email" id="email">
        <label for="email" class="verificacao"> E-mail </label>
      </div>

      <!-- Sexo -->
      <div class="col-md-2 form-floating">
      <select class="form-select" name="sexo" id="sexo">
        <option value="M">Masculino</option><option value="F">Feminino</option>
      </select>
      <label for="sexo"> Sexo </label>
      </div>

      <!-- Botão cadastrar -->
      <div class="col-md-12 form-floating">
      <button type="submit" class="btn btn-primary">
        Cadastrar
        <!-- Ícone da pessoa + -->
        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" fill="currentColor" class="bi bi-person-plus-fill ms-1" viewBox="0 0 16 16">
        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
        </svg>
      </button>
      </div>

    </form class="mb-2">

    <div class="col-md-12 mt-3 alert alert-success" role="alert" id="cadastroSuccessMsg">
        Endereço adicionado com sucesso!
      </div>

      <div class="col-md-12 mt-3 alert alert-danger" role="alert" id="cadastroFailMsg">
        Erro no cadastro…
      </div>
  </main>

  <?php echo footer()?> <!-- footer completa -->

  <script type="module">
    import {navbarDin} from "./scriptsAux/navbarDinamica.js"
     
    window.onload = () => {
      // Navbar editada dinamicamente
      navbarDin("<?php echo json_encode($isLogged); ?>","<?php echo $_SESSION['tipoDeUsuario']; ?>")

      // Mensagens de erro ou sucesso
      const sucesso = '<?php echo $_GET["sucesso"] ?>'

      const successoMsg = document.getElementById('cadastroSuccessMsg')
      const failMsg = document.getElementById('cadastroFailMsg')

        if (sucesso == 'true'){
          successoMsg.style.display = 'block';
          failMsg.style.display = 'none'
        }else if (sucesso == 'false'){
          successoMsg.style.display = 'none';
          failMsg.style.display = 'block'
        }else{
          failMsg.style.display = 'none'
          successoMsg.style.display = 'none';
        }

      // Adicionando especialidades dinamicamente…
      let xhr = new XMLHttpRequest();
      xhr.open('GET', 'processConsReq.php?req=esp')
      
      xhr.onload = () =>{
        if (xhr.status == 200){ // Se bem sucedido…
          const selEsp = document.getElementById('especialidade')        
          
          // Obtemos as especialidades do servidor…
          let response = JSON.parse(xhr.responseText)
          response.forEach(esp => {
            let especialidade = document.createElement('option')
            especialidade.text = esp
            especialidade.value = esp
            
            selEsp.appendChild(especialidade)
            
          })
        }else{  // Se houve alguma falha…
          alert('Falha inesperada: ' + xhr.responseText)
        }
      }

      xhr.onError = () => {   // Se houver erro de rede…
        alert('Erro de rede')
      }

      xhr.send()

      const selEsp = document.getElementById('especialidade')
      selEsp.addEventListener('change', (event) => {
        // Adicionando médicos dinamicamente…
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'processConsReq.php?req=med&esp=' + event.target.value)
        
        xhr.onload = () =>{
          if (xhr.status == 200){ // Se bem sucedido…
            const selMed = document.getElementById('medico')

            // Primeiro removemos todos itens do select de médicos, se existirem
            while (selMed.firstElementChild){
              selMed.removeChild(selMed.lastElementChild)
            }
            
            // Obtemos os doutores do servidor…
            let response = JSON.parse(xhr.responseText)
            response.forEach(med => {
              let medico = document.createElement('option')
              medico.text = med.nome
              medico.value = med.codigo
              
              selMed.appendChild(medico)              
            })
          }else{  // Se houve alguma falha…
            alert('Falha inesperada: ' + xhr.responseText)
          }
        }

        xhr.onError = () => {   // Se houver erro de rede…
          alert('Erro de rede')
        }

        xhr.send()
      })

      const selData = document.getElementById('dataConsulta')
      selData.addEventListener('change', (event) => {
        // Adicionando horários dinamicamente…
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'processConsReq.php?req=hora&data=' + event.target.value + '&med=' + document.getElementById('medico').value)
        
        xhr.onload = () =>{
          if (xhr.status == 200){ // Se bem sucedido…
            const selHora = document.getElementById('horaConsulta')

            // Primeiro removemos todos itens do select de horários, se existirem
            while (selHora.firstElementChild){
              selHora.removeChild(selHora.lastElementChild)
            }
            
            // Obtemos os horários do servidor…
            let response = JSON.parse(xhr.responseText)
            // Por algum motivo só aqui a resposta está vindo num objeto, ao invés de array. Então temos que usar Object.values(response) para extrair só os valores de response e usá-los
            console.log(Object.values(response) + '\n')
            Object.values(response).forEach(h => {
              let hora = document.createElement('option')
              hora.text = h
              hora.value = h
              
              selHora.appendChild(hora)              
            })
          }else{  // Se houve alguma falha…
            alert('Falha inesperada: ' + xhr.responseText)
          }
        }

        xhr.onError = () => {   // Se houver erro de rede…
          alert('Erro de rede')
        }

        xhr.send()
      })
    }
  </script>
</body>
</html>