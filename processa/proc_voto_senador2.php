<?php
session_start();
include_once("../conexao.php");
include_once("../seguranca.php");


        


    $usuario = "SELECT * FROM usuarios WHERE id = '".$_SESSION['usuarioId']."' ";
    $usuario = $pdo->query($usuario);

    if($usuario->rowCount() > 0){

      foreach($usuario->fetchAll() as $usuarios){
        
        if ($usuarios['voto_senador'] < 1 OR $usuarios['voto_senador'])  {

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $user_id = $_SESSION['usuarioId'] ;
            
            $result_candidato = "UPDATE candidatos SET qt_votos=qt_votos + 1 WHERE id = '$id' ";
            $result_candidato = $pdo->query($result_candidato);
            
            $result_usuario = "UPDATE usuarios SET voto_senador = voto_senador + 1 WHERE id = '$user_id' ";
            $result_usuario = $pdo->query($result_usuario);
            
            
            if($result_candidato->rowCount() > 0){  
                $_SESSION['msg'] = "
                
                <script>
                swal({type: 'success',
                    title: 'Sucesso',
                    text: 'Voto Computado',
                    
                }        
                )
                    </script>
                    ";

                    if($_SESSION['administrador'] == 1){
                        header("Location: ../adm.php?link=10");
                    }else{
                        header("Location: ../user.php?link=10");
                  }

                }else{
                    $_SESSION['msg'] = "<script>
                    swal({
                        type: 'error',
                        title: 'ERRO!',
                        text: 'Voto Não Computado',
                    })
                    </script>";

                    if($_SESSION['administrador'] == 1){
                        header("Location: ../adm.php?link=10");
                    }else{
                        header("Location: ../user.php?link=10");
                  }
                    
                }
            }else{
                $_SESSION['msg'] = "<script>
                swal({
                    type: 'error',
                    title: 'ERRO!',
                    text: 'Voto Não Computado',
                })
                </script>";
                if($_SESSION['administrador'] == 1){
                    header("Location: ../adm.php?link=10");
                }else{
                    header("Location: ../user.php?link=10");
              }
            }

        }else{
            $_SESSION['msg'] = "<script>
            swal({
                type: 'error',
                title: 'ERRO!',
                text: 'Voce Ja votou',
            })
            </script>";
            if($_SESSION['administrador'] == 1){
                header("Location: ../adm.php?link=10");
            }else{
                header("Location: ../user.php?link=10");
          }
        }

    }
}

//         }else{

//         }

// }else{
//     $_SESSION['msg'] = "<script>
//     swal({
//         type: 'error',
//         title: 'ERRO!',
//         text: 'Voto Não Computado',
//     })
//     </script>";
//     header("Location: ../adm.php?link=10");
// }
//     }else{
//         $_SESSION['msg'] = "<script>
//                 swal({
//                     type: 'error',
//                     title: 'ERRO!',
//                     text: 'Voto Não Computado',
//                 })
//                 </script>";
//                 header("Location: ../adm.php?link=10");
//     }
?>