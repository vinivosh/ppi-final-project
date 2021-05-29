<?php

//
// Código fornecido pelo professor Daniel Furtado
// (e levemente modificado por mim para funcionamento no meu DB do AwardSpace)
//

function mysqlConnect()
{
  $db_host = "fdb29.awardspace.net";
  $db_username = "3797923_mysqltestdb";
  try{
    // A senha é recuperada em um arquivo separado pois estou publicando esse código no meu GitHub, e talvez não fosse a melhor ideia deixar a senha explícita aqui no código.
    $db_password = file_get_contents("./sql-password.txt");
    // echo "[DEBUG] Senha encontrada: $db_password";
  } catch (Exception $e){
    //error_log($e->getMessage(), 3, 'log.php');
    exit('Ocorreu uma falha na conexão com o BD: ' . $e->getMessage());
  }
  $db_name = "3797923_mysqltestdb";

  // dsn é apenas um acrônimo de database source name
  $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";

  $options = [
    PDO::ATTR_EMULATE_PREPARES => false, // desativa a execução emulada de prepared statements
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // ativa o modo de erros para lançar exceções    
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // altera o modo padrão do método fetch para FETCH_ASSOC
  ];

  try {
    $pdo = new PDO($dsn, $db_username, $db_password, $options);
    return $pdo;
  } 
  catch (Exception $e) {
    //error_log($e->getMessage(), 3, 'log.php');
    exit('Ocorreu uma falha na conexão com o BD: ' . $e->getMessage());
  }
}

?>
