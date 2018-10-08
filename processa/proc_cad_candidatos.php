<?php
require('../conexao.php');
require('../seguranca.php');
session_start();
if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
        $nome = addslashes( $_POST['nome']);
        $numero = addslashes( $_POST['numero']);
        $vice = addslashes( $_POST['vice']);
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

        $arquivo	 		= $_FILES['arquivo']['name'];
        
        $_UP['pasta'] = '../img/';
        $_UP['renomeia'] = false;
        
        $altura = "180";
        $largura = "286";
        
            $imagem_temp = imagecreate($_FILES['arquivo']['tmp_name']);
            $largura_original = imagesx($imagem_temp);
            $altura_original = imagesy($imagem_temp);

            $nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);

            $nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $altura);

            $img_redimensionada - imagecreatetruecolor($nova_largura, $nova_altura);
            imagecopyresampled($img_redimensionada, $imagem_temp, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);

        //if(isset($arquivo['tmp_name']) && empty($arquivo['tmp_name']) == false){






            if($UP['renomeia'] == true){
                //Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
                $nome_final = time().'.jpg';
            }else{
                //mantem o nome original do arquivo
                $nome_final = $_FILES['arquivo']['name'];
            }

            if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'].$nome_final)){
                
                $sql = "INSERT INTO candidatos (nome, numero, vice, partido, cargo, estado, img_id) VALUES ('$nome', '$numero', '$vice', '$partido', '$cargo', '$estado', '$nome_final') ";
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
                header("Location: ../adm.php?link=1");
       }

            //Pasta onde o arquivo vai ser salvo
           /* $_UP['pasta'] = 'img/';

            //Tamanho máximo do arquivo em Bytes
            $_UP['tamanho'] = 1024*1024*100; //5mb

            //Array com as extensoes permitidas
            $_UP['extensoes'] = array('png','jpg', 'jpeg', 'gif');

            //Renomeia o arquivo? (se true, o arquivo será salvo como .jpg e em nome único)
            $_UP['renomeia'] = false;

            $_UP['erros'][0] = 'Não houve erro';
            $_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
            $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
            $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
            $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

            if($_FILES['arquivo']['error'] != 0){
                die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
                exit; //Para a execução do script
            } */
            

        // $sql = "INSERT INTO candidatos (nome, numero, partido, cargo) VALUES ('$nome', '$numero', '$partido', '$cargo') ";
        // $pdo->query($sql);

		// header("Location: ../adm.php?link=1");
		
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
            header("Location: ../adm.php?link=1");
//     echo "
//     <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../adm.php?link=1'>
//     <script type=\"text/javascript\">
//         alert(\"Produto não foi cadastrado com Sucesso.\");
//     </script>
// ";  
}
?>
