<?php
ob_start();
if(($_SESSION['usuarioId'] == "") || ($_SESSION['administrador'] == "") || ($_SESSION['usuarioNome'] == "") || ($_SESSION['usuarioSenha'] == "")){
	unset($_SESSION['usuarioId'],			
		  $_SESSION['usuarioNome'],
		  $_SESSION['administrador'], 		
		  $_SESSION['usuarioSenha']);
	//Mensagem de Erro
	$_SESSION['loginErro'] = "Área restrita para usuários cadastrados";
	
	//Manda o usuário para a tela de login
	header("Location: index.php");
}
