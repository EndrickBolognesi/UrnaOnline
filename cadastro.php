<?php
require('conexao.php');
if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
    $nome = addslashes( $_POST['nome']);
    $senha = addslashes( $_POST['senha']);
    $email = addslashes( $_POST['email']);
    $cpf = addslashes( $_POST['cpf']);
    $admin = '0';
    $data = addslashes( $_POST['data']);
    //$id = addslashes( $_POST['id']);
        
            $erro = false;
            
        
            $result_cpf = "SELECT id FROM usuarios WHERE cpf= '$cpf' ";
            $result_cpf = $pdo->query($result_cpf);
                if ($result_cpf->rowCount() > 0) {
                    $erro = true;                 
                }
                // $datalimite = "2018";
                // $data_formatada = DateTime::createFromFormat('d/m/Y', $data);
                // $datavalida = DateTime::createFromFormat('d/m/Y', $datalimite);
                // $resultdate =  ($datavalida - $data_formatada);
                // print_R("$resultdate");
                // echo "$resultdate";
                // if($resultdate < '16'){
                //     $erro = true;  
                // }
            
            

            if(!$erro){
            $sql = "INSERT INTO usuarios (nome, senha, email, cpf, admin, dt_nascimento) VALUES ('$nome', '$senha', '$email', '$cpf', '$admin', '$data') ";
            $sql = $pdo->query($sql);

            if ($sql->rowCount() > 0) {
                
            
            echo "
        
            <script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@7.28.4/dist/sweetalert2.all.min.js\">
            <script type=\"text/javascript\" src=\"js/bootstrap.bundle.js\"></script>

			<!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
                <META HTTP-EQUIV=REFRESH CONTENT = '3;URL= index.php'>

                <link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">
                <title>Document</title>
            </head>
            <body>
                
            </body>
			<script>
            swal(
                'Sucesso!',
                'Usuário cadastrado com sucesso',
                'success'
              )
			</script>
    </html>
		";  
            }
        }else{
                echo "
        
            <script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@7.28.4/dist/sweetalert2.all.min.js\">
            <script type=\"text/javascript\" src=\"js/bootstrap.bundle.js\"></script>

			<!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
                <META HTTP-EQUIV=REFRESH CONTENT = '3;URL= index.php'>

                <link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">
                <title>Document</title>
            </head>
            <body>
                
            </body>
			<script>
            swal({
                type: 'error',
                title: 'ERRO!',
                text: 'Erro ao criar usuário',
              })
			</script>
    </html>
		";  
            }
        }else{
            echo "
        
            <script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@7.28.4/dist/sweetalert2.all.min.js\">
            <script type=\"text/javascript\" src=\"js/bootstrap.bundle.js\"></script>

			<!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
                <META HTTP-EQUIV=REFRESH CONTENT = '3;URL= index.php'>

                <link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">
                <title>Document</title>
            </head>
            <body>
                
            </body>
			<script>
            swal({
                type: 'error',
                title: 'ERRO',
                text: 'Erro ao criar usuário',
                
              })
			</script>
    </html>
		";  
        }

?>
