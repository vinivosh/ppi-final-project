<?php

class RespostaAutenticacao{
  public $tipoDeUsuario;
  public $hash_senha;

  function __construct($tipoDeUsuario, $hash_senha){
    $this->tipoDeUsuario = $tipoDeUsuario;
    $this->hash_senha = $hash_senha;
  }
}

function checkPassword($pdo, $email, $senha)
{
  // SQL que obtém o código da pessoa de e-mail correspondente
  $sql = <<<SQL
  SELECT codigo
  FROM TF_pessoa
  WHERE email = ?
  SQL;

  try {
    // Neste caso utilize prepared statements para prevenir
    // ataques do tipo SQL Injection, pois precisamos
    // inserir dados fornecidos pelo usuário na 
    // consulta SQL (o email do usuário)
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $codigo = $stmt->fetchColumn();

    if($codigo != null){  // Se existir funcionário com o código correspondente
      $sql = <<<SQL
      SELECT hash_senha
      FROM TF_funcionario
      WHERE codigo = ?
      SQL;

      $stmt = $pdo->prepare($sql);
      $stmt->execute([$codigo]);

      $hash_senha = $stmt->fetchColumn();

      if (password_verify($senha, $hash_senha)){  // Se a senha bater com o hash…

        $sql = <<<SQL
        SELECT 1
        FROM TF_medico
        WHERE codigo = ?
        SQL;

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$codigo]);

        if ($stmt->fetchColumn() != null){
          return new RespostaAutenticacao('medico', $hash_senha);
        }else{
          return new RespostaAutenticacao('funcionario', $hash_senha);
        }
      }else{  // Se a senha não bater com o hash ou não existir funcionário…
        return new RespostaAutenticacao('erro', null);
      }
    }else{ // Se não existir pessoa
      return new RespostaAutenticacao('erro', null);
    }
  } 
  catch (Exception $e) {
    exit('Falha inesperada: ' . $e->getMessage());
  }
}

function checkLogged($pdo)
{
  // Verifica se as variáveis de sessão criadas no momento do login estão definidas
  if ($_SESSION['emailUsuario'] == null || $_SESSION['emailUsuario'] == '' || $_SESSION['loginString'] == null || $_SESSION['loginString'] == '')
    return false;

  $email = $_SESSION['emailUsuario'];

  // Resgatando o código do e-mail correspondente
  $sql = <<<SQL
    SELECT codigo
    FROM TF_pessoa
    WHERE email = ?
    SQL;

  try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $codigo = $stmt->fetchColumn();

    if (!$codigo)
      return false; // nenhum resultado (email não encontrado)
    else{
      $sql = <<<SQL
      SELECT hash_senha
      FROM TF_funcionario
      WHERE codigo = ?
      SQL;

      $stmt = $pdo->prepare($sql);
      $stmt->execute([$codigo]);

      $hash_senha = $stmt->fetchColumn();

      if($hash_senha == null) {
        // echo json_encode('Testando função checkLogged: ' . $hash_senha);
        return false; // Não existe funcionário
      }else{
        // echo json_encode('Testando função checkLogged: ' . $hash_senha);
        $loginStringCheck = hash('sha512', $hash_senha . $_SERVER['HTTP_USER_AGENT']);
        // echo json_encode('loginStringCheck: ' . hash_equals($loginStringCheck, $_SESSION['loginString']));
        if (!hash_equals($loginStringCheck, $_SESSION['loginString']))
          return false;

        return true;
      }
    }
  } // Erro em alguma query
  catch (Exception $e) {
    exit('Falha inesperada: ' . $e->getMessage());
  }
}

function exitWhenNotLogged($pdo)
{
  if (!checkLogged($pdo)) {
    header("Location: http://vinivosh.atwebpages.com/clinica/index.php");
    exit();
  }
}
