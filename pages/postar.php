<?php

    include './../database/conexao.php';

    try {

        $user = isset($_GET['user'])  ? htmlspecialchars($_GET['user']) : null;
        $texto = isset($_GET['texto'])  ? htmlspecialchars($_GET['texto']) : null;
        $user_nome = isset($_GET['nome'])  ? htmlspecialchars($_GET['nome']) : null;


        $query  = "INSERT INTO post SET id_user=:id_user, texto=:texto, user_nome=:nome";
        $stmt = $con->prepare($query);

        $stmt->bindParam(':id_user', $user);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':nome', $user_nome);



        if($stmt->execute()){
            echo 'posted';
        }else{
            echo ' not posted';
        }


        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

?>