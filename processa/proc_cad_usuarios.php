<?php
require('../conexao.php');
require('../seguranca.php');
if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
    $nome = addslashes( $_POST['nome']);
    $senha = addslashes( $_POST['senha']);
    $email = addslashes( $_POST['email']);
    $cpf = addslashes( $_POST['cpf']);
    $admin = addslashes( $_POST['admin']);
    $data = addslashes( $_POST['data']);
    $id = addslashes( $_POST['id']);
        
      
                
                $sql = "INSERT INTO usuarios (nome, senha, email, cpf, admin, dt_nascimento) VALUES ('$nome', '$senha', '$email', '$cpf', '$admin', '$data') ";
                $pdo->query($sql);
        
                header("Location: ../adm.php?link=2");

            }
            echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../adm.php?link=1'>
			<script type=\"text/javascript\">
				alert(\"Produto não foi cadastrado com Sucesso.\");
			</script>
		";  
     
		

?>
