<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./mainStyle.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Login</title>
  </head>
  
  <body>
    <header><h1>Clinica dos Lolzeiros</h1></header>

    <nav>
        <h2>Menu de navegação</h2>
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="galeria.html">Galeria</a></li>
            <li><a href="contato.html">Contato</a></li>
            <li><a href="login.html">Login</a></li>
        </ul>
    </nav>
    <hr>

    <div class="container my-3">

        <main>
            <form class="row g-3" action="">

                <div class="centerBox">
                    <!-- E-mail e senha -->
                    <div class="col-md-12 form-floating">
                        <input type="email" class="form-control" placeholder="" id="inputEmail" name="inputEmail">
                        <label for="inputEmail"> E-mail </label>
                    </div>
                    <div class="col-md-12 form-floating">
                        <input type="password" class="form-control" placeholder="" id="inputSenha" name="inputSenha">
                        <label for="inputSenha"> Senha </label>
                    </div>

                    <!-- Botão Entrar -->
                    <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary" id="signUpBtn">
                        Entrar
                        <!-- Ícone da pessoa + -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </button>
                    </div>
                </div>

               

                <div class="col-md-12 mt-3 alert alert-danger" role="alert" id="loginFailMsg">
                  Falha no login!<br>
                  E-mail e/ou senha estão incorretos.
                </div>

            </form>
        </main>
        
    </div>

    <script>
      window.onload = () => {
        const btnSignUp = document.getElementById('signUpBtn')
        btnSignUp.addEventListener('click', (event) =>{
          event.preventDefault()

          let myForm = document.querySelector('form')
          // console.log(myForm)
          let formData = new FormData(myForm)
          // console.log(formData)

          let xhr = new XMLHttpRequest()

          xhr.onload = () =>{
            if (xhr.status == 200){ // Se sucesso…
              const response = JSON.parse(xhr.responseText)

              console.log(response)

              if (response.success){
                document.getElementById('loginFailMsg').style.display = 'none';
                window.location = response.destination;
                // console.log('success')
              }else{
                document.getElementById('loginFailMsg').style.display = 'block';
                // console.log('fail')
              }
            }else{  // Se falha…
              console.error('Falha inesperada: ' + xhr.responseText)
            }
          }

          xhr.onerror = () =>{  // Se falha de rede…
            console.log('Erro de rede!')
          }

          xhr.open('POST', 'processLogin.php')
          xhr.send(formData)
        })
      }
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
