<?php
require('../conexao.php');
require('../seguranca.php');

//     if (isset($_GET['id']) && empty($_GET['id']) == false) {
            
// }
					
if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
		$id = addslashes( $_POST['id']);
        $nome = addslashes( $_POST['nome']);
		$vice = addslashes( $_POST['vice']);
		$numero = addslashes( $_POST['numero']);
		
		$partido = addslashes( $_POST['partido']);
		
		$sql1 = "SELECT sigla FROM partidos  WHERE id = '$partido'";
        $sql1 = $pdo->query($sql1);
        if($sql1->rowCount() > 0){
            foreach($sql1->fetchAll() as $partidos){
            
              $partido = $partidos["sigla"];            
  
            }
        }

		$cargo = addslashes( $_POST['cargo']);
		
		$sql2 = "SELECT nome_cargo FROM cargos  WHERE id = '$cargo'";
        $sql2 = $pdo->query($sql2);
        if($sql2->rowCount() > 0){
            foreach($sql2->fetchAll() as $cargos){
            
              $cargo = $cargos["nome_cargo"];            
  
            }
		}
	
        $estado = addslashes( $_POST['estado']);
		
		$sql3 = "SELECT nome_estado FROM estados  WHERE id = '$estado'";
        $sql3 = $pdo->query($sql3);
        if($sql3->rowCount() > 0){
            foreach($sql3->fetchAll() as $estados){
            
              $estado = $estados["nome_estado"];            
  
            }
        }

        $sql = "UPDATE candidatos SET nome = '$nome', numero = '$numero', vice = '$vice', partido = '$partido', cargo = '$cargo', estado = '$estado' WHERE id = '$id'";
        $pdo->query($sql);


		$_SESSION['msg'] = "
		<script>
		swal(
			'Sucesso!',
			'Candidato Cadastrado com Sucesso',
			'success'
			)
			</script>
			";
		header("Location: ../adm.php?link=1");
		
}else{
	$_SESSION['msg'] = "
	<script>
	swal({
		type: 'error',
		title: 'ERRO!',
		text: 'Candidato Não Foi Cadastrado com Sucesso',
	  })
		</script>
		";
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