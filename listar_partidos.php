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

<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center" id="TituloModalLongoExemplo">Cadastrar Partido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <!-- Enviar imagem-->
                <div class="modal-body">
                <form method="POST" action="processa/proc_cad_partidos.php" enctype="multipart/form-data" >
                 
                  <div class="form-group">
                    <label for="recipient-partido" class="col-form-label">Partido:</label>
                    <input name="partido" type="text" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="recipient-sigla" class="col-form-label">Sigla:</label>
                    <input name="sigla" type="text" class="form-control" >
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

$sql = "SELECT * FROM partidos";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0){
    
    
    echo "
    
        <div class=\"container theme-showcase\" role=\"main\">   
           
             <div class=\"page-header\">
                 <h1>Lista de Partidos</h1>
                 
            </div>
        

                <div class=\"pull-right\" style=\"padding: 10px;\">
            
                <a class=\"btn btn-info\" title=\"Cadastrar\" data-toggle=\"modal\" data-target=\"#cadastrar\">Cadastrar</a>
                </div>
          
            
            <div class=\"row\">
            <div class=\"col-md-12\">
            
            <table class=\"table table-striped table-hover\">
            
            <thead class=\"thead-dark\">
            
           
            <tr>
            
            <!-- <th scope=\"col\">#</th> -->
            <th scope=\"col\">Partido</th>
            <th scope=\"col\">Sigla</th>
            <th scope=\"col\">Editar</th>
            <th scope=\"col\">Deletar</th>
            </tr>
            </thead>
            
            <tbody>
            ";
            foreach($sql->fetchAll() as $partido){
                // echo "Nome: $candidato\[\"nome\"\] ";
                //echo "Nome: ".$candidato["nome"]." - ".$candidato["cpf"]."<br>";
                echo "
                <tr>
                
                <!-- <th scope=\"row\">1</th> -->
               
           
                <td>".$partido["nome_partido"]."</td>
                <td>".$partido["sigla"]."</td>
                <td> <a class=\"btn btn-primary\" role=\"button\"href=\"\" title=\"Editar\" data-toggle=\"modal\" data-target=\"#modalEditar\" data-target=\"#modalEditar\" data-whateverid=\"".$partido["id"]."\" data-whateverpartido=\"".$partido["nome_partido"]."\" data-whatever=\"".$partido["sigla"]."\"><i class=\"material-icons\">create</i></a> </td>
                <td> <a class=\"btn btn-danger\" title=\"Deletar\" href=\"processa/proc_del_partidos.php?id=".$partido["id"]."\"  data-target=\"#deleta2\"><i class=\"material-icons\">delete</i></a>        </td>
                
                </tr>
                ";
            }
            echo "
            
            </tbody>
            </table> 
            </div>
            
            </div>
            </div>
            ";
        }else{
            echo "Sem Partidos Cadastrados";
            echo "<div class=\"pull-right\" style=\"padding: 10px;\">
            
            <a class=\"btn btn-info\" title=\"Cadastrar\" data-toggle=\"modal\" data-target=\"#cadastrar\">Cadastrar</a>
            </div>";
    }
?>

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Partido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="processa/proc_edita_partidos.php" enctype="multipart/form-data" >
          <div class="form-group">
            <label for="recipient-partido" class="col-form-label">Partido:</label>
            <input name="partido" type="text" class="form-control" id="recipient-partido">
          </div>
          <div class="form-group">
            <label for="recipient-sigla" class="col-form-label">Sigla:</label>
            <input name="sigla" type="text" class="form-control" id="recipient-sigla">
          </div>
        
          <div class="form-group">
            
            <input name="id" type="hidden" class="form-control" id="recipient-id">
          </div>
          
          
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-warning">Editar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




<script type="text/javascript">


$('#modalEditar').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Botão que acionou o modal
var recipient = button.data('whatever')
var recipientpartido = button.data('whateverpartido')
var recipientid = button.data('whateverid')
 // Extrai informação dos atributos data-*
// Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
// Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
var modal = $(this)
modal.find('.modal-title').text('Editar o Usuário: ' + recipient)
modal.find('#recipient-sigla').val(recipient)
modal.find('#recipient-partido').val(recipientpartido)
modal.find('#recipient-id').val(recipientid)
})
</script>