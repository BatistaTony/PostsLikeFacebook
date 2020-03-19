<?php

  $nome = isset($_GET['nome']) ? $_GET['nome']: null;
  $telefone = isset($_GET['telefone']) ? $_GET['telefone']: null;
  $id = isset($_GET['id']) ? $_GET['id']: null;

  
    

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./../assets/styles/home.css" />
    <title>Posts</title>
  </head>
  <body>
    <div class="navbar">
      <h1>POSTS</h1>
      <h1><?php echo $_GET['nome']; ?></h1>
    </div>

    <div class="div_postar">
      <h5>O que estas a pensar  <?php echo $_GET['nome']; ?> ?</h5>
      <textarea name="texto" id="texto" cols="30" rows="10"></textarea>
      <div class="btns">
        <button class="btn_post" id="btn_post" onclick="postar('<?php echo $id; ?>', '<?php echo $nome; ?>')">Post</button>
      </div>
    </div>

    <ul class="posts" id="posts">

    </ul>

    <script>
      
        getPost(<?php echo $id; ?>)

    </script>  
    
    <script src="./../assets/Js/main.js"></script>

  </body>
</html>
