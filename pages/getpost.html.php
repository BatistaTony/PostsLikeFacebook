<?php

  $nome = isset($_GET['nome']) ? $_GET['nome']: null;
  $telefone = isset($_GET['telefone']) ? $_GET['telefone']: null;
  $id = isset($_GET['id']) ? $_GET['id']: null;

    include './../database/conexao.php';

    $posts = [];


    function like_number($post){

          include './../database/conexao.php';


        $query  = 'SELECT * FROM liked_posts WHERE id_post=:id';

          $stmt = $con->prepare($query);

          $stmt->bindParam(':id', $post);


          $stmt->execute();

          $num = $stmt->rowCount();


          return $num;
      }

    try {

    
      $query  = 'SELECT * FROM post ';
      $stmt = $con->prepare($query);


      $stmt->execute();

      $num = $stmt->rowCount();

    

  }catch(PDOException $e){
        die($e->getMessage());
  }

  

?>

 <?php 

         while($post = $stmt->fetch()){

          
      ?>
      <li class="post">
        <h1 class="nome"><?php echo $post{'user_nome'}; ?></h1>
        <p class="texto">
          <?php echo $post['texto']; ?>
        </p>
        <h5 class="data"><?php echo $post['data_post']; ?></h5>
      </li>
      <div class="footer_post">
        <ul class="reaction">
          <li>
            <img
              src="./../assets/images/icons8_facebook_like_48px_1.png"
              alt=""
            />
          </li>
          <li>
            <img src="./../assets/images/icons8_love_48px.png" alt="" />
          </li>

          <li>
            <img src="./../assets/images/icons8_puzzled_48px.png" alt="" />
          </li>
          <h2 class="people_like"><?php echo like_number($post['id']); ?> pessoas</h2>
        </ul>

       


        <div class="post_action">
          <ul class="reaction reaction_2">
            <li onclick="react('<?php echo $post['id'];?>','<?php echo 17; ?>','like')">
              <img
                src="./../assets/images/icons8_facebook_like_48px_1.png"
                alt=""
              />
            </li>
            <li onclick="react('<?php echo $post['id'];?>','<?php echo isset($_GET['id']) ? $_GET['id']:null; ?>','love')">
              <img src="./../assets/images/icons8_love_48px.png" alt="" />
            </li>

            <li onclick="react('<?php echo $post['id'];?>','<?php echo isset($_GET['id']) ? $_GET['id']:null; ?>','nervous')">
              <img src="./../assets/images/icons8_puzzled_48px.png" alt="" />
            </li>
          </ul>
        </div>

        

      </div>

        <?php } ?>