<?php
    session_start();
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
			header("Location: user.php?link=5");
  }
  
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/sweetalert2.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    
    <?php require('conexao.php'); ?>
    <title>Urna</title>
            </head>
            <body role="document">
                
            <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #177cc4;">
                <a class="navbar-brand" href="#">URNA ONLINE</a>
                <a class="navbar-toggler hidden-lg-up " role="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation" title="Atualizar" data-toggle="tooltip"><i class="material-icons">format_list_bulleted</i></a>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <!-- <li class="nav-item active">
                            <a class="nav-link" href="index.php">Início <span class="sr-only">(current)</span></a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="adm.php?link=1">Candidatos</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="adm.php?link=2">Usuários</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="adm.php?link=3">Partidos</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="adm.php?link=6">Cargos</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="adm.php?link=4">Resultados</a>
                        </li>                      
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Votar</a>
                            <div class="dropdown-menu">



                            <a class="dropdown-item" href="adm.php?link=8">Deputado</a>
                            <a class="dropdown-item " href="adm.php?link=9">1º Senador</a>
                            <a class="dropdown-item" href="adm.php?link=10">2º Senador</a>
                            <a class="dropdown-item" href="adm.php?link=11">Governador</a>
                            <a class="dropdown-item" href="adm.php?link=12">Presidente</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </li>
                        
                        <!--
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Listar</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">Candidatos</a>
                                <a class="dropdown-item" href="#">Usuários</a>
                                <a class="dropdown-item" href="#">Partidos</a>
                                
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastrar</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="">Candidatos</a>
                                <a class="dropdown-item" href="#">Usuários</a>
                                <a class="dropdown-item" href="#">Partidos</a>
                            </div>
                        </li> -->
                        
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="sair.php">

                        <button type="submit" class="btn btn-danger" >Sair</button>
                        
                    </form>
                </div>
            </nav>
            
       <?php 
       $pag[1] = "listar_card_candidatos.php";
       $pag[2] = "listar_usuarios.php";
       $pag[3] = "listar_partidos.php";
       $pag[4] = "resultados.php";

       $pag[6] = "listar_cargos.php";

       $pag[8] = "candidatos/deputado.php";
       $pag[9] = "candidatos/1senador.php";
       $pag[10] = "candidatos/2senador.php";
       $pag[11] = "candidatos/governador.php";
       $pag[12] = "candidatos/presidente.php";
       
       
       if(isset($_GET["link"])) {
           $link = $_GET["link"];
           
           if(!empty($link)){
               if(file_exists($pag[$link])){
                   include $pag[$link];
                }else{
                    include "resultados.php";
                }
            }else{
                include "resultados.php";
            }
        }else {
            include "resultados.php";
        }
        
        
        ?>


     



        <script type="text/javascript" src="busca.js"></script>
<script type="text/javascript" src="busca_adm.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">

</body>
</html>