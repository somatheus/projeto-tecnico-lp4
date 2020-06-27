<?php

require 'conexao.php';

$tipo = $_POST['tipo-cadastro'] ?? null;

if(is_null($tipo) || $tipo == ""){
    verificaEmailCadastrado($conexao);
}else{
    if($tipo == 1){
        insereLeitor($conexao);
    }else if($tipo == 2){
        updateSenhaLeitor($conexao);
    }else if($tipo == 3){
        loginLeitor($conexao);
    }
}

function verificaEmailCadastrado($conexao)
{
    try{
        $email = $_POST['email-validacao'];

        $select = "SELECT * FROM leitor WHERE ds_email=:email";        
        $comando = $conexao->prepare($select);
        $comando->bindParam(':email', $email);
        
        $sucesso = $comando->execute();
    
        if ($sucesso === true) {
    
            $leitor = $comando->fetch();
            $leitor_email = $leitor['ds_email'] ?? null;
        
            if(is_null($leitor_email)){
                header('LOCATION: ../html/cadastrar.php?tipo=1');
            }else{
                header('LOCATION: ../html/cadastrar.php?tipo=2');
            }
        }
        
    }catch(Exception $e) {
        echo 'Exception -> ';
        var_dump($e->getMessage());
    }
}

function insereLeitor($conexao)
{
    try{
        $leitor =  [
            'nome' => $_POST['nome-leitor'] ?? null,
            'email' => $_POST['email-leitor'] ?? null,
            'senha' => sha1($_POST['senha-leitor']) ?? null
        ];

        $insert = "INSERT INTO leitor (cd_leitor, nm_leitor, ds_email, ds_senha) VALUES (:codigo, :nome, :email, :senha)";        
        $comando = $conexao->prepare($insert);

        $comando->bindParam(':codigo', $retornaNovoCodigoCadastroUsuario);
        $comando->bindParam(':nome',  $leitor['nome']);
        $comando->bindParam(':email', $leitor['email']);
        $comando->bindParam(':senha', $leitor['senha']);
        
        $linhas = $comando->execute();
    
        if ($linhas === true) {
            header('LOCATION: ../html/entrar.html');
        }else{
            header('LOCATION: ../html/morreu.html');
        }
        
    }catch(Exception $e) {
        echo 'Exception -> ';
        var_dump($e->getMessage());
    }
}
function updateSenhaLeitor($conexao)
    {
        try{
            $leitor =  [
                'email' => $_POST['email-validacao'] ?? null,
                'senha' => sha1($_POST['senha-validacao']) ?? null
            ];
    
            $insert = "UPDATE leitor set ds_senha = :senha WHERE ds_email = :email";        
            $comando = $conexao->prepare($insert);

            $comando->bindParam(':email', $leitor['email']);
            $comando->bindParam(':senha', $leitor['senha']);
            
            $linhas = $comando->execute();
        
            if ($linhas === true) {
                header('LOCATION: ../html/entrar.html?'.$leitor['email'])."?".$leitor['senha'];
            }else{
                header('LOCATION: ../html/cadastrar.php?tipo=2');
            }
            
        }catch(Exception $e) {
            echo 'Exception -> ';
            var_dump($e->getMessage());
        }
}

function loginLeitor($conexao)
{
    
    $leitor =  [
        'email' => $_POST['email-leitor'] ?? null,
        'senha' => sha1($_POST['senha-leitor']) ?? null
    ];

    $select = 'SELECT * FROM leitor WHERE ds_email=:email AND ds_senha=:senha';

    $comando = $conexao->prepare($select);
    
    $comando->bindParam(':email', $leitor['email']);
    $comando->bindParam(':senha', $leitor['senha']);
    
    $sucesso = $comando->execute();
    
    if ($sucesso) $leitorRetorno = $comando->fetch();
    
    session_start(); 

    if ($leitorRetorno) { 
        
        $_SESSION['leitor'] = $leitorRetorno;
        $_SESSION['leitorNome'] = $leitorRetorno['nm_leitor'];
        $_SESSION['duracao'] = time() + 20; 
        
        header('LOCATION: ../html/index.php');
    
    } else { 
    
        $_SESSION['erro'] = 'Dados de acesso inválidos.';
        header('LOCATION: ../html/entrar.html');
    }    
    
    
}

function retornaNovoCodigoCadastroUsuario()
{
    try{

        $select = "SELECT cd_leitor FROM leitor ORDER BY rowid DESC LIMIT 1";        
        $comando = $conexao->prepare($select);

        $sucesso = $comando->execute();
    
        if ($sucesso === true) {
    
            $codigo = $comando->fetch();
            $ultimoCodigoCadastrado = $codigo['cd_leitor'];
            
            if(is_null($ultimoCodigoCadastrado)){
                return 0;
            }else{
                return $ultimoCodigoCadastrado+1;
            }
        }
        
    }catch(Exception $e) {
        echo 'Exception -> ';
        var_dump($e->getMessage());
    }
}
