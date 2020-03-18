<?php

  include './../database/conexao.php';

  $erro = '';

  $telefone = isset($_GET['telefone'])  ? $_GET['telefone']: null;
  $senha = isset($_GET['senha'])  ? $_GET['senha']: null;

  
  
  if($telefone === ""){
    $erro .= $erro ? ', telefone esta vazio' : 'telefone esta vazio' ;
  }
  
  if($senha === ""){
        $erro .= $erro ?  ', senha esta vazio': ' senha esta vazio';  
  }

  try {


    if(empty($erro)){

      $query  = 'SELECT * FROM users WHERE telefone=:telefone AND senha=:senha';
      $stmt = $con->prepare($query);

      $stmt->bindParam(':telefone', $telefone);
      $stmt->bindParam(':senha', $senha);

      $stmt->execute();

      $num = $stmt->rowCount();

      if($num > 0){

        $user  =  $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($user);

      }else{
        echo json_encode("User nao encontrado");
      }

    }else{
      echo json_encode($erro);
    }

      

  }catch(PDOException $e){
        die($e->getMessage());
  }

  



?>