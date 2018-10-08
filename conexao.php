<?php
try{
    $pdo = new PDO("mysql:dbname=urna;host=localhost", "root", "");

}catch(PDOException $e){
    echo "Erro: ".$e->getMessage();
}
?>