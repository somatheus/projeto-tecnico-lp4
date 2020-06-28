<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/5804ca3769.js"></script>
    <script ype="module" src="../js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/comum.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <title>Projeto</title>
</head>
<bodyc lass="bg-light">
    <div class="container-fluid h-100">
    <?php include 'navbar.php' ?>

    <ul class="list-group mt-5">
        <li class="list-group-item">
            <p class="font-weight-bold">Descrição do site</p>
            <p>
                Um site para histórias curtas<br/>
                Uma pessoa que gosta de ler histórias, pode navegar pelo site e encontrar diversos gêneros de histórias. A pessoa pode ler qualquer história mas para escrever uma tem que estar autenticada no site. <br/>
                Caso a pessoa queira também começar a escrever histórias ela pode se cadastrar no site e escrever as histórias que ela desejar sobre os gêneros que o site disponibiliza.
            </p>
        </li>
        
        <li class="list-group-item">
            <p class="font-weight-bold">Diagrama de caso de uso</p>
            <img src="../imagens/Diagrama-leitor-historias.jpeg" style='height:800px; width:800px;'/>    
        </li>
        
        <li class="list-group-item">
            <p class="font-weight-bold">Mapa do site e descrição</p>
            <img src="../imagens/Mapa-do-site-Ler-Histórias.jpeg" style='height:600px; width:600px;'/>
            <p class="font-weight-bold">Página Inicial:</p>

            A página inicial mostra ao leitor uma lista de histórias para ler. Caso o usuário esteja autenticado ele terá um botão no canto inferior direito onde ele poderá começar a criação de uma nova história a partir de uma janela modal. O menu do site se localiza na parte superior da página, com as opções para ir para a página inicial, caso esteja autenticado seu nome será mostrado, ou com duas opções, uma para entrar na conta outra para realizar o cadastro caso não tenha.

            <p class="font-weight-bold">Entrar:</p>

            Na página entrar, contém um formulário para o leitor preencher o seu e-mail e senha para autenticar-se no site. Também terá uma opção para ele acessar a página de recuperar a senha caso a tenha esquecido (Criar conta).

            <p class="font-weight-bold">Criar conta:</p>

            Na página criar conta, será usada para criar conta ou recuperar senha, nela haverá um formulário onde o leitor preenche o seu e-mail, caso já exista um e-mail cadastrado, ele será notificado que já existe uma conta cadastrada com esse e-mail e terá um campo para preencher o código que foi enviado ao e-mail dele para prosseguir com a recuperação da senha. Se não existir o leitor terá um formulário para preencher suas informações pessoais e se cadastrar.
        </li>
        
        <li class="list-group-item">
            <p class="font-weight-bold">Wireframes</p>
            <div class="d-inline-block">
                <img src="../imagens/prototipo-1.png" style='height:600px; width:600px;'/>
                <img src="../imagens/prototipo-2.png" style='height:600px; width:600px;'/>
                <br/><br/>
                <img src="../imagens/prototipo-3.png" style='height:600px; width:600px;'/>
                <img src="../imagens/prototipo-4.png" style='height:600px; width:600px;'/>
                <br/><br/>
                <img src="../imagens/prototipo-5.png" style='height:600px; width:600px;'/>
                <img src="../imagens/prototipo-6.png" style='height:600px; width:600px;'/>
            </div>
        </li>
        
        <li class="list-group-item">
            <p class="font-weight-bold">Diagrama de classes</p>
            <img src="../imagens/Classe-UML.jpeg" style='height:800px; width:800px;'/>
        </li>

        <li class="list-group-item">
            <p class="font-weight-bold">Diagrama de entidade-relacionamento</p>
            <img src="../imagens/Entidade-Relacionamento-LP4.jpeg" style='height:400px; width:800px;'/>
        </li>
    </ul>
</body>
</html>