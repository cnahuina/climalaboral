<?php
    $server = "localhost";
    $database = "form";
    $user = "root";
    $pwd = "";
    //$pwd = "DoweG5qnmlP3myYb";

    try{
        $pdo = new PDO ("mysql:host=$server;dbname=$database","$user","$pwd");
        $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }catch(Exception $e){
        echo 'Exception : <br>'.$e->getMessage().'<br>';
    }

   
?>

<!--
class DB{

    private $server;
    private $database;
    private $user;
    private $pwd;
    private $charset;

    public function __construct(){

        $this -> $server = "localhost";
        $this -> $database = "form";
        $this -> $user = "root";
        $this -> $pwd = "DoweG5qnmlP3myYb";
        $this -> $charset = "utf8mb4";
    }

    public function connect(){
        try{
            $connection = "mysql:host". $this->server. ";dbname" . $this->database . ";charset".$this->charset;
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                      PDO::ATTR_EMULATE_PREPARES => false];
            
            $pdo = new PDO($connection , $this->user , $this->pwd , $options); 

        }catch(PDOException $e){
            print_r("error connection: " .$e-> getMessage());
        }
    }
} 
?> -->