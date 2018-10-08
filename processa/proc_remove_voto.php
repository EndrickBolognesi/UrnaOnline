<?php
session_start();
include_once("../conexao.php");


    if(isset($_GET['id'])){

           
        $result_candidato = "UPDATE candidatos SET qt_votos=qt_votos - 1 WHERE id = '".$_GET['id']."' ";
        $result_candidato = $pdo->query($result_candidato);

        $result_usuario = "UPDATE usuarios SET voto_presidente = voto_presidente - 1 ";
        $result_usuario = $pdo->query($result_usuario);


        if($result_candidato->rowCount() > 0){  
            $_SESSION['msg'] = "
           
            <script>
            swal(
                'Sucesso!',
                'Voto Removido Com Sucesso',
                'success'
                )
                </script>
                ";
            header("Location: ../adm.php?link=5");
        }else{
            $_SESSION['msg'] = "<script>
            swal({
                type: 'error',
                title: 'ERRO!',
                text: 'Voto Não Foi Removido Com Sucesso',
            })
			</script>";
            header("Location: ../adm.php?link=5");
            
        }
    }

?>