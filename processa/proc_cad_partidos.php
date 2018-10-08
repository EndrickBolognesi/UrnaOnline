<?php
require('../conexao.php');
require('../seguranca.php');
if (isset($_POST['partido']) && empty($_POST['partido']) == false) {
    $partido = addslashes( $_POST['partido']);
    $sigla = addslashes( $_POST['sigla']);
    $id = addslashes( $_POST['id']);
        
      
                
                $sql = "INSERT INTO partidos (nome_partido, sigla) VALUES ('$partido', '$sigla') ";
                $pdo->query($sql);
        


                header("Location: ../adm.php?link=3");

            }
            echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../adm.php?link=3'>
			<script type=\"text/javascript\">
				alert(\"Produto não foi cadastrado com Sucesso.\");
			</script>
		";  
     
		

?>
