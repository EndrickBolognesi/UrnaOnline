<?php 
require('conexao.php');
require('seguranca.php');

if($_SESSION['administrador'] == 1){
 
	}else{
     $_SESSION['msg'] = "<script>
            swal({
                type: 'error',
                title: 'ÁREA NÃO AUTORIZADA',
                text: 'VOLTANDO PARA ÁREA DO USUÁRIO',
            })
			</script>";
			header("Location: adm.php?link=5");
  }
  
  
  ?>
  
<!-- CADASTRAR PRESIDENTE-->
<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center" id="TituloModalLongoExemplo">Cadastrar Candidato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <!-- Enviar imagem-->
                <div class="modal-body">
                <form method="POST" action="processa/proc_cad_candidatos.php" enctype="multipart/form-data" >
                  <div class="form-group">
                    <img class=""  src=""  class="rounded " alt="">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="arquivo"  id="arquivo" onchange="previewImagem()" aria-describedby="inputGroupFileAddon04">
                        <label class="custom-file-label" for="inputGroupFile04">Escolher imagem</label>
                      </div>                     
                  </div>

                  <div class="form-group">
                    <label for="recipient-nome" class="col-form-label">Candidato:</label>
                    <input name="nome" type="text" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="recipient-vice" class="col-form-label">Vice:</label>
                    <input name="vice" type="text" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="recipient-numero" class="col-form-label">Número:</label>
                    <input name="numero" type="text" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="recipient-partido" class="col-form-label">Partido:</label>
                    
                    <select name="partido" id="partido"  class="custom-select " >
                       <option value="" selected>Partido</option>
                    <?php 
                    $sql1 = "SELECT * FROM partidos";
                    $sql1 = $pdo->query($sql1);
                    
                    if($sql1->rowCount() > 0){
                    foreach($sql1->fetchAll() as $partidos){
                    ?>
                      <option value="<?php echo $partidos["id"]; ?>"><?php echo $partidos["sigla"];}?></option>
                    <?php
                    
                  }?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="recipient-cargo" class="col-form-label">Cargo:</label>
                    <select name="cargo" id="cargo"  class="custom-select " >
                       <option value="" selected>Cargo</option>
                        <?php 
                        $sql2 = "SELECT * FROM cargos";
                        $sql2 = $pdo->query($sql2);
                        
                        if($sql2->rowCount() > 0){
                        foreach($sql2->fetchAll() as $cargos){
                        ?>
                          <option value="<?php echo $cargos["id"]; ?>"><?php echo $cargos["nome_cargo"];}?></option>
                        <?php
                        
                      }?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="recipient-estado" class="col-form-label">Estado:</label>
                    <select name="estado" id="estado"  class="custom-select " >
                       <option value="" selected>Estado</option>
                        <?php 
                        $sql3 = "SELECT * FROM estados";
                        $sql3 = $pdo->query($sql3);
                        
                        if($sql3->rowCount() > 0){
                        foreach($sql3->fetchAll() as $estados){
                        ?>
                          <option value="<?php echo $estados["id"]; ?>"><?php echo $estados["nome_estado"];}?></option>
                        <?php
                        
                      }?>
                  </select>
                  </div>
                  
                 
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                  </div>
               </form>
                </div>

            
              
            </div>
          </div>
        </div>
<?php 

$sql = "SELECT * FROM candidatos";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0){
  if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }

  

    echo "
   
    <nav class=\"navbar navbar-expand-md navbar-dark\" >
    
    <a class=\"navbar-toggler hidden-lg-up \" role=\"button\" data-toggle=\"collapse\" data-target=\"#collapsibleNavId\" aria-controls=\"collapsibleNavId\"
    aria-expanded=\"false\" aria-label=\"Toggle navigation\" title=\"Atualizar\" data-toggle=\"tooltip\"></a>
    <div class=\"collapse navbar-collapse\" id=\"collapsibleNavId\">
    
    <ul class=\"navbar-nav mr-auto mt-2 mt-lg-0\">
    
    <div class=\"pull-right\" style=\"padding: 10px;\">
   
    <a class=\"btn btn-info\" title=\"Cadastrar\" data-toggle=\"modal\" data-target=\"#cadastrar\">Cadastrar</a>
    </div>
    </ul>
   
    
      
    
    <form method=\"POST\" id=\"form-pesquisar\" action=\"\" class=\"form-inline my-2 my-lg-0\">
    <input name=\"pesquisa\" id=\"pesquisa\" class=\"form-control mr-sm-2\" type=\"search\" placeholder=\"Pesquisar\" aria-label=\"Pesquisar\">
    <button class=\"btn btn-success my-2 my-sm-0\" type=\"submit\">Pesquisar</button>
    

                
                
                </form>
                </div>
      </nav>
    

    <div class=\"py-5\">
    <div class=\"container\">
    <div class=\"col-md-3 resultado_adm \"> </div>
    
    <div class=\"row hidden-md-up\">
    ";
    foreach($sql->fetchAll() as $candidato){
        // echo "Nome: $candidato\[\"nome\"\] ";
        //echo "Nome: ".$candidato["nome"]." - ".$candidato["partido"]."<br>";
        echo "
        <div class=\"col-md-3\">
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
        </div>
        ";







    }
    echo "   
   
    
    </div>
    </div>
    
    ";
    }else{
      echo "
      <div class=\"pull-right\" style=\"padding: 10px;\">
      <a class=\"btn btn-info\" title=\"Cadastrar\" data-toggle=\"modal\" data-target=\"#cadastrar\">Cadastrar</a>
      
      </div>
      
      
      
      ";
      echo "Sem Candidatos";
    }
?>

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Candidato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="processa/proc_edita_candidatos.php" enctype="multipart/form-data" >
          <div class="form-group">
            <label for="recipient-nome" class="col-form-label">Candidato:</label>
            <input name="nome" type="text" class="form-control" id="recipient-nome">
          </div>
          <div class="form-group">
            <label for="recipient-vice" class="col-form-label">Vice:</label>
            <input name="vice" type="text" class="form-control" id="recipient-vice">
          </div>
          <div class="form-group">
            <label for="recipient-numero" class="col-form-label">Número:</label>
            <input name="numero" type="text" class="form-control" id="recipient-numero">
          </div>
          <div class="form-group">
            <label for="recipient-partido" class="col-form-label">Partido:</label>
            <select name="partido"  class="custom-select " >
                       <option id="recipient-partido" selected>Partido</option>
                    <?php 
                    $sql1 = "SELECT * FROM partidos";
                    $sql1 = $pdo->query($sql1);
                    $sql10 = "SELECT partido FROM cadidatos";
                    $sql10 = $pdo->query($sql10);
                    
                    if($sql1->rowCount() > 0){
                    foreach($sql1->fetchAll() as $partidos){
                    ?>
                      <option value="<?php echo $partidos["id"]; ?>" <?=($candidato["partido"] == $partidos["sigla"])?'selected':''?> ><?php echo $partidos["sigla"];}?></option>
                    <?php
                    
                  }?>
                    </select>
          </div>
          <div class="form-group">
            <label for="recipient-cargo" class="col-form-label">Cargo:</label>
            <select name="cargo" id="cargo"  class="custom-select " >
                       <option selected>Cargo</option>
                        <?php 
                        $sql2 = "SELECT * FROM cargos";
                        $sql2 = $pdo->query($sql2);
                        
                        if($sql2->rowCount() > 0){
                        foreach($sql2->fetchAll() as $cargos){
                        ?>
                          <option value="<?php echo $cargos["id"]; ?>"><?php echo $cargos["nome_cargo"];}?></option>
                        <?php
                        
                      }?>
                  </select>
          </div>
          <div class="form-group">
            <label for="recipient-estado" class="col-form-label">Estado:</label>
            <select name="estado" id="estado"  class="custom-select " >
                       <option selected>Estado</option>
                        <?php 
                        $sql3 = "SELECT * FROM estados";
                        $sql3 = $pdo->query($sql3);
                        
                        if($sql3->rowCount() > 0){
                        foreach($sql3->fetchAll() as $estados){
                        ?>
                          <option value="<?php echo $estados["id"]; ?>"><?php echo $estados["nome_estado"];}?></option>
                        <?php
                        
                      }?>
                  </select>
          </div>
          
          <div class="form-group">
            
            <input name="id" type="hidden" class="form-control" id="recipient-id">
          </div>
          
          
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            <button type="submit"onclick="toastr.info('Hi! I am info message.');" class="btn btn-warning">Editar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

  function previewImagem() {
    var arquivo = document.querySelector('input[name=arquivo]').files[0];
    var preview = document.querySelector('img');
    var reader = new FileReader();
    reader.onloadend = function(){
      preview.src = reader.result;
    }

    if(arquivo){
      reader.readAsDataURL(arquivo);
    }else{
      preview.src = "";
    }
  }


$('#modalEditar').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  var recipient = button.data('whatever')
  var recipientnumero = button.data('whatevernumero')
  var recipientvice = button.data('whatevervice')
  var recipientpartido = button.data('whateverpartido')
  var recipientcargo = button.data('whatevercargo')
  var recipientestado = button.data('whateverestado')
  var recipientid = button.data('whateverid')
   // Extrai informação dos atributos data-*
  // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
  // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
  var modal = $(this)
  modal.find('.modal-title').text('Editar o Candidato: ' + recipient)
  modal.find('#recipient-nome').val(recipient)
  modal.find('#recipient-numero').val(recipientnumero)
  modal.find('#recipient-vice').val(recipientvice)
  modal.find('#recipient-partido').val(recipientpartido)
  modal.find('#recipient-cargo').val(recipientcargo)
  modal.find('#recipient-estado').val(recipientestado)
  modal.find('#recipient-id').val(recipientid)
})
</script>