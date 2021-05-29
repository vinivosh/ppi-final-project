<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset ="UTF-8">
    <title> Contato</title>
    <meta name="description" content="Adib Cecilio Prado Domingos e o autor">
    <style>
        header{
            text-align: center;
            background-color:rgb(7, 7, 7);
            padding: 1pt;
            color: chartreuse;
            font-size: 20pt;
    }

        nav{
            width: 100%;
            
            text-align: center;
            background-color: rgb(1, 27, 2);
            padding: 1px;
            color:white;
            position: sticky;
            top:0;
        }
        nav li{display: inline;}
        a{color:rgb(29, 175, 107); font-size: 15pt; padding-right: 20pt;}
        body{
            font-family: "Helvetica Neue", Arial;
            line-height: 2rem;
            text-align: left;
            padding: 1px;
            background-color:rgb(123, 134, 123);
            font-size: 13pt;
        }   
        table{ margin-left: auto;  margin-right: auto;}
        h1,h2,h3{text-align: center;}
        footer{text-align:center;}
        main{		 
        width: 900px;
        text-align: center;border:1pt solid; padding: 1pt;border-color: white;
         position: absolute;
		 left:50%;
		 transform: translate(-50%,0%);
         border-radius: 15pt; 
		 line-height: 20pt;}
         fieldset{
            width:15%;
            margin:0 auto;
            }
		input:focus{
			border: solid green;
			box-shadow: 2px 2px 5px green;
			outline: none;
		}
        textarea{width:90%;}
        input:invalid + span::after {content: 'Algo esta errado'; color: red;}
        input:valid + span::after {content: 'Correto'; color: rgb(13, 241, 25);}
</style>
</head>

<body>
    <header><h1>Site do Adib</h1></header>

    <nav>
    <h2>Menu de navegação</h2>
    <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="galeria.html">Galeria</a></li>
        <li><a href="contato.html">Contato</a></li>
    </ul>
    </nav>
    <hr>
    <main>
        <h2>Formulario</h2>
        <hr>
        <form action="formulario.php" method="POST">
            <div>
                <h3>Dados pessoais</h3>
                <label for="nome">Nome:</label> <input type="text" id="nome" name="nome" required><span></span><br>
                <label for="email">E-mail:</label> <input type="email" id="email" name="email" required> <span></span><br>
                <label for="idade">Idade:</label> <input type="number" id="idade" name="idade" required> <span></span><br>
                <label for="telefone">Telefone:</label> <input type="tel" id="telefone" name="telefone" required> <span></span><br>
                <label for="nasc">Data de nascimento:</label> <input type="date" id="nasc" name="nasc"><br>
                <fieldset>
                    <legend>Sexo Biologico</legend>
                    <input type="radio" name="sexo" value="masculino">Masculino<br>
                    <input type="radio" name="sexo" value="feminino">Feminino<br>
                    <input type="radio" name="sexo" value="naoinformado" checked>Nao desejo Informar<br>
                </fieldset>
                
                <fieldset>
                    <legend>Estado Civil</legend>
                    <input type="radio" name="estcivil" value="solt" checked>Solteiro(a)<br>
                    <input type="radio" name="estcivil" value="cas">Casado(a)<br>
                    <input type="radio" name="estcivil" value="div">Divorciado(a)<br>
                </fieldset>
            </div>
            <hr>
            <div>
                <h3>Dados da empresa</h3>
                <label for="cnpj">CNPJ:</label> <input type="number" id="cnpj" name="cnpj"><br>
                <label for="razsoc">Razão Social:</label> <input type="text" id="razsoc" name="razsoc"><br>
                <label for="atuacao">Ramo de atuação:</label> <input type="text" id="atuacao" name="atuacao"><br>
            </div>
            <hr>
            <div>
                <h3>Endereço</h3>
                <label for="cep">CEP:</label> <input type="number" id="cep" name="cep" required> <span></span><br>
                
                <label for="tiplogradouro">Tipo de Logradouro:</label>
                <select id="tiplogradouro" name="tiplogradouro">
                    <option value="rua">Rua</option>
                    <option value="avenida">Avenida</option>
                    <option value="praca">Praça</option>
                    <option value="etc">Etc</option>
                </select>
                <br>
                <label for="logradouro">Logradouro:</label> <input type="text" id="logradouro" name="logradouro" required> <span></span><br>
                <label for="cidade">Cidade:</label> <input type="text" id="cidade" name="cidade" required> <span></span><br>
                <label for="estado">Estado:</label> <input type="text" id="estado" name="estado" required> <span></span><br>
                
            </div>
            <hr>
            <div>
                <h3>Descrição detalhada do interesse</h3>
                Deixe seu comentario:<br>
                <textarea name="comentario" rows="10" cols="220" maxlength="2000"></textarea>
            </div>
            <hr>
            <div>
                <h3>Outro</h3>   
                <fieldset>
                    <legend>Hobbies de interesses:</legend>
                    <input type="checkbox" name="hobby[]" value="musica">Musica<br>
                    <input type="checkbox" name="hobby[]" value="esporte">Esporte<br>
                    <input type="checkbox" name="hobby[]" value="esporte">Jogos<br>
                    <input type="checkbox" name="hobby[]" value="esporte">Livros<br>
                </fieldset> 
                <fieldset>
                    <legend>Sabor preferido :</legend>
                    <input type="radio" name="sabpref" value="salg">Salgado<br>
                    <input type="radio" name="sabpref" value="doc" checked>Doce<br>
                    <input type="radio" name="sabpref" value="amargo">Amargo<br>
                </fieldset>
            </div>
            <button>Enviar</button>
            <input type="reset" value="Limpar">
        </form>    
    </main>
</body>