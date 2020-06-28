<?php
if (!isset($_SESSION['leitor'])){
    session_start();
}

?>

<div class="row">
    <nav class="col-12 navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Histórias curtas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Página inicial <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" id="projeto" href="/html/projeto.php">Projeto</a>
                </li>
                <?php if(isset($_SESSION['leitor'])){?>
                    <li class="nav-item active">
                        <span class="nav-link"><?=$_SESSION['leitorNome']?></span>
                    </li>
                    <li class="nav-item active">
                        <a href="../php/sair-sessao.php" class="btn btn-outline-light">Sair</a>
                    </li>
                <?php } else{ ?>
                    <li class="nav-item active">
                        <a class="nav-link" id="entrar" href="/html/entrar.html" tabindex="-1" aria-disabled="true">Entrar</a>
                    </li>
                <?php } ?>

                <?php if (!isset($_SESSION['leitor'])){?>
                    <a class="btn btn-outline-light" id="cadastrar" href="/html/cadastrar.php">Cadastrar</a>
                <?php } ?>
            </ul>
        </div>
    </nav>
</div>