<?php

  include './../database/conexao.php';

  $erro = '';

  $nome = isset($_GET['nome'])  ? $_GET['nome']: null;
  $telefone = isset($_GET['telefone'])  ? $_GET['telefone']: null;
  $senha = isset($_GET['senha'])  ? $_GET['senha']: null;

  if($nome === ""){
    $erro .= 'nome esta vazio';
  } 
  
  
  if($telefone === ""){
    $erro .= $erro ? ', telefone esta vazio' : 'telefone esta vazio' ;
  }
  
  if($senha === ""){
        $erro .= $erro ?  ', senha esta vazio': ' senha esta vazio';  
    }

  try {

      $con1 = $con;

      $query1  = 'SELECT * FROM users WHERE telefone=:telefone';
      $stmt1 = $con1->prepare($query1);

      $stmt1->bindParam(':telefone', $telefone);

      $stmt1->execute();

      $num = $stmt1->rowCount();

      if($num > 0){
        $erro .= $erro ?  ', Numero do telefone ja existe' :  'Numero do telefone ja existe';
      }

  }catch(PDOException $e){
        die($e->getMessage());
  }

  if(empty($erro)){

    try {

          $query = 'INSERT INTO users SET nome=:nome, telefone=:telefone, senha=:senha';
          $stmt  = $con->prepare($query);

          $stmt->bindParam(':nome', $nome);
          $stmt->bindParam(':telefone', $telefone);
          $stmt->bindParam(':senha', $senha);

          if($stmt->execute()){

                $query  = 'SELECT * FROM users WHERE telefone=:telefone AND senha=:senha';
                $stmt = $con->prepare($query);

                $stmt->bindParam(':telefone', $telefone);
                $stmt->bindParam(':senha', $senha);

                $stmt->execute();

                $num = $stmt->rowCount();

                if($num > 0){

                  $user  =  $stmt->fetch(PDO::FETCH_ASSOC);

                  echo json_encode($user);

                }

          }else{
             echo json_encode("User nao encontrado");
          }

      } catch (PDOException $e) {
      die($e->getMessage());
    }

  }else{
     
           echo json_encode($erro);
      
  }

  

?>
