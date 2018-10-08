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
        <img class=\"card-img-top \" src=\"img/".$candidato["img_id"]."\" alt=\"Card image cap\">
        <div class=\"card-body\">
            <h5 class=\"card-title text-center \">".$candidato["nome"]."</h5>
            </div>
            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item\">Número: ".$candidato["numero"]."</li>
                <li class=\"list-group-item\">Vice: ".$candidato["vice"]."</li>
                <li class=\"list-group-item\">Partido: ".$candidato["partido"]."</li>
                <li class=\"list-group-item\">Cargo: ".$candidato["cargo"]."</li>
              <!--  <li  class=\"list-group-item \">Estado: ".$candidato["estado"]."</li> -->
            </ul>
            <div class=\"card-body\">
            <td> 
            <a class=\"btn btn-success \" href=\"\" role=\"button\" data-toggle=\"modal\" data-target=\"#modalVisualizar".$candidato["id"]."\"><i class=\"material-icons\">visibility</i></a>
    
            <a class=\"btn btn-primary\" href=\"\"  role=\"button\" title=\"Atualizar\" data-toggle=\"modal\" data-target=\"#modalEditar\" data-whateverid=\"".$candidato["id"]."\" data-whatever=\"".$candidato["nome"]."\" data-whatevernumero=\"".$candidato["numero"]."\" data-whatevervice=\"".$candidato["vice"]."\" data-whateverpartido=\"".$candidato["partido"]."\" data-whatevercargo=\"".$candidato["cargo"]."\" data-whateverestado=\"".$candidato["estado"]."\"><i class=\"material-icons\">create</i></a> </td>

            
                <a class=\"btn btn-danger\" title=\"Deletar\" href=\"processa/proc_del_candidatos.php?id=".$candidato["id"]."\"  ><i class=\"material-icons\">delete</i></a>   
             </div>
        </div>
        <!-- VISUALIZAR CANDIDATO -->
        <div class=\"modal fade\" id=\"modalVisualizar".$candidato["id"]."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"TituloModalLongoExemplo\" aria-hidden=\"true\">
          <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
              <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"TituloModalLongoExemplo\">".$candidato["nome"]."</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Fechar\">
                  <span aria-hidden=\"true\">&times;</span>
                </button>
              </div>
              
                
              <ul class=\"list-group list-group-flush\">
              <img class=\"card-img-top \" src=\"img/".$candidato["img_id"]."\" alt=\"Card image cap\">

                <li class=\"list-group-item\">Número: ".$candidato["numero"]."</li>
                <li class=\"list-group-item\">Vice: ".$candidato["vice"]."</li>
                <li class=\"list-group-item\">Partido: ".$candidato["partido"]."</li>
                <li class=\"list-group-item\">Cargo: ".$candidato["cargo"]."</li>
                <li class=\"list-group-item\">Estado: ".$candidato["estado"]."</li>
              </ul>
              
                
        
        
              <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Fechar</button>
                
              </div>
            </div>
          </div>
        </div>
       
        ";


        
    }
}else{
    echo "Candidato não encontrado";
}



?>
