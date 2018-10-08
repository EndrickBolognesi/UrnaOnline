<?php
require('../conexao.php');
require('../seguranca.php');

//     if (isset($_GET['id']) && empty($_GET['id']) == false) {
            
// }
if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
        $nome = addslashes( $_POST['nome']);
        $senha = addslashes( $_POST['senha']);
        $email = addslashes( $_POST['email']);
        $cpf = addslashes( $_POST['cpf']);
        $admin = addslashes( $_POST['admin']);
        $data = addslashes( $_POST['data']);
        $id = addslashes( $_POST['id']);
        

        $sql = "UPDATE usuarios SET nome = '$nome', senha = '$senha', email = '$email', cpf = '$cpf', admin = '$admin', dt_nascimento = '$data' WHERE id = '$id'";
        $pdo->query($sql);

		header("Location: ../adm.php?link=2");
		
}
?>
<!-- <!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if (mysqli_affected_rows($conectar) != 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php'>
				<script type=\"text/javascript\">
					alert(\"Candidato alterado com sucesso\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php'>
				<script type=\"text/javascript\">
					alert(\"Candidato não alterado com sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html> -->