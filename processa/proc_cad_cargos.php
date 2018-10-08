<?php
require('../conexao.php');
require('../seguranca.php');
if (isset($_POST['cargo']) && empty($_POST['cargo']) == false) {
    $cargo = addslashes( $_POST['cargo']);
    $id = addslashes( $_POST['id']);
        
      
                
                $sql = "INSERT INTO cargos (nome_cargo) VALUES ('$cargo') ";
                $pdo->query($sql);
        


                header("Location: ../adm.php?link=6");

            }
            echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../adm.php?link=3'>
			<script type=\"text/javascript\">
				alert(\"Produto não foi cadastrado com Sucesso.\");
			</script>
		";  
     
		

?>
