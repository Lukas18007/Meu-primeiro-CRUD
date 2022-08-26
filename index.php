<?php
$erroNome ="";
$erroEmail ="";
$erroSenha ="";
$erroRepeteSenha ="";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        //VERIFICAR SE ESTÁ VAZIO O POST NOME
        if (empty($_POST['nome'])){
            $erroNome = "Por favor, preencha um nome";
        }else{
            //PEGAR O VALOR VINDO DO POST E LIMPAR
            $nome = limpaPost($_POST['nome']);

            //VERIFICAR SE TEM SOMENTE LETRAS
            if(!preg_match("/^[a-zA-Z-' ]*$/", $nome)){
                $erroNome = "Apenas aceitamos letras e espaços em branco!";
            }
        }

         //VERIFICAR SE ESTÁ VAZIO O POST EMAIL
        if (empty($_POST['email'])){
            $erroEmail = "Por favor, informe um e-mail";
        }else{
            $email = limpaPost($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $erroEmail = "E-mail inválido!";
            }
        }

         //VERIFICAR SE ESTÁ VAZIO O POST SENHA
         if (empty($_POST['senha'])){
            $erroSenha = "Por favor, informe uma senha";
        }else{
            $senha = limpaPost($_POST['senha']);
            if(strlen($senha) <6){
                $erroSenha = "A senha precisa ter no mínimo 6 dígitos!";
            }
        }

        //VERIFICAR SE ESTÁ VAZIO O POST REPETE_SENHA
        if (empty($_POST['repete_senha'])){
            $erroRepeteSenha = "Por favor, informe a repetição da senha";
        }else{
            $repete_senha = limpaPost($_POST['repete_senha']);
            if($repete_senha !== $senha){
                $erroRepeteSenha = "A repetição da senha está diferente da senha!";
            }
        }

        include_once('config.php');
        //SE NÃO TIVER NENHUM ERRO ENVIAR PARA OBRIGADO
        if(($erroNome=="") && ($erroEmail=="") && ($erroSenha=="") && ($erroRepeteSenha=="")){
            if (isset($_POST['submit'])) {
                $result = mysqli_query($conexao, "INSERT INTO users(nome, email, senha) VALUES ('$nome', '$email', '$senha')");
           }
       } 

    }

    function limpaPost($valor){
        $valor = trim($valor);
        $valor = stripslashes($valor);
        $valor = htmlspecialchars($valor);
        return $valor;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./imagens/favico.ico" >
    <title>CRUD Lukas | Cadastro</title>
</head>
<body>
    <header>
        <div class="head">
            <h2>Bem-vindo ao Meu Primeiro CRUD!</h2>
        </div>
    </header>
    <div class="container">
        <div class="first-column">
            <h1 id="titulo">Faça seu cadastro</h1><br>
             <p id="descricao">Preencha os campos abaixo para realizar seu cadastro</p> 
                <form method="post" id="form"> 
                    <label for="nome">Nome</label>                
                    <input type="text" placeholder="Nome" id="nome" name="nome" <?php if (isset($_POST['nome'])){ echo "value='".$_POST['nome']."'";} ?>>
                    <span class="erro"><?php echo $erroNome; ?></span>
                    <label for="email">E-mail</label>
                    <input type="email" placeholder="E-mail" id="email" name="email" <?php if (isset($_POST['email'])){ echo "value='".$_POST['email']."'";} ?>>   
                    <span class="erro"><?php echo $erroEmail; ?></span>            
                    <label for="senha">Senha</label>
                    <input type="password" placeholder="Senha" id="senha" name="senha" <?php if (isset($_POST['senha'])){ echo "value='".$_POST['senha']."'";} ?>>
                    <span class="erro"><?php echo $erroSenha; ?></span>
                    <label for="senhadnv">Confirme a senha</label>
                    <input type="password" placeholder="Repita a senha" id="senhadnv" name="repete_senha" <?php if (isset($_POST['repete_senha'])){ echo "value='".$_POST['repete_senha']."'";} ?>>  
                    <span class="erro"><?php echo $erroRepeteSenha; ?></span>                                                
                    <input type="submit" name="submit" value="CADASTRE-SE" id="button">
                </form>
        </div>
        <div class="second-column">
            <img src="./imagens/Lukas.png" alt="">
            <p>Já tem um cadastro? Clique em</p>
            <a href="./login.php">ENTRAR</a>
        </div>
    </div>
</body>
</html>