<?php
    $server = "localhost";
    //$database = "bdclima";
    $database = "db_marketing";
    //$database = "form";
    //$user = "u_mkt";
    $user = "root";
    //$pwd = "DoweG5qnmlP3myYb";
    //$pwd = "!{(%6BjUE((F";
    $pwd = "";

    try{
        $pdo = new PDO ("mysql:host=$server;dbname=$database","$user","$pwd");
        $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }catch(Exception $e){
        echo 'Exception : <br>'.$e->getMessage().'<br>';
    }

   
?>