
<?php 
require('conexao.php');
require('seguranca.php');

$usuario = "SELECT * FROM usuarios WHERE id = '".$_SESSION['usuarioId']."' ";
$usuario = $pdo->query($usuario);

$sql = "SELECT * FROM candidatos ";
$sql = $pdo->query($sql);


// if($usuario->rowCount() > 0){

//   foreach($usuario->fetchAll() as $usuarios){
    
//     if ($usuarios['voto_presidente'] >= 1) {


//      echo "<h1>Nao Pode Votar</h1>";
//     }else{
//       echo "<h1>Pode Votar</h1>";

//     }
//   }

// }
  
if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}

if($sql->rowCount() > 0){
  
  
  echo "
  
  <nav class=\"navbar navbar-expand-md navbar-dark\" >
  
  <a class=\"navbar-toggler hidden-lg-up \" role=\"button\" data-toggle=\"collapse\" data-target=\"#collapsibleNavId\" aria-controls=\"collapsibleNavId\"
  aria-expanded=\"false\" aria-label=\"Toggle navigation\" title=\"Atualizar\" data-toggle=\"tooltip\"></a>
  <div class=\"collapse navbar-collapse\" id=\"collapsibleNavId\">
  
  <ul class=\"navbar-nav mx-auto mt-2 mt-lg-0 \">

  <!--  mr-auto -->

  <div class=\"\">
  <button class=\"btn btn-light \" type=\"button\">Branco </button>
  <button class=\"btn btn-warning\" type=\"button\">Nulo</button>
  </div>
  
  <!-- 
  <form class=\"form-inline my-2 my-lg-0\" method=\"POST\">
  <select class=\"custom-select \" >
  <option value=\"0\" selected>Partido</option>
  "?>
          <?php 
            
            $sql1 = "SELECT * FROM partidos";
            $sql1 = $pdo->query($sql1);
            
            if($sql1->rowCount() > 0){
             foreach($sql1->fetchAll() as $partidos){
            ?>
              <option value="<?php echo $partidos["id"]; ?>"><?php echo $partidos["nome_partido"];}?></option>
            <?php
             
          }
        echo "
        ?>
        </select>
        <select class=\"custom-select\">
          <option selected value=\"0\">Estado</option>
          "?>
          <?php 
            $sql2 = "SELECT * FROM estados";
            $sql2 = $pdo->query($sql2);
            
            if($sql2->rowCount() > 0){
             foreach($sql2->fetchAll() as $estados){
            ?>
              <option value="<?php echo $estados["id"]; ?>"><?php echo $estados["nome_estado"];}?></option>
            <?php
             
          }
        echo "
        </select>
        <form class=\"form-inline my-2 my-lg-0\" method=\"POST\">
        <select name=\"optioncargo\" id=\"optioncargo\" class=\"custom-select\">

        "?>
        <?php 
          $sql3 = "SELECT * FROM cargos";
          $sql3 = $pdo->query($sql3);
          
          if($sql3->rowCount() > 0){
           foreach($sql3->fetchAll() as $cargos){
          ?>
            <option value="<?php echo $cargos["id"]; ?>"><?php echo $cargos["nome_cargo"];}?></option>
          <?php
           
        }
      echo "
        </select>
</form>
      </form> -->



    </ul> 
    
              <form method=\"POST\" id=\"form-pesquisar\" action=\"\" class=\"form-inline my-2 my-lg-0\">
              
              <input name=\"pesquisa\" id=\"pesquisa\" class=\"form-control mr-sm-2\" type=\"search\" placeholder=\"Pesquisar\" aria-label=\"Pesquisar\">
              <button class=\"btn btn-success my-2 my-sm-0\" type=\"submit\">Pesquisar</button>
    
    
                
                
                </form>
                </div>
      </nav>
    

      <div class=\"py-5\">
      <div class=\"container\">
      <div class=\"col-md-3 resultado \"> </div>
    
    
    <div class=\"row hidden-md-up\">
   
    
    ";
    foreach($sql->fetchAll() as $candidato){
      
echo "<div class=\"col-md-3  \"> 
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
                $cargo = $candidato["cargo"];
                if ($usuarios['voto_presidente'] >= 1)  {               
                //$candidato["qt_votos"] > 0
              
                  //votar desabilitado
                  echo " <a class=\"btn btn-success btn-block disabled \" href=\"processa/proc_voto.php?id=\"\"\" role=\"button\" ><i  class=\"material-icons\"  >how_to_vote</i></a>";
                  //remover
                  //echo " <a class=\"btn btn-danger btn-block\" href=\"processa/proc_remove_voto.php?id=".$candidato["id"]."\" title=\"Remover voto\" role=\"button\" ><i  class=\"material-icons\"  >how_to_vote</i></a>";
                
              }else{
                //votar
                echo " <a class=\"btn btn-success btn-block\" href=\"processa/proc_voto.php?id=".$candidato["id"]."\" role=\"button\" ><i  class=\"material-icons\"  >how_to_vote</i></a>";
              }
                
                
              
                  //remover desabilidata
              
               //   echo " <a class=\"btn btn-danger btn-block disabled \" href=\"processa/proc_remove_voto.php?id=".$candidato["id"]."\" title=\"Remover voto\" role=\"button\" ><i  class=\"material-icons\"  >how_to_vote</i></a>";


                }
              }

            
            ?>  

            <?php echo"
      

            
             </div>
        </div>
        </div>
        
       
        ";
      
      //$optioncargo = $_POST['optioncargo'];
        //if ($candidato["cargo"] == "Presidente") {
         
        
      //}
    }
    echo "      
      </div>
    </div>    
    ";
    }else{
      
      echo "Sem Candidatos";
    }
?>


          
         
        </form>
      </div>
    </div>
  </div>
</div>


