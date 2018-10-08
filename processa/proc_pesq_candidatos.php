<?php
session_start();
require('../conexao.php');
require('../seguranca.php');

$usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

$sql = "SELECT * FROM candidatos WHERE nome LIKE '%$usuarios%' LIMIT 20";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $candidato){


        echo "
        
        <div class=\"card\" >
        <img class=\"card-img-top\" src=\"img/".$candidato["img_id"]."\" alt=\"Card image cap\">
        <div class=\"card-body\">
            <h5 class=\"card-title text-center \">".$candidato["nome"]."</h5>
            </div>
            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item\">Número: ".$candidato["numero"]."</li>
                <li class=\"list-group-item\">Vice: ".$candidato["vice"]."</li>
                <li class=\"list-group-item\">Partido: ".$candidato["partido"]."</li>
                <li class=\"list-group-item\">Cargo: ".$candidato["cargo"]."</li>
                <li class=\"list-group-item\">Estado: ".$candidato["estado"]."</li>
                <li class=\"list-group-item\">Votos: ".$candidato["qt_votos"]."</li>
            </ul>
            <div class=\"card-body\">
            
            "?>
            <?php
            $usuario = "SELECT * FROM usuarios WHERE id = '".$_SESSION['usuarioId']."' ";
            $usuario = $pdo->query($usuario);

            if($usuario->rowCount() > 0){

              foreach($usuario->fetchAll() as $usuarios){
                // switch (($usuarios['voto_presidente'] ) AND  ($candidato["qt_votos"])) {
                  
                //   case (($usuarios['voto_presidente'] >= 1 ) AND  ($candidato["qt_votos"] > 0)):
                //       echo "i equals 0";
                //       break;
                //   case (($usuarios['voto_presidente'] >= 1 ) AND  ($candidato["qt_votos"] < 0)):
                //       echo "i equals 1";
                //       break;
                //   case 2:
                //       echo "i equals 2";
                //       break;

                // }
                if ($usuarios['voto_presidente'] >= 1)  {
               
                //$candidato["qt_votos"] > 0
              
                  //votar desabilitado
                  echo " <a class=\"btn btn-success btn-block disabled \" href=\"processa/proc_voto.php?id=\"\"\" role=\"button\" ><i  class=\"material-icons\"  >how_to_vote</i></a>";
                  //remover
                  //echo " <a class=\"btn btn-danger btn-block\" href=\"processa/proc_remove_voto.php?id=".$candidato["id"]."\" title=\"Remover voto\" role=\"button\" ><i  class=\"material-icons\"  >how_to_vote</i></a>";
                
              }else{
                //votar
                echo " <a class=\"btn btn-success btn-block\" href=\"processa/proc_voto.php?id=".$candidato["id"]."\" role=\"button\" ><i  class=\"material-icons\"  >how_to_vote</i></a>";
                
              
                  //remover desabilidata
              
               //   echo " <a class=\"btn btn-danger btn-block disabled \" href=\"processa/proc_remove_voto.php?id=".$candidato["id"]."\" title=\"Remover voto\" role=\"button\" ><i  class=\"material-icons\"  >how_to_vote</i></a>";


                }
              }

            }
            ?>  

            <?php echo"
      

            
             </div>
        </div>
        
       
        ";


        
    }
}else{
    echo "Candidato não encontrado";
}



?>
