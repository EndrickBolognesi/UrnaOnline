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
                <h5 class="modal-title text-center" id="TituloModalLongoExemplo">Cadastrar Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <!-- Enviar imagem-->
                <div class="modal-body">
                <form method="POST" action="processa/proc_cad_usuarios.php" enctype="multipart/form-data" >
                 
                  <div class="form-group">
                    <label for="recipient-nome" class="col-form-label">Usuário:</label>
                    <input name="nome" type="text" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="recipient-email" class="col-form-label">Email:</label>
                    <input name="email" type="text" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="recipient-cpf" class="col-form-label">CPF:</label>
                    <input name="cpf" type="text" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="recipient-admin" class="col-form-label">Tipo:</label>
                    <select name="admin" class="custom-select">
                    <option selected value="0">Usuário</option>
                    <option value="1">Admin</option>
                    
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="recipient-data" class="col-form-label">Data de Nascimento:</label>
                    <input name="data" type="date" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="recipient-senha" class="col-form-label">Senha:</label>
                    <input name="senha" type="password" class="form-control" >
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

$sql = "SELECT * FROM usuarios";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0){
    
    
    echo "
    
        <div class=\"container theme-showcase\" role=\"main\">   
           
             <div class=\"page-header\">
                 <h1>Lista de Usuário</h1>
                 
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
            <th scope=\"col\">Nome</th>
            <th scope=\"col\">Email</th>
            <th scope=\"col\">Tipo</th>
            <th scope=\"col\">Cpf</th>
            <th scope=\"col\">Data de Nascimento</th>         
            <th scope=\"col\">Editar</th>
            <th scope=\"col\">Deletar</th>
            </tr>
            </thead>
            
            <tbody>
            ";
            foreach($sql->fetchAll() as $usuario){
                // echo "Nome: $candidato\[\"nome\"\] ";
                //echo "Nome: ".$candidato["nome"]." - ".$candidato["cpf"]."<br>";
                echo "
                <tr>
                
                <!-- <th scope=\"row\">1</th> -->
               
           
                <td>".$usuario["nome"]."</td>
                <td>".$usuario["email"]."</td>
                <td>".$rule = ($usuario["admin"] == 0 ? 'Usuário' : 'Admin')."</td>
                <td>".$usuario["cpf"]."</td>
                <td>".$usuario["dt_nascimento"]."</td>
              
                <td> <a class=\"btn btn-primary\" role=\"button\" title=\"Editar\" data-toggle=\"modal\" data-target=\"#modalEditar\" data-target=\"#modalEditar\" data-whateverid=\"".$usuario["id"]."\" data-whatever=\"".$usuario["nome"]."\" data-whateveremail=\"".$usuario["email"]."\" data-whateversenha=\"".$usuario["senha"]."\" data-whatevercpf=\"".$usuario["cpf"]."\" data-whateveradmin=\"".$usuario["admin"]."\" data-whateverdata=\"".$usuario["dt_nascimento"]."\"><i class=\"material-icons\">create</i></a> </td>
                <td> <a class=\"btn btn-danger\" title=\"Deletar\" href=\"processa/proc_del_usuarios.php?id=".$usuario["id"]."\"  data-target=\"#deleta2\"><i class=\"material-icons\">delete</i></a>        </td>
                
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
            echo "Sem Usuários";
    }
?>

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="processa/proc_edita_usuarios.php" enctype="multipart/form-data" >
          <div class="form-group">
            <label for="recipient-nome" class="col-form-label">Usuario:</label>
            <input name="nome" type="text" class="form-control" id="recipient-nome">
          </div>
          <div class="form-group">
            <label for="recipient-email" class="col-form-label">Email:</label>
            <input name="email" type="text" class="form-control" id="recipient-email">
          </div>
          <div class="form-group">
            <label for="recipient-admin" class="col-form-label">ADMIN:</label>
            <input name="admin" type="text" class="form-control" id="recipient-admin">
          </div>
          <div class="form-group">
            <label for="recipient-cpf" class="col-form-label">CPF:</label>
            <input name="cpf" type="text" class="form-control" id="recipient-cpf">
          </div>
          <div class="form-group">
            <label for="recipient-data" class="col-form-label">Data de Nascimento:</label>
            <input name="data" type="date" class="form-control" id="recipient-data">
          </div>
          <div class="form-group">
            <label for="recipient-senha" class="col-form-label">Senha:</label>
            <input name="senha" type="password" class="form-control" id="recipient-senha">
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
var recipientemail = button.data('whateveremail')
var recipientcpf = button.data('whatevercpf')
var recipientadmin = button.data('whateveradmin')
var recipientdata = button.data('whateverdata')
var recipientsenha = button.data('whateversenha')
var recipientid = button.data('whateverid')
 // Extrai informação dos atributos data-*
// Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
// Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
var modal = $(this)
modal.find('.modal-title').text('Editar o Usuário: ' + recipient)
modal.find('#recipient-nome').val(recipient)
modal.find('#recipient-email').val(recipientemail)
modal.find('#recipient-cpf').val(recipientcpf)
modal.find('#recipient-admin').val(recipientadmin)
modal.find('#recipient-data').val(recipientdata)
modal.find('#recipient-senha').val(recipientsenha)
modal.find('#recipient-id').val(recipientid)
})
</script>