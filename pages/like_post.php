<?php

      include './../database/conexao.php';


    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $user =  isset($_GET['user']) ? $_GET['user'] : null;


    
   
        try {

            $con1  = $con;

            $query1  = 'SELECT * FROM liked_posts WHERE id_post=:id  AND  user=:user';
            $stmt1 = $con1->prepare($query1);

            $stmt1->bindParam(':id', $id);
            $stmt1->bindParam(':user', $user);

            $stmt1->execute();

            $num = $stmt1->rowCount();

            if($num === 0){

         

               $query = 'INSERT INTO liked_posts SET id_post=:id, user=:user';
                $stmt  = $con->prepare($query);

                $stmt->bindParam(':id', $id);
                    $stmt->bindParam(':user', $user);

                

                if($stmt->execute()){

                    echo 'Liked';
                        
                 }else{
                         echo "Erro ao likar";
                 }


            }else{
                echo 'Ja deu like';
            }

            


        } catch (PDOException $e) {

        die($e->getMessage());

        }

  

?>