<?php

require 'conexao.php';


$historia = [
    'nome-historia' => $_POST['titulo-historia'] ?? null,
    'genero-historia' => $_POST['genero-historia'] ?? null,
    'conteudo-historia' => $_POST['conteudo-historia'] ?? null,
    'autor-historia' => $_POST['autor-historia'] ?? null
];

try{
    $insert = "INSERT INTO historia (cd_historia, cd_leitor, nm_historia, ds_genero, ds_conteudo) VALUES (:codigoHistoria, :codigoLeitor, :nomeHistoria, :generoHistoria, :conteudoHistoria)";        
    $comando = $conexao->prepare($insert);

    $comando->bindParam(':codigoHistoria', $retornaNovoCodigoCadastroHistoria);
    $comando->bindParam(':codigoLeitor',  $historia['autor-historia']);
    $comando->bindParam(':nomeHistoria', $historia['nome-historia']);
    $comando->bindParam(':generoHistoria', $historia['genero-historia']);
    $comando->bindParam(':conteudoHistoria', $historia['conteudo-historia']);

    $linhas = $comando->execute();

    if ($linhas === true) {
        header('LOCATION: ../html/index.php');
    }else{
        header('LOCATION: ../html/index.php?');
    }
}catch(Exception $e) {
echo 'Exception -> ';
var_dump($e->getMessage());
}


function retornaNovoCodigoCadastroHistoria()
{
    try{

        $select = "SELECT cd_historia FROM historia ORDER BY rowid DESC LIMIT 1";        
        $comando = $conexao->prepare($select);

        $sucesso = $comando->execute();
    
        if ($sucesso === true) {
    
            $codigo = $comando->fetch();
            $ultimoCodigoCadastrado = $codigo['cd_historia'];
            
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