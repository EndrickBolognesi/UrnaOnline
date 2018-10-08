<?php
require('../conexao.php');
require('../seguranca.php');

//     if (isset($_GET['id']) && empty($_GET['id']) == false) {
            
// }
if (isset($_POST['partido']) && empty($_POST['partido']) == false) {
        $partido = addslashes( $_POST['partido']);
        $sigla = addslashes( $_POST['sigla']);
        $id = addslashes( $_POST['id']);
        

        $sql = "UPDATE partidos SET nome_partido = '$partido', sigla = '$sigla' WHERE id = '$id'";
        $pdo->query($sql);

		header("Location: ../adm.php?link=3");
		
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