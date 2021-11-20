<?php 
    $busca = isset($_GET['busca']) ? $_GET['busca'] : null;
    $depart_name = $busca;
?>
<nav class="navbar navbar-inverse"
style="background-color: #333; border-radius:0;">
    <div class="container-fluid navbar-content" style="margin: 0 5% 0 5%;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
                <a class="navbar-brand logo" href="index.php" 
                style="padding: 20.5px 15px; height: auto; color: #e07a10;">HARDESTWARES</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
        <!-- Navbar Left -->
            <ul class="nav navbar-nav">
            <!-- Departamentos -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" 
                    style="height: 61px;">
                        <i class="glyphicon glyphicon-list" 
                        style="float: left; margin-right: 8px; line-height: 28px;"></i>
                        <div class="navbar-nav">
                            <h6 style="font-size: 10px; margin: 0;">
                                Busque por</h6>
                            DEPARTAMENTO
                            <span class="caret"></span>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?depart=processador">Processador</a></li>
                        <li><a href="index.php?depart=placa_mae">Placa Mãe</a></li>
                        <li><a href="index.php?depart=memoria">Memória</a></li>
                        <li><a href="index.php?depart=placa_de_video">Placa de Vídeo</a></li>
                        <li><a href="index.php?depart=hd_e_ssd">HD e SSD</a></li>
                        <li><a href="index.php?depart=fonte">Fonte</a></li>
                        <hr style="margin: 8px;">
                        <li><a href="lancamentos.php">Lançamentos</a></li>
                    </ul>
                </li>
                
            <!-- Pesquisa -->
                <li id="pesquisa">
                    <form class="navbar-form navbar-left" method="get" action="index.php">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Pesquisar" 
                            style="border-color: #fff; min-width: 220px;" name="busca" 
                            value="<?php if(isset($_GET['busca'])){ echo htmlentities(substr($busca, 0, 25)); }; ?>"
                            required oninvalid="setCustomValidity('Preencha o campo!')">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit" 
                                style="background-color: #e07a10;">
                                    <i class="glyphicon glyphicon-search" 
                                    style="color: #fff;"></i>
                                </button>
                            </div>
                        </div>
                    </form> 
                </li>
            </ul>

        <!-- Navbar Right -->
            <ul class="nav navbar-nav navbar-right">
            <!-- Conta -->
                <li class="dropdown" >
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"
                    style="padding: 20.5px 15px;">
                        <span class="glyphicon glyphicon-user"></span> 
                            <?php 
                                if (empty($_SESSION['id'])){
                                    echo 'Conta';
                                } 
                                else{
                                    $consulta_navbar = $cn -> query("SELECT Nome FROM vwUsuario WHERE CodUsuario = '$_SESSION[id]'");
                                    $exibe_navbar = $consulta_navbar -> fetch(PDO::FETCH_ASSOC);
                                    echo $exibe_navbar['Nome'];
                                }
                            ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php 
                            if (empty($_SESSION['id'])){
                                echo '<li><a href="login.php"><i class="glyphicon glyphicon-log-in" style="margin-right: 8px;"></i>Login</a></li>';
                                echo '<li><a href="signup.php"><i class="glyphicon glyphicon-pencil" style="margin-right: 8px;"></i>Cadastro</a></li>';
                            }
                            else{
                                if (!empty($_SESSION['privilegio']) && $_SESSION['privilegio'] == true){
                                    echo '<li><a href="admin.php"><i class="glyphicon glyphicon-folder-open" style="margin-right: 8px;"></i>Painel Administrativo</a></li>';
                                }
                                echo '<li><a href="logoff.php"><i class="glyphicon glyphicon-log-out" style="margin-right: 8px;"></i>Logout</a></li>';
                            }
                        ?>
                        
                        
                        <hr style="margin: 8px;">
                        <li><a href="carrinho.php"><i class="glyphicon glyphicon-shopping-cart" style="margin-right: 8px;"></i>Carrinho</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
