<?php

require_once "../conexaoMysql.php";
require_once "../autenticacao.php";
require_once "../scriptsAux/navbarHTML.php";

session_start();
$pdo = mysqlConnect();
exitWhenNotLogged($pdo);
$isLogged = checkLogged($pdo);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset ="UTF-8">
    <title>Cadastro de Funcionários</title>
    <meta name="autor" content="Adib Cecilio Prado Domingos, Vinícius Henrique Almeida Praxedes e Yan Damasceno Dias">
    <meta name="description" content="description">
    <link rel="stylesheet" href="../mainStyle.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <header><h1 class="mb-0">Clinica dos Lolzeiros</h1>
      <?php echo navbar()?> <!-- Navbar completa -->
    </header>

    <main>
        <form class="row g-2" action="processFunc.php">
            <!-- Nome -->
            <div class="col-md-9 form-floating">
                <input type="text" class="form-control" placeholder="" id="nome" name="nome">
                <label for="nome"> Nome </label>
            </div>

            <!-- Sexo -->
            <div class="col-md-3 form-floating">
            <select type="text" class="form-select" placeholder="" name="sexo" id="sexo">
                <option selected>—</option>
                <option value="M">Masculino</option><option value="F">Feminino</option>
            </select>
            <label for="sexo" class=""> Sexo </label>
            </div>

            <!-- E-mail -->
            <div class="col-md-12 form-floating">
                <input type="email" class="form-control" placeholder="" name="email" id="inputEmail">
                <label for="inputEmail"> E-mail </label>
            </div>

            <!-- Telefone -->
            <div class="col-md-6 form-floating">
                <input type="text" class="form-control" placeholder="" id="telefone" name="telefone">
                <label for="telefone"> Telefone (formato xx xxxxx-xxxx) </label>
            </div>

            <!-- CEP -->
            <div class="col-md-6 form-floating">
                <input type="text" class="form-control" placeholder="" name="cep" id="cep">
                <label for="cep"> CEP (formato xxxxx-xxx)</label>
            </div>

            <!-- Logradouro, Cidade e Estado (select em um dropdown) -->
            <div class="col-md-12 form-floating">
                <input type="text" class="form-control" placeholder="" name="logradouro" id="logradouro">
                <label for="logradouro"> Logradouro </label>
            </div>
            <div class="col-md-9 form-floating">
                <input type="text" class="form-control" placeholder="" name="cidade" id="cidade">
                <label for="cidade"> Cidade </label>
            </div>
            <div class="col-md-3 form-floating">
            <select type="text" class="form-select" placeholder="" name="estado" id="estado">
                <option selected>——</option>
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
            <label for="estado" class=""> Estado </label>
            </div>

            <!-- Data de início do contrato -->
            <div class="col-md-4 form-floating">
                <input type="date" class="form-control" placeholder="" name="dataContrato" id="dataContrato">
                <label for="dataContrato"> Data de início do contrato </label>
            </div>

            <!-- Salário -->
            <div class="col-md-4 form-floating">
                <input type="number" step="any" pattern="^\d*(.\d{0,2})?$" class="form-control" placeholder="" name="salario" id="salario">
                <label for="salario"> Salário </label>
            </div>

            <!-- Senha -->
            <div class="col-md-4 form-floating">
                <input type="password" class="form-control" placeholder="" name="senha" id="senha">
                <label for="senha"> Senha </label>
            </div>

            <!-- Checkbox de médico -->
            <div class="col-md-12 form-floating">
                <div class="form-check">
                <input type="checkbox" class="form-check-input" placeholder="" id="medCheckbox">
                <label for="medCheckbox"> Funcionário é um médico </label>
                </div>
            </div>

            <!-- Partes que só aparecem se o usuário marcar que o funcionário é um médico -->

            <!-- Especialidade -->
            <div class="col-md-6 form-floating apenasCheckboxMed">
                <input type="text" class="form-control" placeholder="" name="especialidade" id="especialidade">
                <label for="especialidade"> Especialidade </label>
            </div>

            <!-- CRM -->
            <div class="col-md-6 form-floating apenasCheckboxMed">
                <input type="text" class="form-control" placeholder="" name="crm" id="crm">
                <label for="crm"> CRM </label>
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

            

        </form>
    </main>

  </body>

  <script type="module">
        import {navbarDin} from "../scriptsAux/navbarDinamica.js"

        // Função que busca o endereço de acordo com o CEP digitado
        function buscaEndereco(cep) {
            if (cep.length != 9) return

            let xhr = new XMLHttpRequest();
            xhr.open("GET", "buscaEndereco.php?cep=" + cep, true)

            xhr.onload = function () {        
                // verifica o código de status retornado pelo servidor
                if (xhr.status != 200) {
                    console.error("Falha inesperada: " + xhr.responseText)
                    return
                }

                // converte a string JSON para objeto JavaScript
                try {
                    var endereco = JSON.parse(xhr.responseText)
                }
                catch (e) {
                    console.error("String JSON inválida: " + xhr.responseText)
                    return
                }

                // utiliza os dados retornados para preencher formulário
                let form = document.querySelector("form")
                form.logradouro.value = endereco.logradouro      
                form.cidade.value = endereco.cidade
                form.estado.value = endereco.estado
            }

            xhr.onerror = function () {
                console.error("Erro de rede - requisição não finalizada")
            }

            xhr.send()
        }
         
        window.onload = () => {
            // Navbar editada dinamicamente
            navbarDin("<?php echo json_encode($isLogged); ?>","<?php echo $_SESSION['tipoDeUsuario']; ?>")

            const inputCep = document.querySelector("#cep");
            inputCep.onkeyup = () => buscaEndereco(inputCep.value);

            const medCheckbox = document.getElementById("medCheckbox")
            const apenasCheckboxMed = document.querySelectorAll(".apenasCheckboxMed")

            // Exibindo os inputs apenas de médico dinamicamente
            medCheckbox.addEventListener("change", (event) => {
                if (medCheckbox.checked) {
                    apenasCheckboxMed.forEach((item) => item.style.display = 'inline')
                }else{
                    apenasCheckboxMed.forEach((item) => item.style.display = 'none')
                }
            })
        }
    </script>
</html>