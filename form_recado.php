<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="./form_recado.css">
    <title>Formulario Recados</title>
</head>
<body>
    <form action="recado.php" method="post">
        <br>
    <h1>ADICIONAR RECADO</h1>
    <h2>RECADO</h2>
    <textarea name="recado" id="recado" cols="30" rows="10" placeholer="Recado:"></textarea>
    <h2>DATA</h2>
    <input type="text" name="data" id="data" placeholder="Data: ">
    <br>
    <br>
    <button class="botao">Salvar</button>
    <br>
    <br>
    <button class="botao"><a href="portal.php">Cancelar</a></button>
    </form>
</body>
</html>