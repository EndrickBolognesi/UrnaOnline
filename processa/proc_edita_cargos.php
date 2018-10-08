<?php
require('../conexao.php');
require('../seguranca.php');

//     if (isset($_GET['id']) && empty($_GET['id']) == false) {
            
// }
if (isset($_POST['cargo']) && empty($_POST['cargo']) == false) {
        $cargo = addslashes( $_POST['cargo']);
        $id = addslashes( $_POST['id']);
        

        $sql = "UPDATE cargos SET nome_cargo = '$cargo' WHERE id = '$id'";
        $pdo->query($sql);

		header("Location: ../adm.php?link=6");
		
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