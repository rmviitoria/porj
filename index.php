<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <title>Projeto Login</title>
</head>
<body>
    <form action="login.php" method="post">
    <h1>ÁREA RESTRITA</h1>
        <input type="text" name="email" class="login" 
         placeholder="Informe seu e-mail"><br><br>
        <input type="password" name="senha" class="login" 
         placeholder="Informe sua senha"><br><br>
         <input class="botao" type="submit" value="ENTRAR"><br>
         <h3>Novo por aqui? <a href="formcad.php">[Cadastre-se] </a></h3>
    </form>
</body>
</html>