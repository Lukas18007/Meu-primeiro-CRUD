<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./imagens/favico.ico" >
    <title>CRUD Lukas | Login</title>
</head>
<body>
    <header>
        <div class="head">
            <h2>Bem-vindo ao Meu Primeiro CRUD!</h2>
        </div>
    </header>
    <div class="container">
        <div class="first-column">
            <h1 id="titulo">Faça seu login</h1><br>
            <p id="descricao">Preencha os campos abaixo para entrar no sistema </p>
                <form action="" method="post" id="form"> 
                    <label for="email">E-mail</label>
                    <input type="email" placeholder="E-mail" id="email">   
                    <span class="erro"></span>            
                    <label for="senha">Senha</label>
                    <input type="password" placeholder="Senha" id="senha">
                    <span class="erro"></span>   
                    <a href="#" id="forgot-senha">Esqueci minha senha</a>                                             
                    <input type="submit" name="submit" value="ENTRAR" id="button">
                </form>
        </div>
        <div class="second-column">
            <img src="./imagens/Lukas.png" alt="">
            <p>Ainda não tem um cadastro? Clique em</p>
            <a href="./index.php">CADASTRO</a>
        </div>
    </div>
</body>
</html>
