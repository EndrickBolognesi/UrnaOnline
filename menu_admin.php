<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #177cc4;">
    <a class="navbar-brand" href="#">URNA ONLINE</a>
    <a class="navbar-toggler hidden-lg-up " role="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation" title="Atualizar" data-toggle="tooltip"><i class="material-icons">format_list_bulleted</i></a>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li> -->
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
                    <a class="dropdown-item" href="#">Candidatos</a>
                    <a class="dropdown-item" href="#">Usuários</a>
                    <a class="dropdown-item" href="#">Partidos</a>
                </div>
            </li>
            
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Pesquisar</button>

            <button type="button" href="sair.php" class="btn btn-danger">Sair</button>
            
        </form>
    </div>
</nav>