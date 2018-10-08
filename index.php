<?php

    session_start();
    
    if(isset($_SESSION['id']) && empty($_SESSION['id']) == true){
        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=adm.php'>";
       
    }else{
        
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
                <form method="POST" action="cadastro.php" enctype="multipart/form-data" >
                 
                  <div class="form-group">
                    <label for="recipient-nome" class="col-form-label">Usuário:</label>
                    <input name="nome" type="text" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="recipient-email" class="col-form-label">Email:</label>
                    <input require name="email" type="email" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="recipient-cpf" class="col-form-label">CPF:</label>
                    <input name="cpf" type="text" class="form-control" >
                  </div>
                  <div class="form-group">
                      
                      <!-- <label for="recipient-admin" class="col-form-label">ADMIN:</label> -->
                    <input type="hidden" style="cursor: no-drop;" name="admin" type="text" class="form-control" disabled >
                    <fieldset disabled>
                        
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
        
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
            <script type="text/javascript" src="js/sweetalert2.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <link href="css/signin.css" rel="stylesheet">
    
    <title>Urna</title>
            </head>
            <body role="document">
                <?php /*
		unset($_SESSION['usuarioId'],			
        $_SESSION['usuarioNome'], 		
        $_SESSION['usuarioNivelAcesso'], 
        // $_SESSION['especialidade'],
        $_SESSION['usuarioLogin'], 		
        $_SESSION['usuarioSenha']);*/
        ?>
    <div class="container">		
        <form class="form-signin" method="POST" action="valida_login.php">
            <h2 class="form-signin-heading text-center">Área para Usuário Cadastrado</h2>
        <label for="inputEmail" class="sr-only">Email</label>
		
        <input type="text" name="email" class="form-control" placeholder="Digitar o Email" required autofocus><br />
		
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="senha" class="form-control" placeholder="Digite a Senha" required >
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
       
                
                    <div class="text-center">
                        
                        <p>Não tem uma conta ainda? <a title="Cadastrar" data-toggle="modal" data-target="#cadastrar" href="">Crie agora</a>.</p>
                    </div>
             
           
                    
      </form>
		<p class="text-center text-danger">
            <!-- <?php
				if(isset($_SESSION['loginErro'])){
                    echo $_SESSION['loginErro'];
					unset($_SESSION['loginErro']);
				}
                ?> -->
		</p>
    </div> <!-- /container -->
    
            
      
    
    
     
    
    
    
    
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
</body>
</html>