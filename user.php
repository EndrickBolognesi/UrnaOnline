<?php
    session_start();
    require('seguranca.php');
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
                            <a class="nav-link" href="user.php?link=4">Resultados</a>
                        </li>                      
                        <li class="nav-item">
                            <a class="nav-link" href="user.php?link=5">Votar</a>
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
       $pag[4] = "resultados.php";
       $pag[5] = "votar.php";
       
       
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
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">


</body>
</html>