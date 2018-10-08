<?php
require('../conexao.php');
require('../seguranca.php');
        $id = $_GET['id'];
        
        // $sql = "SELECT * FROM candidatos";
        // $sql = $pdo->query($sql);
        // if($sql->rowCount() > 0){
        //     foreach($sql->fetchAll() as $candidato){
        //         $pasta = "..img/";
        //         $caminho = $pasta + $cadidato['img_id'];
        // unlink($caminho);
        //     }
        // }
        $sql = "DELETE FROM candidatos WHERE id = '$id'";
        $pdo->query($sql);

		header("Location: ../adm.php?link=1");
		

?>
