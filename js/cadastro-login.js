var verificaTipoCadastro = function(){
    let tipo = document.getElementById("tipo-cadastro").value;
    
    if(tipo!=""){
        if(JSON.parse(tipo)== 1){
            preparaCardNovoCadastro();
        }else{
            preparaCardTrocaSenha();
        }

    }
}

var aplicaClickBotaoAvancarCadatro = function(){
    document.getElementById("avancar-cadastro").addEventListener("click", function(){
        
        document.getElementById("cadastro-login").submit();

    });
}

var preparaCardNovoCadastro = function(){
    let divNovoCadastro = document.getElementById("novo-cadastro");
    let botaoAvancar = document.getElementById("avancar-cadastro");

    document.getElementById("cadastrar-email").classList.add("d-none");
    botaoAvancar.innerHTML = "Cadastrar";
    divNovoCadastro.classList.remove("d-none");

    botaoAvancar.addEventListener("click", function(){
        if(camposValidos()) document.getElementById("cadastro-login").submit();
    })
}

var camposValidos = function(){
    let nome = document.getElementById("nome-cadastro");
    let email = document.getElementById("email-cadastro");
    let confirmarEmail = document.getElementById("confirma-email-cadastro");
    let senha = document.getElementById("senha-cadastro");

    if(nome.value=="" || nome.value==undefined) return false;
    if(email.value=="" || email.value ==undefined) return false;
    if(email.value != confirmarEmail.value) return false;
    if(isSenhaValida(senha) != 3) return false;

    return true;
}

var preparaCardRecuperarSenha = function(){
    let codigoRecuperarSenha = document.getElementById("div-codigo-recuperar-senha");
    let inputCodigoRecuperarSenha = document.getElementById("input-codigo-troca-senha");
    let inputEmailCadastro = document.getElementById("cadastrar-email")
    let tituloCard = document.getElementById("titulo-card");
    let legendaTituloCard = document.getElementById("legenda-titulo-card");
    let botaoAvancar = document.getElementById("avancar-cadastro");

    VMasker(inputCodigoRecuperarSenha).maskPattern("999-999");

    tituloCard.innerHTML = "Alterar senha";
    legendaTituloCard.innerHTML = "Conta já cadastrada, digite o código que você<br/> recebeu no seu email para continuar";
    botaoAvancar.innerHTML="Recuperar";
    codigoRecuperarSenha.classList.remove("d-none");
    inputEmailCadastro.classList.add("d-none")

    botaoAvancar.addEventListener("click", function(){
        if(inputCodigoRecuperarSenha.value) preparaCardTrocaSenha();
    });
}

var preparaCardTrocaSenha = function(){
    document.getElementById("input-codigo-troca-senha").classList.add("d-none");
    let divNovaSenha = document.getElementById("div-nova-senha");
    let tituloCard = document.getElementById("titulo-card");
    let legendaTituloCard = document.getElementById("legenda-titulo-card");
    let botaoAvancar = document.getElementById("avancar-cadastro");

    divNovaSenha.classList.remove("d-none");
    tituloCard.innerHTML = "Alteração de senha";
    legendaTituloCard.innerHTML = "";
    botaoAvancar.innerHTML = "Alterar senha"

    botaoAvancar.addEventListener("click", function(){
        if(validaSenha()) window.location.href = "index.html";
    })
}
var validaSenha = function(){
    let novaSenha = document.getElementById("nova-senha");
    let confirmarNovaSenha = document.getElementById("confirma-nova-senha");
    let pMensagemConfirmaSenha = document.getElementById("p-mensagem-senha");
    let mensagemConfirmaSenha = document.getElementById("mensagem-senha");

    if(isSenhaValida(novaSenha,confirmarNovaSenha) == 1){
        mensagemConfirmaSenha.innerHTML = "Senhas muito curtas, minimo de 8 caracteres";
        pMensagemConfirmaSenha.classList.remove("d-none");
        return false;
    }else if(isSenhaValida(novaSenha,confirmarNovaSenha) == 2){
        mensagemConfirmaSenha.innerHTML = "Senhas não coincidem";
        pMensagemConfirmaSenha.classList.remove("d-none");
        isSenhaValida = false;
        return false;
    }else if(isSenhaValida(novaSenha,confirmarNovaSenha) == 3){
        return true;
    }
}

var isSenhaValida = function(novaSenha,confirmarNovaSenha){

    confirmarNovaSenha = confirmarNovaSenha == undefined || confirmarNovaSenha == "" ? novaSenha : confirmarNovaSenha;

    if(novaSenha.value.length<8 && confirmarNovaSenha.value.length<8) return 1;
    if(novaSenha.value != confirmarNovaSenha.value) return 2;
    if(novaSenha.value.length>=8 && novaSenha.value == confirmarNovaSenha.value) return 3;
}

document.addEventListener("DOMContentLoaded", function() {
   aplicaClickBotaoAvancarCadatro();
   verificaTipoCadastro();
});