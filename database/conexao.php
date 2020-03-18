<?php
    try{

        $con = new PDO('mysql:host=localhost;dbname=Posts', 'root','');

    }catch(PDOException $e){
        die($e->getMessage());
    }

?>