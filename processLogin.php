<?php
    require "conexaoMysql.php";
    require "autenticacao.php";
    session_start();
    class RequestResponse{
        public $success;
        public $destination;

        function __construct($success, $destination){
            $this->success = $success;
            $this->destination = $destination;
        }
    }

    $email = $_POST['inputEmail'] ?? '';
    $senha = $_POST['inputSenha'] ?? '';

    $pdo = mysqlConnect();
    $respostaAutenticacao = checkPassword($pdo, $email, $senha);
    
    if ($respostaAutenticacao->hash_senha != null) {
        // Armazena dados úteis para confirmação de login em outros scripts PHP
        $_SESSION['emailUsuario'] = $email;
        $_SESSION['tipoDeUsuario'] = $respostaAutenticacao->tipoDeUsuario;
        $_SESSION['loginString'] = hash('sha512', $respostaAutenticacao->hash_senha . $_SERVER['HTTP_USER_AGENT']);  
        $response = new RequestResponse(true, 'index.php');
    }else{        
        // echo "erro";
        $response = new RequestResponse(false, null); 
    }

    echo json_encode($response);      

    // if ()


    // if (isset($_POST["inputEmail"]) and $_POST["inputEmail"] !== "" and isset($_POST["inputSenha"]) and $_POST["inputSenha"] !== ""){

    //     try{
    //         $sql = <<<SQL
    //         SELECT codigo
    //         FROM TF_pessoa
    //         WHERE email = ?
    //         SQL;
        
    //         $stmt = $pdo->prepare($sql);
    //         $stmt->execute([$_POST["inputEmail"]]);
    //     }catch(Exception $e){
    //         exit('Ocorreu uma falha: ' . $e->getMessage());
    //     }

    //     $row = $stmt->fetch();
    //     $emailSaved = $row['email'];
    //     $codigo = $row["codigo"];

    //     if ($emailSaved === null){
    //         $reqResponse = new RequestResponse(false, NULL);
    //     }else{
    //         $sql = <<<SQL
    //         SELECT hash_senha
    //         FROM TF_funcionario
    //         WHERE codigo = ?
    //         SQL;

    //         $stmt = $pdo->prepare($sql);
    //         $stmt->execute([$codigo]);
           
    //         $row = $stmt->fetch();

    //         $hash_senha = $row['hash_senha'];

    //         if ($_POST["inputEmail"] === $emailSaved and password_verify($_POST["inputSenha"], $hash_senha)){
    //             $reqResponse = new RequestResponse(true, "./restrito");
    //         }else {
    //             $reqResponse = new RequestResponse(false, NULL);
    //         }    
    //     }

    //     echo json_encode($reqResponse);

    //     } else {
    //         header("Location: login.html");
    //         exit();
    //     }
        
    
?>