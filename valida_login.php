<?php
session_start();
$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);
$conectar = mysqli_connect("localhost","root","", "urna") or die ("Erro na conexão");
//include_once("conexao.php");
 
$result = mysqli_query($conectar, "SELECT * FROM usuarios WHERE email ='$email' AND senha='$senha' LIMIT 1");
$resultado = mysqli_fetch_assoc($result); 


//echo "Usuario: ".$resultado['nome'];
if(empty($resultado)){
	//Mensagem de Erro
	$_SESSION['loginErro'] = "Usuário ou senha Inválido";
	echo"
	<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php'>
				<script type=\"text/javascript\">
					alert(\"Usuario ou Senha inválido\");
				</script>
	
	";
	//Manda o usuario para a tela de login
	
}else{
	//Define os valores atribuidos na sessao do usuario
	$_SESSION['usuarioId'] 			= $resultado['id'];
	$_SESSION['usuarioNome'] 		= $resultado['nome'];
	$_SESSION['administrador']      = $resultado['admin'];
	$_SESSION['usuarioSenha'] 		= $resultado['senha'];
	
	if($_SESSION['administrador'] == 1){
		header("Location: adm.php?link=1");
	}else{
		header("Location: user.php?link=5");
	}
}



// if(isset($_POST['email']) && empty($_POST['senha']) == false){
//     $email = addslashes($_POST['email']);
//     $senha = md5(addslashes($_POST['senha']));
    
//     try{
//     $pdo = new PDO("mysql:dbname=urna;host=localhost", "root", "");
//     $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

//     $sql = $pdo->query($sql);

//         if($sql->rowCount() > 0){
//             $dado = $sql->fetch();
//             print_r($dado);
//             $_SESSION['id'] = $dado['id'];
//         }
//     }catch(PDOException $e){
//         echo "Falhou: ".$e->getMessage();
//     }
//     if (condition) {
        
//     header("Location: adm.php");
//     }else{
//     $_SESSION['loginErro'] = "Usuario ou senha inválida";
//     header("Location: index.php");
//     }

// header("Location: index.php");
// }else{
//     $_SESSION['loginErro'] = "Usuario ou senha inválida";
//     header("Location: index.php");
// }
?>