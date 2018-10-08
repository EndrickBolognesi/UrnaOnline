<?php
session_start();
session_destroy();

//Remove todas as informações contidas na variaveis globais
unset($_SESSION['usuarioId'],			
$_SESSION['usuarioNome'], 		
$_SESSION['administrador'],		
$_SESSION['usuarioSenha']);

//redirecionar o usuário para a página de login
header("Location: index.php");
?>
